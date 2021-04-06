<?php

$servername = "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);
if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = 'CREATE DATABASE IF NOT EXISTS eMarket;';

if(mysqli_query($conn, $sql)) {
  echo "Database has been created";
} else {
  echo "Error creating database: " . mysqli_error($conn);
}
mysqli_close($conn);

$dbname = "eMarket";

$conn = new mysqli($servername, $username, $password, $dbname);
if(!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

$sql = 'CREATE TABLE `Courier`
(
    `CourierID`      varchar(10) NOT NULL,
    `CourierName`    varchar(35) NOT NULL,
    `Street`         varchar(35) NOT NULL,
    `Apt`            varchar(20) NOT NULL,
    `City`           varchar(30) NOT NULL,
    `StateProvince`  varchar(20) NOT NULL,
    `PostalCode`     varchar(5)  NOT NULL,
    `Country`        varchar(35) NOT NULL,
    `CourierPhoneNo` varchar(12) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;


CREATE TABLE `Customer`
(
    `CustomerID` varchar(10) NOT NULL,
    `Name`       varchar(35) NOT NULL,
    `PhoneNo`    varchar(12) NOT NULL,
    `Street`     varchar(35) NOT NULL,
    `City`       varchar(30) NOT NULL,
    `Zip`        varchar(5)  NOT NULL,
    `State`      varchar(20) NOT NULL,
    `Email`      varchar(45) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE `Orders`
(
    `OrderID`    varchar(10) NOT NULL,
    `Cost`       varchar(3)  NOT NULL,
    `OrderDate`  date        NOT NULL,
    `CustomerID` varchar(10) NOT NULL,
    `ProductID`  varchar(10) NOT NULL,
    `CourierID`  varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE `Payment`
(
    `PaymentID`     varchar(10) NOT NULL,
    `PaymentAmount` varchar(3)  NOT NULL,
    `PaymentType`   varchar(30) NOT NULL,
    `CustomerID`    varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE `Product`
(
    `ProductID`   varchar(10) NOT NULL,
    `ProductName` varchar(35) NOT NULL,
    `Price`       varchar(10) NOT NULL,
    `Stock`       int(11)     NOT NULL,
    `SellerID`    varchar(10) NOT NULL,
    `StoreID`     varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE `Seller`
(
    `SellerID`      varchar(10) NOT NULL,
    `SellerName`    varchar(10) NOT NULL,
    `Street`        varchar(35) NOT NULL,
    `Apt`           varchar(20) NOT NULL,
    `City`          varchar(30) NOT NULL,
    `StateProvince` varchar(20) NOT NULL,
    `PostalCode`    varchar(5)  NOT NULL,
    `Country`       varchar(35) NOT NULL,
    `SellerEmail`   varchar(45) NOT NULL,
    `SellerPhoneNo` varchar(12) NOT NULL,
    `StoreID`       varchar(10) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

CREATE TABLE `Store`
(
    `StoreID`          varchar(10) NOT NULL,
    `StoreName`        varchar(35) NOT NULL,
    `Street`           varchar(35) NOT NULL,
    `Apt`              varchar(20) NOT NULL,
    `City`             varchar(30) NOT NULL,
    `StateProvince`    varchar(20) NOT NULL,
    `PostalCode`       varchar(5)  NOT NULL,
    `Country`          varchar(35) NOT NULL,
    `StoreEmail`       varchar(45) NOT NULL,
    `StorePhoneNo`     varchar(12) NOT NULL,
    `StoreDescription` varchar(50) NOT NULL
) ENGINE = InnoDB
  DEFAULT CHARSET = utf8mb4;

ALTER TABLE `Courier`
    ADD PRIMARY KEY (`CourierID`);

ALTER TABLE `Customer`
    ADD PRIMARY KEY (`CustomerID`);

ALTER TABLE `Orders`
    ADD PRIMARY KEY (`OrderID`),
    ADD KEY `CustomerID` (`CustomerID`),
    ADD KEY `ProductID` (`ProductID`),
    ADD KEY `CourierID` (`CourierID`);

ALTER TABLE `Payment`
    ADD PRIMARY KEY (`PaymentID`),
    ADD KEY `CustomerID` (`CustomerID`);

ALTER TABLE `Product`
    ADD PRIMARY KEY (`ProductID`),
    ADD KEY `SellerID` (`SellerID`),
    ADD KEY `StoreID` (`StoreID`);

ALTER TABLE `Seller`
    ADD PRIMARY KEY (`SellerID`),
    ADD KEY `StoreID` (`StoreID`);

ALTER TABLE `Store`
    ADD PRIMARY KEY (`StoreID`);

ALTER TABLE `Orders`
    ADD CONSTRAINT `CourierID` FOREIGN KEY (`CourierID`) REFERENCES `Courier` (`CourierID`),
    ADD CONSTRAINT `CustomerID` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`),
    ADD CONSTRAINT `ProductID` FOREIGN KEY (`ProductID`) REFERENCES `Product` (`SellerID`);

ALTER TABLE `Payment`
    ADD CONSTRAINT `Payment_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `Customer` (`CustomerID`);

ALTER TABLE `Product`
    ADD CONSTRAINT `StoreID` FOREIGN KEY (`StoreID`) REFERENCES `Store` (`StoreID`);

ALTER TABLE `Seller`
    ADD CONSTRAINT `Seller_ibfk_1` FOREIGN KEY (`StoreID`) REFERENCES `Store` (`StoreID`);

ALTER TABLE Orders
    MODIFY OrderID int NOT NULL AUTO_INCREMENT;

ALTER TABLE Payment
    MODIFY PaymentID int NOT NULL AUTO_INCREMENT;

ALTER TABLE Product
    MODIFY ProductID int NOT NULL AUTO_INCREMENT;

alter table Orders drop foreign key CourierID;

alter table Orders drop foreign key CustomerID;

alter table Orders drop foreign key ProductID;

alter table Orders modify CustomerID int not null;

alter table Orders modify ProductID int not null;

alter table Orders modify CourierID int not null;

alter table Payment drop foreign key Payment_ibfk_1;

alter table Payment modify CustomerID int not null;

alter table Product modify SellerID int not null;

alter table Product drop foreign key StoreID;

alter table Product modify StoreID int not null;

alter table Seller modify SellerID int auto_increment;

alter table Seller drop foreign key Seller_ibfk_1;

alter table Seller modify StoreID int not null;

alter table Store modify StoreID int auto_increment;

alter table Courier modify CourierID int auto_increment;

alter table Customer modify CustomerID int auto_increment;

alter table Orders
    add constraint Orders_Courier_CourierID_fk
        foreign key (CourierID) references Courier (CourierID)
            on update cascade on delete cascade;

alter table Orders
    add constraint Orders_Customer_CustomerID_fk
        foreign key (CustomerID) references Customer (CustomerID)
            on update cascade on delete cascade;

alter table Orders
    add constraint Orders_Product_ProductID_fk
        foreign key (ProductID) references Product (ProductID)
            on update cascade on delete cascade;

alter table Payment
    add constraint Payment_Customer_CustomerID_fk
        foreign key (CustomerID) references Customer (CustomerID)
            on update cascade on delete cascade;

alter table Seller
    add constraint Seller_Store_StoreID_fk
        foreign key (StoreID) references Store (StoreID)
            on update cascade on delete cascade;

create index Product_StoreID_SellerID_index
    on Product (StoreID, SellerID);

drop index StoreID on Product;

create index Seller_StoreID_SellerID_index
    on Seller (StoreID, SellerID);

alter table Product
    add constraint Product_Seller_StoreID_SellerID_fk
        foreign key (StoreID, SellerID) references Seller (StoreID, SellerID)
            on update cascade on delete cascade;

            
INSERT INTO `Courier`(`CourierID`, `CourierName`, `Street`, `Apt`, `City`, `StateProvince`, `PostalCode`, `Country`, `CourierPhoneNo`) VALUES (1, "USPS", "7762 Somerset St", 348, "Randolf", "MA", 2368, "USA", "2576017248");
INSERT INTO `Customer`(`CustomerID`, `Name`, `PhoneNo`, `Street`, `City`, `Zip`, `State`, `Email`) VALUES (1, "Stu Oarslogs", "7382849144", "395 West Wood Rd", "Tampa", 33470, "FL", "StuLogIn@gmail.com");
INSERT INTO `Store`(`StoreID`, `StoreName`, `Street`, `Apt`, `City`, `StateProvince`, `PostalCode`, `Country`, `StoreEmail`, `StorePhoneNo`, `StoreDescription`) VALUES (1, "Mains-tree-m Resources", "026 Willo Way", 567, "Oakspeak", "CO", 95395, "USA", "WoodMinistree@hotmail.com", "4371564840", "Sells lots of sticks");
INSERT INTO `Seller`(`SellerID`, `SellerName`, `Street`, `Apt`, `City`, `StateProvince`, `PostalCode`, `Country`, `SellerEmail`, `SellerPhoneNo`, `StoreID`) VALUES (1, "Benjamin K", "971 Sawzal Lane", 302, "Waxahatchet", "FL", 33470, "USA", "TimberMerch@gmail.com", "7382849144", 1);
INSERT INTO `Product`(`ProductID`, `ProductName`, `Price`, `Stock`, `SellerID`, `StoreID`) VALUES (1, "Stick", 10, 55, 1, 1);
INSERT INTO `Orders`(`OrderID`, `Cost`, `OrderDate`, `CustomerID`, `ProductID`, `CourierID`) VALUES (1, 20, "2021-4-1", 1, 1, 1);
INSERT INTO `Payment`(`PaymentID`, `PaymentAmount`, `PaymentType`, `CustomerID`) VALUES (1, 100, "Debit", 1);
';

if(mysqli_multi_query($conn, $sql)) {
  echo "Database has been populated correctly";
} else {
  echo "Error populating database: " . mysqli_error($conn);
}



mysqli_close($conn);

?>