CREATE TABLE Customer
(
  CustomerID      int       NOT NULL AUTO_INCREMENT,
  cust_firstName    char(50)  NOT NULL ,
  cust_lastName    char(50)  NOT NULL ,
  cust_address char(50)  NULL ,
  cust_city    char(50)  NULL ,
  cust_state   char(5)   NULL ,
  cust_zip     char(10)  NULL ,
  cust_phone char(50)  NULL ,
  cust_email   char(255) NULL ,
  cust_password char(255) NULL,
  PRIMARY KEY (CustomerID)
) ENGINE=InnoDB;

CREATE TABLE Orders
(
    OrderID int NOT NULL AUTO_INCREMENT,
    ord_timestamp int NOT NULL,
    CustomerID int NOT NULL,
    PRIMARY KEY(OrderID)    
) ENGINE=InnoDB;

CREATE TABLE Product_Group
(
    GroupID int NOT NULL AUTO_INCREMENT,
    groupName char(50) NOT NULL,
    imageFolder char(255) NOT NULL,
    PRIMARY KEY(GroupID)
) ENGINE=InnoDB;

CREATE TABLE Product
(
    ProductID int NOT NULL AUTO_INCREMENT,
    GroupID int NOT NULL,
    productName char(50) NOT NULL,
    productPrice char(50) NOT NULL,
    productImage char(255) NOT NULL,
    productDescription char(255) NOT NULL,
    PRIMARY KEY(ProductID)
) ENGINE=InnoDB;

CREATE TABLE Order_Info
(
    InfoID int NOT NULL AUTO_INCREMENT,
    OrderID int NOT NULL,
    ProductID int NOT NULL,
    amount int NOT NULL,
    PRIMARY KEY(InfoID)
) ENGINE=InnoDB;