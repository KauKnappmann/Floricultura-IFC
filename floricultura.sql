CREATE DATABASE neTree;
USE neTree;
DROP DATABASE neTree;

CREATE TABLE plantas(
codPlanta INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nomePlanta VARCHAR(50),
tipoPlanta VARCHAR(50),
imgPlanta VARCHAR(100),
estoquePlanta VARCHAR(100)
);

CREATE TABLE Usuario(
	codUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nomeUsuario VARCHAR(50),
	email VARCHAR(100),
	senha VARCHAR(12),
	dataNasc DATE,
	CPF VARCHAR(11),
	genero VARCHAR (20),
	telefone VARCHAR(20));
    
    select * from Usuario;


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

CREATE TABLE compra(
	codCompra INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nomeCliente VARCHAR(50),   
	cpfCliente VARCHAR(11),
	nomeProdutos VARCHAR (50),
	nomePlanta VARCHAR (50),
	formaPagamento VARCHAR(50));
	
#início de inserção de dados


INSERT INTO plantas(nomePlanta, tipoPlanta, imgPlanta, estoquePlanta)
VALUES('Copo de Leite', 'Flor', 'cp.png', 2),
('Flor do campo', 'Flor', 'flor.jpeg', 25),
('Girassol', 'Flor', 'grss.png', 48),
('Suculenta', 'Suculenta', 'sucu.jpeg', 2),
('Amarílis Vermelha', 'Flor', 'av.png', 23),
('Amor Perfeito', 'Flor', 'ap.png', 10),
('Azaléia', 'Flor', 'az.png', 32),
('Anturío', 'Flor', 'at.png', 54),
('Boca de leão', 'Flor', 'bd.jpeg', 2),
('Camélia', 'Flor', 'cam.png', 68),
('Kalanchoe', 'Flor', 'kch.jpeg', 7),
('Cinerária', 'Flor', 'cineraria.png', 3),
('Violeta no vasinho', 'Flor', 'vv.png', 35),
('Samambaia', 'Árvore', 's.png', 33),
('Gérbera', 'Flor', 'gerb.jpeg', 50),
('Hortênsia', 'Flor', 'ht.png', 34),
('Hibisco', 'Flor', 'hb.jpeg', 15),
('Mini cactos', 'Cacto', 'mc.jpeg', 40),
('Ipê Amarelo', 'Árvore', 'ip.png', 50),
('Pau Brasil', 'Árvore', 'pb.png', 35),
('Pata de Vaca', 'Árvore','pt.png', 20),
('Quaresmeira', 'Árvore', 'qua.png', 20),
('Bonsai', 'Árvore', 'bon.jpg', 20);


SELECT * FROM plantas;


INSERT INTO produtos (nomeProdutos, estoqueProdutos, tipoProdutos, imgProdutos)
VALUES (‘Vaso de ceramica amarelo’, 7, ‘Vaso’, ‘vasoyellow.png’),
	   (‘Adubo com minhoca’, 4, ‘Adubo’, ‘adub.png’);


INSERT INTO cadastroUsuario(codUsuario, nomeUsuario, email, senha, dataNasc, CPF, genero, telefone)
	VALUES (‘Adm’, ‘adm@gmail.com’, ’123’, ‘1999-11-01’, ‘11111111111’, ‘N’, ‘47999999999’),
   (‘Marcela Leite’, ‘marcela.leite@ifc.edu.br’, ’123456’, ‘’, ‘22222222222’, ‘F’, ‘47988776655’);


INSERT INTO compra(nomeCliente, cpfCliente, nomeProdutos, nomePlanta, formaPagamento)
	VALUES (‘Laura Campestre’, ‘07898507423’, ‘Vaso de cerâmica’, ‘Cartão’),
		    (‘Rodrigo Romano’, ‘23564128712’, ‘Cacto’, ‘Dinheiro’);

INSERT INTO administrador(CodUsuario)
VALUES(1),
	  (2);