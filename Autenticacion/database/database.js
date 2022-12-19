const sql =  require("msnodesqlv8");


const config = {
    server: process.env.SERVER,
    database: process.env.BD_NAME,
    user: process.env.USER,
    password: process.env.PASSWORD,
    options: {
        trustedConnection: true
    },
    driver: 'msnodesqlv8'
}


const connectionString = `server=${config.server};Database=${config.database};Trusted_Connection=Yes;Driver={SQL Server Native Client 11.0}`;


module.exports = {
    connectionString
}




