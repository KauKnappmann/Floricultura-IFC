CREATE DATABASE equipe3;
USE equipe3;
DROP DATABASE equipe3;

DROP TABLE Usuario;
CREATE TABLE Usuario(
	cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nome VARCHAR(50),
    sobrenome VARCHAR(50),
	email VARCHAR(100) UNIQUE,
	senha VARCHAR(12),
	dataNasc DATE,
	CPF VARCHAR(11),
	genero VARCHAR (20),
	telefone VARCHAR(20),
    ativo BOOLEAN DEFAULT FALSE,
    hashPassword VARCHAR(45),
    img VARCHAR(100)
    );
    
   # ALTER TABLE Usuario
    #ADD COLUMN ativo BOOLEAN DEFAULT false;
    ALTER TABLE Usuario
    DROP COLUMN ativo;
    
UPDATE Usuario
SET nome = 'Administrador Netree 1'
WHERE cod = 1;

UPDATE Usuario
SET nome = 'Administrador Netree 2'
WHERE cod = 5;
    select * from Usuario;

CREATE TABLE plantas(
cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
tipo VARCHAR(50),
valor double,
img VARCHAR(100),
estoque INT
);
select * from plantas;
#drop table plantas;

CREATE TABLE produtos(
cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(50),
estoque INT,
tipo VARCHAR(50),
valor double,
img VARCHAR(100));
drop table produtos;
SELECT * FROM produtos;

drop table compras;
CREATE TABLE compras(
	cod INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
	nomeCliente VARCHAR(50),   
	cpfCliente VARCHAR(11),
	nomeProdutos VARCHAR (50),
	nomePlanta VARCHAR (50),
	formaPagamento VARCHAR(50));
  DROP TABLE  administrador;
  
CREATE TABLE administrador(
	codAdmin INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    codUsuario INT UNIQUE,
    FOREIGN KEY (codUsuario) REFERENCES Usuario(cod)
);
	
#início de inserção de dados
DROP TABLE plantas;
INSERT INTO plantas(nome, tipo, img, estoque)
VALUES('Copo de Leite', 'Flor', 'copo-de-leite-3.jpg', 2),
('Flor do campo', 'Flor', 'flores-do-campo-1.jpg', 25),
('Girassol', 'Flor', 'arranjo-girassois-3.jpg', 48),
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


INSERT INTO produtos (nomeProdutos, estoqueProdutos, tipoProdutos, img)
VALUES ('Vaso de ceramica amarelo', 7, 'Vaso', 'vasoyellow.png'),
	   ('Adubo com minhoca', 4, 'Adubo', 'adub.png');


INSERT INTO Usuario(nomeUsuario, email, senha, dataNasc, CPF, genero, telefone)
	VALUES ('Adm', 'adm@gmail.com', '123', '1999-11-01', '11111111111', 'N', '47999999999'),
   ('Marcela Leite', 'marcela.leite@ifc.edu.br', '123456', '1983-11-02', '22222222222', 'F', '47988776655');


INSERT INTO compra(nomeCliente, cpfCliente, nomeProdutos, nomePlanta, formaPagamento)
	VALUES ('Laura Campestre', '07898507423', 'Vaso de cerâmica', 'Cacto', 'Cartão'),
		    ('Rodrigo Romano', '23564128712', 'Terra vegetal', 'Cacto', 'Dinheiro');

INSERT INTO administrador(CodUsuario)
VALUES(1),
	  (5);