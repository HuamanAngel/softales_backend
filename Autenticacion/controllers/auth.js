const { request ,response, json } = require("express");
const sql = require("msnodesqlv8");
const bcrypt = require('bcryptjs');
const { generateJWT } = require("../helpers/jsonWebToken");
const { generateUserId } = require("../helpers/user_id");
const { connectionString } = require("../database/database");



const crearUsuario =  async( req=request, res=response ) => {

    const { username, email, password } = req.body;

    try {

        const id = generateUserId();
        // Encriptamos la contraceña
        const salt = bcrypt.genSaltSync(10);
        passwordEncrip = bcrypt.hashSync( password, salt );

        const query = `INSERT INTO "User"(id, username, email, password)
                        VALUES ('${id}', '${username}', '${email}', '${passwordEncrip}')`;


        //JWT
        const token = await generateJWT( id, username );


        sql.query(connectionString, query, (err, resp) => {
            if(!err) {
                res.status(201).json({
                    ok: true,
                    username,
                    email,
                    passwordEncrip,
                    token
                });
            } else {
                res.status(400).json({
                    ok: false,
                    msg: 'No se pudo crear el usuario'
                });
            }

            console.log(query)
        });




    } catch (error) {
        console.log('Error al registrar usuario: ', error);
        res.status(500).json({
            ok: false,
            msg: 'Hable con el administrador'
        });
    }

}




module.exports = {
    crearUsuario
}