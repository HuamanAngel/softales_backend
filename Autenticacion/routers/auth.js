const express = require('express');
const { check } = require('express-validator');
const { crearUsuario, iniciarSesion } = require('../controllers/auth');
const { validarCampos } = require('../middlewares/validarCampos');


const router = express.Router();



router.post('/create',
            [
                check('username', 'USERNAME es requerido').not().isEmpty(),
                check('email', 'EMAIL es requerido').isEmail(),
                check('password', 'El password debe de tener minimo 8 caracteres').isLength({ min:8 }),
                validarCampos
            ],
            crearUsuario);


router.post('/login',
            [
                check('email', 'EMAIL es requerido').isEmail(),
                check('password', 'El password debe de tener minimo 8 caracteres').isLength({ min:8 }),
                validarCampos
            ],
            iniciarSesion);



module.exports = router;
