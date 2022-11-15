DROP DATABASE IF EXISTS Agoradb;
CREATE DATABASE AgoraDB;

USE AgoraDB;
-- SET GLOBAL FOREIGN_KEY_CHECKS=0;
-- DROP TABLES IN ORDER
DROP TABLE IF EXISTS Listing;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS orders;
DROP TABLE IF EXISTS Seller;
DROP TABLE IF EXISTS Buyer;
DROP TABLE IF EXISTS AdminLogin;


CREATE TABLE Product (
    productCode VARCHAR(4) NOT NULL,
    productName VARCHAR(30),
    productPrice DOUBLE(10,2),
    productImage BLOB NOT NULL,
    productDescription VARCHAR(100),
    PRIMARY KEY (productCode)
);
INSERT INTO `Product` (`productCode`, `productName`,`productPrice`, `productImage`, `productDescription`) VALUES
('HA22', 'Hammer', 152.00     ,'../Ass/img/hammer.jpg', 'This is a hammer'),
('SC22', 'Screwdriver', 122.00,'../Ass/img/screwdriver.jpg', 'This is a screwdriver'),
('SA22', 'Saw', 122.00        ,('../Ass/img/saw.jpg'), 'This is a saw'),
('Nails', 'Nails', 122.00     ,('../ASs/img/nails.jpg'), 'These are some nails'),
('ME22 Sheet', 'Metal Sheet', 122.00, ('../Ass/img/metalSheet.jpg'), 'This is a sheet of metal'),
('2X22', 'Wood(2x4)', 122.00, ('../Ass/img/wood.jpg'), 'This is a piece of wood');
SELECT * FROM Product;

DROP TABLE IF EXISTS Listing;
CREATE TABLE Listing (
    listingID VARCHAR(4) NOT NULL PRIMARY KEY,
    productCode varchar(4),
    sellerID int,
    foreign key (productCode) REFERENCES Product(productCode),
    foreign key (sellerID) REFERENCES Seller(sellerID)
);

CREATE TABLE Users (
	usersID int(11) auto_increment primary key not null,
    usersUsername tinytext not null,
    usersPsw longtext not null,
    usersEmail tinytext not null,
    userType tinytext not null
);

DROP TABLE IF EXISTS BusinessLogin;
CREATE TABLE IF NOT EXISTS BusinessLogin (
	businessID int primary key,
    businessName varchar(20),
    businessEmail varchar(50),
    businessPsw varchar(50)
);

CREATE TABLE Seller (
    sellerID int auto_increment primary key NOT NULL,
    usersID int(11),
    sellerFName VARCHAR(30) NOT NULL,
    sellerEmail VARCHAR(50) NOT NULL,
    sellerPsw VARCHAR(50) NOT NULL,
    foreign key (usersID) REFERENCES Users(usersID)
);

CREATE TABLE Buyer (
    buyerID VARCHAR(4) NOT NULL,
    usersID int(11),
    buyerFName VARCHAR(30) NOT NULL,
    buyerEmail VARCHAR(50) NOT NULL,
    productsBought VARCHAR(30),
    PRIMARY KEY (buyerID),
    foreign key (usersID) REFERENCES Users(usersID)
);

DROP TABLE IF EXISTS Orders;
CREATE TABLE Orders(
	orderNum int PRIMARY KEY,
	listingID varchar(4),
    buyerID varchar(4),
    foreign key (listingID) REFERENCES Listing(listingID),
    foreign key (buyerID) REFERENCES Buyer(buyerID)
);