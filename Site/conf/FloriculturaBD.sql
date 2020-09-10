CREATE DATABASE neTree;
USE neTree;

CREATE TABLE plantas(
codPlanta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nomePlanta VARCHAR(50),
tipoPlanta VARCHAR(50),
imgPlanta VARCHAR(100),
estoquePlanta VARCHAR(100),
FOREIGN KEY (a) REFERENCES b(c));


CREATE TABLE produtos(
codProdutos INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nomeProdutos VARCHAR(50),
estoqueProdutos INT,
tipoProdutos VARCHAR(50),
imgProdutos VARCHAR(100));

CREATE TABLE cadastroUsuario(
	codUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nomeUsuario VARCHAR(50),
	email VARCHAR(100),
	senha CHAR,
	dataNasc DATE,
	CPF VARCHAR(11),
	genero VARCHAR (20),
	telefone VARCHAR(20));
    
INSERT INTO cadastroUsuario(nomeUsuario, email, senha, dataNasc, CPF, genero, telefone)
VALUES ('Adm', 'adm@gmail.com', '123', '1999-11-01', '11111111111', 'N', '47999999999');

SELECT * FROM cadastroUsuario;

CREATE TABLE administrador (
	codAdmin int AUTO_INCREMENT PRIMARY KEY,
    codUsuario int,
    FOREIGN KEY (codUsuario) REFERENCES cadastroUsuario(codUsuario)
);

INSERT INTO administrador(codUsuario)
VALUES(1);

CREATE TABLE compra(
	codCompra INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nomeCliente VARCHAR(50),   
	cpfCliente VARCHAR(11),
	nomeProdutos VARCHAR (50),
	nomePlanta VARCHAR (50),
	formaPagamento VARCHAR(50));
	
#início de inserção de dados

INSERT INTO plantas(nomePlanta, tipoPlanta, imgPlanta, estoquePlanta)
VALUES (‘Copo de Leite’, ‘Flor’, ‘cdl.png’, ‘50’),
		(‘Pé de Laranja Lima’, ‘Árvore’, ‘pdll.jpeg’, ‘35’);


INSERT INTO produtos (nomeProdutos, estoqueProdutos, tipoProdutos, imgProdutos)
VALUES (‘Vaso de ceramica amarelo’, 7, ‘Vaso’, ‘vasoyellow.png’),
	   (‘Adubo com minhoca’, 4, ‘Adubo’, ‘adub.png’);



INSERT INTO compra(nomeCliente, cpfCliente, nomeProdutos, nomePlanta, formaPagamento)
	VALUES (‘Laura Campestre’, ‘07898507423’, ‘Vaso de cerâmica’, ‘Cartão’),
		    (‘Rodrigo Romano’, ‘23564128712’, ‘Cacto’, ‘Dinheiro’);


