CREATE DATABASE sistema_login;
USE sistema_login;

CREATE TABLE usuarios (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nivel_acesso INT NOT NULL
);
