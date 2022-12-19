const express = require('express');
const cors = require('cors');
require('dotenv').config();


const app = express();

// cors
app.use(cors())

// directorio publico
app.use( express.static('public') );

//lectura y parseo del body
app.use( express.json() );




// RUTAS
app.use('/api/auth', require('./routers/auth'));



//escuchamoms las peticiones
app.listen( process.env.SERVER_PORT, () => {
    console.log('Escuchando en el puerto ', process.env.SERVER_PORT);
});


