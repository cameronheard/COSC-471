INSERT INTO `Courier`(`CourierID`, `Name`, `Street`, `Apt`, `City`, `State`, `Zip`, `Country`, `PhoneNo`) VALUES (1, "USPS", "7762 Somerset St", 348, "Randolf", "MA", 2368, "USA", "2576017248");
INSERT INTO `Customer`(`CustomerID`, `Fname`, `Lname`, `PhoneNo`, `Street`, `City`, `Zip`, `State`, `Country`, `Email`, `Password`) VALUES (1, "Stu", "Oarslogs", "7382849144", "395 West Wood Rd", "Tampa", 33470, "FL", "USA", "StuLogIn@gmail.com", "password");
INSERT INTO `Store`(`StoreID`, `StoreName`, `Street`, `Apt`, `City`, `State`, `Zip`, `Country`, `StoreEmail`, `StorePhoneNo`, `StoreDescription`) VALUES (1, "Mains-tree-m Resources", "026 Willo Way", 567, "Oakspeak", "CO", 95395, "USA", "WoodMinistree@hotmail.com", "4371564840", "Sells lots of sticks");
INSERT INTO `Seller`(`ID`, `Fname`, `Lname`, `Street`, `Apt`, `City`, `State`, `PostalCode`, `Country`, `Email`, `PhoneNo`, `StoreID`) VALUES (1, "Benjamin", "Harper", "971 Sawzal Lane", 302, "Waxahatchet", "FL", 33470, "USA", "TimberMerch@gmail.com", "7382849144", 1);
INSERT INTO `Product`(`ProductID`, `ProductName`, `Price`, `Stock`, `SellerID`, `StoreID`) VALUES (1, "Stick", 10, 55, 1, 1);
INSERT INTO `Orders`(`OrderID`, `Cost`, `OrderDate`, `CustomerID`, `ProductID`, `CourierID`) VALUES (1, 20, "2021-4-1", 1, 1, 1);
INSERT INTO `Payment`(`PaymentID`, `PaymentAmount`, `PaymentType`, `CustomerID`) VALUES (1, 100, "Debit", 1);
