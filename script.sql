create table usuarios(
    id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    email varchar(255) UNIQUE,
    senha varchar(30),
    categoria varchar(15),
    plano varchar(10)
);

create table trabalhadores(
    id_trabalhador varchar(255),
    nome varchar(255),
    data_nascimento varchar(15),
    cpf varchar(15),
    email varchar(255) UNIQUE,
    senha varchar(30),
    telefone varchar(15),
    pais varchar(70),
    cidade varchar(58),
    estado varchar(50),
    endereco varchar(300)
);

create table empresas(
	id_empresa varchar(255),
    nome varchar(255),
    empresa varchar(60),
    cnpj varchar(20),
    email varchar(255) UNIQUE,
    senha varchar(30),
    telefone varchar(15),
    pais varchar(70),
    cidade varchar(58),
    estado varchar(50),
    endereco varchar(255)
);


create table curriculos(
    id_curriculo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    objetivo varchar(5000),
    experiencia varchar(5000),
    formacao varchar(5000),
    idioma varchar(1000),
    informacao varchar(5000),
    fk_usuario int,
    idade int,
    plano varchar(10)
);


create table vagas(
    id_vaga int PRIMARY KEY AUTO_INCREMENT,
    empresa varchar(255),
    titulo varchar(255) UNIQUE,
    salario varchar(50),
    descricao varchar(5000),
    funcao varchar(5000),
    restricao varchar(5000),
    fk_usuarios varchar(6000),
    data_criacao int(20),
    fk_usuario int
);

create table tags_vagas(
    id_tag int PRIMARY KEY AUTO_INCREMENT,
    tag varchar(5000),
    fk_vaga int
);

create table tags_usuarios(
    id_tag int PRIMARY KEY AUTO_INCREMENT,
    tag varchar(5000),
    fk_vaga int,
    enviar_curriculo varchar(5)
);

create table curriculos_aprovacao(
    id_curriculo int PRIMARY KEY AUTO_INCREMENT,
    nome varchar(255),
    objetivo varchar(5000),
    experiencia varchar(5000),
    formacao varchar(5000),
    idioma varchar(1000),
    informacao varchar(5000),
    fk_usuario int,
    idade int,
    plano varchar(10),
    data_criacao datetime
);

create table curriculos_enviados(
    id_curriculo_enviado int primary key auto_increment,
    fk_usuario int,
    ultima_atualizacao datetime,
    enviados int
);

---------------------------------------------------------------
create table conversa(
	id_conversa int AUTO_INCREMENT PRIMARY KEY,
    user1 varchar(150),
    user2 varchar(150)
);

