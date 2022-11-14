DROP DATABASE IF EXISTS Agoradb;
CREATE DATABASE AgoraDB;

USE AgoraDB;
-- SET GLOBAL FOREIGN_KEY_CHECKS=0;
-- DROP TABLES IN ORDER
DROP TABLE IF EXISTS Listing;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Users;


CREATE TABLE Product (
	productID int auto_increment,
    productCode VARCHAR(4) NOT NULL,
    productName VARCHAR(30),
    productPrice DOUBLE(10,2),
    productImage BLOB NOT NULL,
    productDescription VARCHAR(100),
    PRIMARY KEY (productID)
);
INSERT INTO `Product` (`productCode`, `productName`,`productPrice`, `productImage`, `productDescription`) VALUES
('HA22', 'Hammer', 152.00     ,'../Ass/img/hammer.jpg', 'This is a hammer'),
('SC22', 'Screwdriver', 122.00,'../Ass/img/screwdriver.jpg', 'This is a screwdriver'),
('SA22', 'Saw', 122.00        ,('../Ass/img/saw.jpg'), 'This is a saw'),
('Nails', 'Nails', 122.00     ,('../ASs/img/nails.jpg'), 'These are some nails'),
('ME22 Sheet', 'Metal Sheet', 122.00, ('../Ass/img/metalSheet.jpg'), 'This is a sheet of metal'),
('2X22', 'Wood(2x4)', 122.00, ('../Ass/img/wood.jpg'), 'This is a piece of wood');
SELECT * FROM Product;

CREATE TABLE Users (
	usersID int(11) auto_increment primary key not null,
    usersUsername tinytext not null,
    usersPsw longtext not null,
    usersEmail tinytext not null,
    userType tinytext not null
);

DROP TABLE IF EXISTS AdminLogin;
CREATE TABLE IF NOT EXISTS AdminLogin (
  adminID int(11) AUTO_INCREMENT NOT NULL ,
  adminUsername varchar(100) NOT NULL,
  adminPassword varchar(100) NOT NULL,
  PRIMARY KEY (adminID)
);

CREATE TABLE Seller (
    sellerID VARCHAR(4) auto_increment primary key NOT NULL,
    sellerFName VARCHAR(30) NOT NULL,
    sellerEmail VARCHAR(50) NOT NULL,
    productsListed VARCHAR(30),
    PRIMARY KEY (sellerID)
);

CREATE TABLE Buyer (
    buyerID VARCHAR(4) NOT NULL,
    buyerFName VARCHAR(30) NOT NULL,
    buyerEmail VARCHAR(50) NOT NULL,
    productsBought VARCHAR(30),
    PRIMARY KEY (buyerID)
);


CREATE TABLE Listing (
    listingID VARCHAR(4) NOT NULL,
    productCode VARCHAR(4),
    sellerID VARCHAR(4),
    buyerID VARCHAR(4),
    dateListed DATE
);