CREATE DATABASE bd_games DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;
USE bd_games;
CREATE TABLE usuarios (
	usuario VARCHAR(10) NOT NULL,
	nome VARCHAR(30) NOT NULL,
	senha VARCHAR(60) NOT NULL,
	tipo VARCHAR(10) NOT NULL DEFAULT 'editor',
	PRIMARY KEY(usuario)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
CREATE TABLE generos (
	cod INT(11) NOT NULL,
	genero VARCHAR(20) NOT NULL,
	PRIMARY KEY(cod)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
CREATE TABLE produtoras (
	cod INT(11) NOT NULL,
	produtora VARCHAR(20) NOT NULL,
	pais VARCHAR(15) NOT NULL,
	PRIMARY KEY(cod)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;
CREATE TABLE jogos (
	cod INT(11) NOT NULL,
	nome VARCHAR(40) NOT NULL,
	genero int(11) NOT NULL,
	produtora int(11) NOT NULL,
	descricao TEXT NOT NULL,
	nota decimal(4, 2) NOT NULL,
	capa VARCHAR(60) DEFAULT NULL,
	PRIMARY KEY(cod),
	FOREIGN KEY(genero) REFERENCES generos(cod),
	FOREIGN KEY(produtora) REFERENCES produtoras(cod)
) ENGINE = InnoDB DEFAULT CHARSET = utf8;