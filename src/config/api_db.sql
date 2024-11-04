CREATE DATABASE BancoCine

USE BancoCine

CREATE TABLE USUARIO(
	id SERIAL PRIMARY KEY NOT NULL,
	user VARCHAR(255) UNIQUE,
	senha VARCHAR(255) NOT NULL
);

CREATE TABLE REPORTE(
	 id SERIAL PRIMARY KEY NOT NULL,
    descricaoBug VARCHAR(1024),
    descricaoSugestao VARCHAR(1024),
    usuarioID INT NOT NULL,
    FOREIGN KEY (usuarioID) REFERENCES Usuario(id)
);