DROP DATABASE IF EXISTS Agoradb;
CREATE DATABASE AgoraDB;

USE AgoraDB;
SET GLOBAL FOREIGN_KEY_CHECKS=0;
-- DROP TABLES IN ORDER
DROP TABLE IF EXISTS Seller;
DROP TABLE IF EXISTS Buyer;
DROP TABLE IF EXISTS Product;
DROP TABLE IF EXISTS Users;
DROP TABLE IF EXISTS Listing;

CREATE TABLE Seller (
    sellerID VARCHAR(4) NOT NULL,
    sellerFName VARCHAR(30),
    sellerLName VARCHAR(30),
    sellerEmail VARCHAR(50),
    productsListed VARCHAR(30),
    PRIMARY KEY (sellerID)
);

LOAD DATA INFILE 'D:/BCDE214/CVS/seller.csv' INTO TABLE Seller
FIELDS TERMINATED BY ','
IGNORE 1 ROWS;
SELECT * FROM Seller;

CREATE TABLE Buyer (
    buyerID VARCHAR(4) NOT NULL,
    buyerFName VARCHAR(30),
    buyerLName VARCHAR(30),
    buyerEmail VARCHAR(50),
    productsBought VARCHAR(30),
    PRIMARY KEY (buyerID)
);

LOAD DATA INFILE 'D:/BCDE214/CVS/buyer.csv' INTO TABLE Buyer
FIELDS TERMINATED BY ','
IGNORE 1 ROWS;
SELECT * FROM Buyer;

CREATE TABLE Product (
    productCode VARCHAR(4) NOT NULL,
    productName VARCHAR(30),
    productPrice DOUBLE(10,2),
    productImage LONGBLOB,
    productDescription VARCHAR(100),
    PRIMARY KEY (productCode)
);

INSERT INTO `Product` (`productCode`, `productName`,`productPrice`, `productImage`, `productDescription`) VALUES
('HA22', 'Hammer', 152.00, 		'../img/hammer.jpeg', 'This is a hammer'),
('SC22', 'Screwdriver', 122.00, '/screwdriver.jpeg', 'This is a screwdriver'),
('SA22', 'Saw', 122.00, 	'	./img/saw.jpeg', 'This is a saw'),
('Nails', 'Nails', 122.00, 	'	/img/nails.jpeg', 'These are some nails'),
('ME22 Sheet', 'Metal Sheet', 122.00, '../metalSheet.jpeg', 'This is a sheet of metal'),
('2X22', 'Wood(2x4)', 122.00, '	wood.jpeg', 'This is a piece of wood');
-- LOAD DATA INFILE 'D:/BCDE214/CVS/product.csv' INTO TABLE Product
-- FIELDS TERMINATED BY ','
-- IGNORE 1 ROWS;
SELECT * FROM Product;

CREATE TABLE Users (
    sellerID VARCHAR(4) NOT NULL,
    buyerID VARCHAR(4) NOT NULL,
    FOREIGN KEY (sellerID)
        REFERENCES Seller (sellerID),
    FOREIGN KEY (buyerID)
        REFERENCES Buyer (buyerID),
    PRIMARY KEY (sellerID , buyerID)
);

LOAD DATA INFILE 'D:/BCDE214/CVS/user.csv' INTO TABLE Users
FIELDS TERMINATED BY ','
IGNORE 1 ROWS;
SELECT * FROM Users;

CREATE TABLE Listing (
    listingID VARCHAR(4) NOT NULL,
    productCode VARCHAR(4),
    sellerID VARCHAR(4),
    buyerID VARCHAR(4),
    dateListed DATE,
    FOREIGN KEY (sellerID)
        REFERENCES Users (sellerID),
    FOREIGN KEY (buyerID)
        REFERENCES Users (buyerID),
    FOREIGN KEY (productCode)
        REFERENCES Product (productCode),
    PRIMARY KEY (listingID)
);

LOAD DATA INFILE 'D:/BCDE214/CVS/listing.csv' INTO TABLE Listing
FIELDS TERMINATED BY ','
IGNORE 1 ROWS;
SELECT * FROM Listing;
