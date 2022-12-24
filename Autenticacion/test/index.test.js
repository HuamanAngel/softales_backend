require("dotenv").config();
const app = require('../index');
const supertest = require('supertest');
const bcrypt = require('bcryptjs');




describe('Auth Endpoints', () => {

    // Email
    const email = `test${Math.random().toString(2)}@test.com`;
    // Encriptamos la contraceña
    const salt = bcrypt.genSaltSync(10);
    const password = "test01PRUEBA_";
    const passwordEncrip = bcrypt.hashSync( password, salt );



    it('POST /api/auth/create - se crea un nuevo usuario', async () => {

        const res = await supertest(app).post("/api/auth/create").send({
            username: "Test01",
            password: passwordEncrip,
            email: email,
        });
        
        expect(res.statusCode).toBe(201);
        expect(res.body.ok).toBe(true);

        //console.log('RESP:', res.body)
    });

    it('POST /api/auth/create - El usuario ya existe', async () => {


        const res = await supertest(app).post("/api/auth/create").send({
            username: "Test01",
            password: passwordEncrip,
            email: email
        });
        
        expect(res.statusCode).toBe(400);
        expect(res.body.ok).toBe(false);
        expect(res.body.msg).toBe('Ya hay un usuario registrado con este email');

        //console.log('RESP:', res.body)
    });


    it('POST /api/auth/login - Autenticación por Login', async () => {

        const res = await supertest(app).post("/api/auth/login").send({
            email: email,
            password: password
        });
        
        //console.log('RESP:', res.body)
        
        expect(res.statusCode).toBe(201);
        expect(res.body.ok).toBe(true);
        expect(res.body.email).toBe(email);

    });

    it('POST /api/auth/login - Credenciales incorrectas', async () => {

        const res = await supertest(app).post("/api/auth/login").send({
            email: email,
            password: "password-NO-valido01"
        });
        
        //console.log('RESP:', res.body)
        
        expect(res.statusCode).toBe(400);
        expect(res.body.ok).toBe(false);
        expect(res.body.msg).toBe("Credenciales incorrectas");

    });
  
  });




