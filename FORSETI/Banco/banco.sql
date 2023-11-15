create database forseti;
use forseti;

/***************************************************
   Cadastro de tela inicial do cliente e advogado
****************************************************/

create table cliente
(
    cd int primary key auto_increment,
    nm_pessoa varchar(100),
    email varchar(50),
    senha varchar(50),
    telefone varchar(30),
    dt_nasc date,
    cidade varchar(50),

    cep varchar(9),
    estado enum
    ('AC','AL','AP','AM','BA','CE','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SO','SP','SE','TO','DF'),
    sexo enum ('M','F'),
    foto blob
);

create table advogado (
    cd int primary key auto_increment,
    nome varchar (100),
    email varchar(50),
    senha varchar(50),
    cnpj varchar(50),
    oab varchar(50),
    dt_nasc date,
    sexo enum ('M','F'),
    sessional varchar(50),
    subsessao varchar (40),
    foto blob,
    especialidade varchar(255)
);


create table curriculo (
    cd int primary key auto_increment,
    id_advogado int default null,
    nome varchar(50),
    sobrenome varchar(50),
    idade varchar(50),
    objetivo text,
    resumo_profi text,
    idiomas varchar(50),
    historico text,
    constraint fk_advogado_curriculo foreign key (id_advogado) references advogado (cd)
);

create table institulo (
    cd int primary key auto_increment,
    id_curriculo int default null,
    esc_instituto varchar(100),
    constraint fk_curriculo_instituto foreign key (id_curriculo) references curriculo (cd)
);

create table curso (
    cd int primary key auto_increment,
    id_curriculo int default null,
    esc_cursos varchar(100),
    constraint fk_curriculo_curso foreign key (id_curriculo) references curriculo (cd)
);

create table especialidade (
    cd int primary key auto_increment,
    id_curriculo int default null,
    especialidade varchar(100),
    constraint fk_curriculo_especialidade foreign key (id_curriculo) references curriculo (cd)
);

create table idiomas (
    cd int primary key auto_increment,
    id_curriculo int default null,
    idioma varchar(100),
    constraint fk_curriculo_idioma foreign key (id_curriculo) references curriculo (cd)
);

/****************************************************************************************
   Informações adicionais depois que a pessoa deve cadastrar como cliente ou advogado
*****************************************************************************************/


create table contato
(
    cd int primary key auto_increment,
    id_advogado int default null,
    id_cliente int default null,
    email varchar(100),
    tel_fixo varchar(15),
    cel_celular varchar(15),
    constraint fk_advogado_contato foreign key (id_advogado) references advogado (cd),
    constraint fk_cliente_contato foreign key (id_cliente) references cliente (cd)
);
 
create table localizacao
(
    cd int primary key auto_increment,
    id_advogado int default null,
    id_cliente int default null,
    cidade varchar(50),
    bairro varchar(50),
    nmr_casa int,
    cep varchar(9),
    estado enum
    ('AC','AL','AP','AM','BA','CE','ES','GO','MA','MT','MS','MG','PA','PB','PR','PE','PI','RJ','RN','RS','RO','RR','SO','SP','SE','TO','DF'), -- lembrar implemento da API localizacao --
    constraint fk_advogado_localizacao foreign key (id_advogado) references advogado (cd),
    constraint fk_cliente_localizacao foreign key (id_cliente) references cliente (cd)
);

/******************************************************* 
    tabela para comunicacao entre advogado e cliente 
********************************************************/
create table mensagem
(
    cd int primary key auto_increment,
    id_advogado int default null,
    nm_advogado varchar(100) default null,
    id_cliente int default null,
    nm_cliente varchar(100) default null,
    mensagem text,
    data datetime,
    constraint fk_advogado_mensagem foreign key (id_advogado) references advogado (cd),
    constraint fk_cliente_mensagem foreign key (id_cliente) references cliente (cd)
);


