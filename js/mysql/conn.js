const Sequelize = require('sequelize')
const sequelize = new Sequelize('conex648_usuario', 'conex648_gustavo', 'x0T7!;CnTu)S', {
    host: "108.179.192.95",
    dialect: "mysql",
    define: {
        timestamps: true,
        freezeTableName: true
    }
})

sequelize.authenticate().then(function () {
    console.log("Conectado com sucesso!")
}).catch(function (erro) {
    console.log("Falha ao se conectar: " + erro)
})