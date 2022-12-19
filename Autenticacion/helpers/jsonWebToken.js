const jwt = require('jsonwebtoken');



const generateJWT = ( uid, name ) => {

    return new Promise( (resolve, reject) => {
        const payload = { uid, name };
        jwt.sign( payload, process.env.SECRET_JWT, { 
            expiresIn: '7d'
        }, (err, token) => {
            
            if( err ) {
                console.log(err);
                reject('No se genero el TOKEN');
            }
            resolve( token );
        });
    });

};



module.exports = {
    generateJWT
};