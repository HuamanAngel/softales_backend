const sql =  require("msnodesqlv8");


const config = {
    server: process.env.SERVER,
    database: process.env.BD_NAME,
    user: process.env.USER,
    password: process.env.PASSWORD,
    options: {
        trustedConnection: false
    },
    driver: 'msnodesqlv8'
}

// Configuration for linux-ubuntu
const connectionString = `Server=${config.server};Database=${config.database};Uid=${config.user};Pwd=${config.password};Driver={ODBC Driver 17 for SQL Server};`;

// const connectionString = `Server=${config.server};Database=${config.database};Uid=${config.user};Pwd=${config.password};Driver={SQL Server Native Client 11.0};`;


module.exports = {
    connectionString
}




