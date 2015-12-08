DROP DATABASE purchases


CREATE SCHEMA `purchases` ;
CREATE TABLE `purchases`.`data` (
  `purchase` INT NOT NULL AUTO_INCREMENT,
  `fname` VARCHAR(45) NOT NULL,
  `lname` VARCHAR(45) NOT NULL,
  `pack`  VARCHAR(45) NOT NULL,
  `cn` VARCHAR(45) NOT NULL,
  `firm` VARCHAR(45) NOT NULL,
  `cost` INT NOT NULL,
  PRIMARY KEY (`purchase`));