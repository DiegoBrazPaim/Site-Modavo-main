CREATE DATABASE db_biblioteca;

USE db_biblioteca;


CREATE TABLE Usuario (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL UNIQUE,
    senha VARCHAR(255) NOT NULL,
    telefone VARCHAR(20),
    verificado BOOLEAN DEFAULT FALSE
);

CREATE TABLE Login (
    id SERIAL PRIMARY KEY,
    usuario_id INT REFERENCES Usuario(id),
    data_hora TIMESTAMP NOT NULL,
    ip VARCHAR(45) NOT NULL
);

CREATE TABLE Cadastro (
    id SERIAL PRIMARY KEY,
    usuario_id INT REFERENCES Usuario(id),
    data_hora TIMESTAMP NOT NULL,
    status VARCHAR(50) NOT NULL
);

CREATE TABLE Chamada (
    id SERIAL PRIMARY KEY,
    usuario_id INT REFERENCES Usuario(id),
    data_hora TIMESTAMP NOT NULL,
    numero_destino VARCHAR(20) NOT NULL,
    numero_mascara VARCHAR(20),
    status VARCHAR(50) NOT NULL
);

CREATE TABLE SMS (
    id SERIAL PRIMARY KEY,
    usuario_id INT REFERENCES Usuario(id),
    mensagem TEXT NOT NULL,
    data_hora TIMESTAMP NOT NULL,
    status VARCHAR(50) NOT NULL
);

CREATE TABLE Verificacao2FA (
    id SERIAL PRIMARY KEY,
    usuario_id INT REFERENCES Usuario(id),
    codigo VARCHAR(10) NOT NULL,
    expira_em TIMESTAMP NOT NULL,
    usado BOOLEAN DEFAULT FALSE
);

CREATE TABLE Pagina (
    id SERIAL PRIMARY KEY,
    nome VARCHAR(50) NOT NULL UNIQUE,
    conteudo TEXT NOT NULL
);

SHOW TABLES;
