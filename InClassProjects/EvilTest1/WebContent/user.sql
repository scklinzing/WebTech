DROP DATABASE if EXISTS userdb;
CREATE DATABASE userdb;
USE userdb;


DROP TABLE IF EXISTS users;
CREATE TABLE users (
        userId       	 int primary key auto_increment,
        username         varchar(100) not null,
        email            varchar(100) not null,
        password         varchar(100)
);

INSERT INTO users (username, email, password)
        VALUES ('Kay1', 'kay1@gmail.com', '123');
INSERT INTO users (username, email, password)
        VALUES ('Kay2', 'kay2@gmail.com', '1234');