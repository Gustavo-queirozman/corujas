const Sequelize = require('sequelize')
const sequelize = new Sequelize('db_name', 'username', 'password', {
    host: "localhost",
    dialect: "mysql"
})

sequelize.authenticate().then(function(){
    console.log("Conectado com sucesso!")
}).catch(function(erro){
    console.log("Falha ao se conectar: "+erro)
})

const Trabalhador = Sequelize.define('table_name indicado usar plural', {
    id_trabalhador: {
        type: Sequelize.STRING
    },
    nome: {
        type: Sequelize.STRING
    },
    data_nascimento: {
        type: Sequelize.STRING
    },
    cpf: {
    type: Sequelize.INTEGER
    },
    email: {
    type: Sequelize.STRING
    },
    senha:{
    type: Sequelize.STRING
    },
    telefone:{
    type: Seqeulize.STRING
    },
    cidade:{
    type: Sequelize.STRING
    },
    estado:{
    type: Sequelize.STRING
    },
    endereco:{
    type: Sequelize.STRING
    },
    imagem_perfil:{
    type: Sequelize.STRING
    }
})

Trabalhador.create({
    id_trabalhador: "",
    nome: "",
    data_nascimento: "",
    cpf: "",
    email: "",
    senha: "",
    telefone: "",
    cidade: "",
    estado: "",
    endereco: "",
    imagem_perfil: ""
})


//apagar daqui pra baixo
const Usuario = sequelize.define('usuarios', {
    nome: {
        type: Sequelize.STRING
    },
    sobrenome: {
        type: Sequelize.STRING
    },
    idade: {
        type: Sequelize.INTEGER
    },
    email: {
        type: Sequelize.STRING
    }
})

Usuario.sync({force: true})

//dados completos em baixo


const Trabalhador = sequelize.define('table_name indicado usar plural', {
    id_trabalhador: {
        type: Sequelize.STRING
    },
    nome: {
        type: Sequelize.STRING
    },
    data_nascimento: {
        type: Sequelize.STRING
    },
    cpf: {
    type: Sequelize.INTEGER
    },
    email: {
    type: Sequelize.STRING
    },
    senha:{
    type: Sequelize.STRING
    },
    telefone:{
    type: Seqeulize.STRING
    },
    cidade:{
    type: Sequelize.STRING
    },
    estado:{
    type: Sequelize.STRING
    },
    endereco:{
    type: Sequelize.STRING
    },
    imagem_perfil:{
    type: Sequelize.STRING
    }
})

Trabalhador.create({
    id_trabalhador: "kmcemlmldkmklak",
    nome: "Gustavo Queiroz",
    data_nascimento: "16/06/2002",
    cpf: "02013885610",
    email: "gustavoqueirozmit@gmail.com",
    senha: "falaasenha",
    telefone: "38999400531",
    cidade: "Paracatu",
    estado: "MG",
    endereco: "Rua Beco São Paulo n° 30 Bairro JK",
    imagem_perfil: "dir/dir/"
})