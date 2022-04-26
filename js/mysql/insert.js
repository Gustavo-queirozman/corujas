const Trabalhador = sequelize.define('trabalhador', {
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
    senha: {
        type: Sequelize.STRING
    },
    telefone: {
        type: Sequelize.STRING
    },
    cidade: {
        type: Sequelize.STRING
    },
    estado: {
        type: Sequelize.STRING
    },
    endereco: {
        type: Sequelize.STRING
    },
    imagem_perfil: {
        type: Sequelize.STRING
    }
})



// force: true will drop the table if it already exists
Trabalhador.sync({ force: true }).then(() => {
    // Table created
    return Trabalhador.create({
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
    });
});