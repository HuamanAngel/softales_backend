const { request ,response, json } = require("express");
const sql = require("msnodesqlv8");
const bcrypt = require('bcryptjs');
const { generateJWT } = require("../helpers/jsonWebToken");
const { generateUserId } = require("../helpers/user_id");
const { connectionString } = require("../database/database");





const renovarToken = (id, token) => {
    const query = `UPDATE "User" SET "token"='${token}' WHERE "id"='${id}'`;
    sql.query(connectionString, query);
}


const crearUsuario =  async( req=request, res=response ) => {

    const { username, email, password } = req.body;

    try {

        const id = generateUserId();
        // Encriptamos la contraceña
        const salt = bcrypt.genSaltSync(10);
        passwordEncrip = bcrypt.hashSync( password, salt );

        //JWT
        const token = await generateJWT( id, username );

        //const query = `INSERT INTO "User"(id, username, email, password)
        //                VALUES ('${id}', '${username}', '${email}', '${passwordEncrip}')`;

        const query = `
            IF EXISTS(SELECT "email" FROM "User" WHERE "email"='${email}')
                BEGIN
                    SELECT 'existe'
                END
            ELSE
                BEGIN
                    INSERT INTO "User"(id, username, email, password, token) 
                    VALUES ('${id}', '${username}', '${email}', '${passwordEncrip}', '${token}')
                END`;



        sql.query(connectionString, query, (err, resp) => {
            if(!err) {
                if(resp.length === 0) {
                    res.status(201).json({
                        ok: true,
                        id,
                        username,
                        email,
                        passwordEncrip,
                        token
                    });
                } else {
                    res.status(400).json({
                        ok: false,
                        msg: 'Ya hay un usuario registrado con este email'
                    });
                }
            } else {
                res.status(400).json({
                    ok: false,
                    msg: 'No se pudo crear el usuario'
                });
            }
        });




    } catch (error) {
        console.log('Error al registrar usuario: ', error);
        res.status(500).json({
            ok: false,
            msg: 'Hable con el administrador'
        });
    }

}






const desencriptar = (password, paswordHash) => {
    const isValid = bcrypt.compareSync( password, paswordHash );
    if( isValid ) {
        return true;
    }
    return false;
}


const iniciarSesion = ( req=request , res=response ) => {

    const { email, password } = req.body;

    try {

        const query = `SELECT "id", "username", "password", "email" FROM "User" WHERE "email"='${email}'`;


        sql.query(connectionString, query, async (err, resp) => {
            if(!err && resp.length > 0) { // Si no hay error hay un usuario
                
                const isValid = desencriptar(password, resp[0].password);
                
                if(isValid) {

                    //JWT
                    const token = await generateJWT( resp[0].id, resp[0].username );

                    //console.log(token.length)

                    renovarToken(resp[0].id, token)

                    res.status(201).json({
                        ok: true,
                        id: resp[0].id,
                        username: resp[0].username,
                        email: resp[0].email,
                        token
                    })
                } else {
                    res.status(400).json({
                        ok: false,
                        msg: 'Contraceña invalida'
                    })
                }


            } else {
                res.status(400).json({
                    ok: false,
                    msg: 'No se pudo iniciar sesión'
                });
            }
        });




    } catch (error) {
        console.log('Error al iniciar sesión: ', error);
        res.status(500).json({
            ok: false,
            msg: 'Hable con el administrador'
        });
    }

}




module.exports = {
    crearUsuario,
    iniciarSesion
}