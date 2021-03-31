-- Drop foreign keys from orders, and modify their columns to integers
alter table Orders drop foreign key CourierID;

alter table Orders drop foreign key CustomerID;

alter table Orders drop foreign key ProductID;

alter table Orders modify CustomerID int not null;

alter table Orders modify ProductID int not null;

alter table Orders modify CourierID int not null;

-- Drop foreign keys from payment, and change CustomerID to int
alter table Payment drop foreign key Payment_ibfk_1;

alter table Payment modify CustomerID int not null;

-- Drop foreign key from product, and change seller and store ids to ints
alter table Product modify SellerID int not null;

alter table Product drop foreign key StoreID;

alter table Product modify StoreID int not null;

-- Change seller's id to an auto-incrementing int, and drop the foreign key to the store id
alter table Seller modify SellerID int auto_increment;

alter table Seller drop foreign key Seller_ibfk_1;

alter table Seller modify StoreID int not null;

-- Change store's id to an auto-incrementing int
alter table Store modify StoreID int auto_increment;

-- Change courier's id to an auto-incrementing int
alter table Courier modify CourierID int auto_increment;

-- Change customer's id to an auto-incrementing int
alter table Customer modify CustomerID int auto_increment;

-- Create foreign keys on order table
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

-- Create foreign key on payment table
alter table Payment
    add constraint Payment_Customer_CustomerID_fk
        foreign key (CustomerID) references Customer (CustomerID)
            on update cascade on delete cascade;

-- Create foreign key in seller table
alter table Seller
    add constraint Seller_Store_StoreID_fk
        foreign key (StoreID) references Store (StoreID)
            on update cascade on delete cascade;

-- Creates index for store and seller ids in product table
create index Product_StoreID_SellerID_index
    on Product (StoreID, SellerID);

-- Drops existing index of store id, since the new index includes it
drop index StoreID on Product;

-- Adds index to seller table, made up of the store id and the seller id
create index Seller_StoreID_SellerID_index
    on Seller (StoreID, SellerID);

-- Constrains the product's seller and store foreign keys to correspond to those columns in the seller table
alter table Product
    add constraint Product_Seller_StoreID_SellerID_fk
        foreign key (StoreID, SellerID) references Seller (StoreID, SellerID)
            on update cascade on delete cascade;

