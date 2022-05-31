DROP DATABASE IF EXISTS `productlist`;

CREATE DATABASE IF NOT EXISTS `productlist`;

USE `productlist`;


DROP TABLE IF EXISTS `productlist`;

CREATE TABLE `productlist` (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    sku VARCHAR(30) NOT NULL,
    productName VARCHAR(255) NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    productType TEXT(30) NOT NULL,
    attribute VARCHAR(30) NOT NULL,
    UNIQUE(sku)
);

INSERT INTO `productlist` (sku, productName, price, productType, attribute) VALUES ('JVC200123','Acme DISC',1,'DVD','Size: 700 MB'),('JVC200124','Acme DISC',1,'DVD','Size: 800 MB'),('JVC200125','Acme DISC',1,'DVD','Size: 500 MB'),('JVC200126','Acme DISC',1,'DVD','Size: 1000 MB'),('GGWP0007','War and Peace',20,'Book','Weight: 2KG'),('GGWP0008','War and Peace',20,'Book','Weight: 2.3KG'),('GGWP0009','War and Peace',20,'Book','Weight: 3KG'),('GGWP0010','War and Peace',20,'Book','Weight: 4.5KG'),('TR120555','Chair',40,'Furniture','Dimension: 24x45x15'),('TR120556','Chair',60,'Furniture','Dimension: 24x45x15'),('TR120557','Chair',50,'Furniture','Dimension: 24x45x15'),('TR120558','Chair',40,'Furniture','Dimension: 24x45x15');