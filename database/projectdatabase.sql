DROP DATABASE IF EXISTS projectdatabase;
CREATE DATABASE IF NOT EXISTS projectdatabase;

USE  projectdatabase;

DROP TABLE IF EXISTS users;
CREATE TABLE IF NOT EXISTS users (
    username VARCHAR(60) NOT NULL PRIMARY KEY,
    password VARCHAR(60) NOT NULL,
    type VARCHAR(20) NOT NULL
);

DROP TABLE IF EXISTS manufacturers;
CREATE TABLE IF NOT EXISTS manufacturers (
    admin VARCHAR(60) REFERENCES users(username),
    mname VARCHAR(60) NOT NULL,
    mdescription VARCHAR(255)
);

DROP TABLE IF EXISTS products;
CREATE TABLE IF NOT EXISTS products (
    pid INT(10) AUTO_INCREMENT NOT NULL PRIMARY KEY,
    pname VARCHAR(60) NOT NULL,
    type VARCHAR(60) NOT NULL,
    pdescription VARCHAR(255),
    price DOUBLE(10,2) NOT NULL,
    manufacturer VARCHAR(60) REFERENCES users(username)
    
);

DROP TABLE IF EXISTS cart;
CREATE TABLE IF NOT EXISTS cart (
    buyer VARCHAR(60) REFERENCES users(username),
    product INT(10) REFERENCES products(pid),
    delivery_address VARCHAR(100),
    quantity INT(2)
);
