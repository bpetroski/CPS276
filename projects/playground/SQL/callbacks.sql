CREATE TABLE callbackCustomers
(
  CustomerID      int       NOT NULL AUTO_INCREMENT,
  CxName   char(30)  NOT NULL ,
  CxPhone char(20)  NULL ,
  currentCustomer Boolean,
  CxInterested char(10),
  offeredProduct char(50),
  otherInfo char(255),
  PRIMARY KEY (CustomerID)
) ENGINE=InnoDB;