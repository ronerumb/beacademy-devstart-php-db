CREATE DATABASE db_store;

USE db_store;

CREATE TABLE tb_category (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL ,
    description VARCHAR(100) NOT NULL
);

CREATE TABLE tb_product (
    id INT(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR (30) NOT NULL ,
    description VARCHAR (100) NOT NULL ,
    photo VARCHAR(255) NOT NULL ,
    value FLOAT (10,2) NOT NULL ,
    category_id INT(11) NOT NULL,
    quantity INT(5) NOT NULL,
    created_at DATETIME NOT NULL
);

INSERT INTO tb_category (name, description) VALUES
('Celulares','Celulares de diversas marcas'),
('Games','Consoles e jogos'),
('Computadores','Notebook e acessórios');

INSERT INTO tb_product (name, description, photo, value, category_id, quantity, created_at) VALUES
('Iphone 11','Celular de ultima geração','https://m.media-amazon.com/images/I/71iO2R+CLjL._AC_SX522_.jpg',4.300,1,3,'2022-06-15'),
('PlayStation 5','Video game lançamento','https://www.comboinfinito.com.br/principal/wp-content/uploads/2021/11/ps5-aumento-de-peco.jpg',5.300,2,10,'2022-06-15'),