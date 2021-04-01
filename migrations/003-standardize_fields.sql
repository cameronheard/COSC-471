-- Split the name column into first and last names
alter table Customer change Name Fname varchar(32) not null;

alter table Customer
    add Lname varchar(32) not null after Fname;

-- Increase the email field's max size and move it to after the name
alter table Customer modify Email varchar(255) not null after Lname;

-- Change phone number to char column
alter table Customer modify PhoneNo char(10) not null;

alter table Customer modify Street varchar(32) not null;

alter table Customer modify City varchar(32) not null;

alter table Customer modify State varchar(32) not null after City;

-- Add country column
alter table Customer
    add Country varchar(32) not null after State;

-- Since the zip code is always 5 numbers long, we can simply store it as a char column
alter table Customer modify Zip char(5) not null;

-- Add apartment number to customer's address
alter table Customer
    add Apt varchar(20) null after Street;

-- Create index for customer by name
create index Customer_Lname_Fname_index
    on Customer (Lname, Fname);

-- This field will be used to log in, so it can't have any duplicates
create unique index Customer_Email_uindex
    on Customer (Email);

-- Rename CustomerID to ID
alter table Customer change CustomerID ID int auto_increment;

-- Rename SellerID to ID
alter table Seller change SellerID ID int auto_increment;

-- Split the name column into first and last names
alter table Seller change SellerName Fname varchar(32) not null;

alter table Seller
    add Lname varchar(32) not null after Fname;

-- Rename email column and move it to after the names
alter table Seller change SellerEmail Email varchar(255) not null after Lname;

-- Change the phone number to a char column
alter table Seller change SellerPhoneNo PhoneNo char(10) not null after Email;

alter table Seller modify Street varchar(32) not null;

-- Not everybody lives in an apartment, so this field may be left null
alter table Seller modify Apt varchar(20) null;

alter table Seller modify City varchar(32) not null;

alter table Seller change StateProvince State varchar(32) not null;

alter table Seller modify Country varchar(32) not null;

alter table Seller change PostalCode Zip char(5) not null after Country;

-- Create index for seller by name
create index Seller_Lname_Fname_index
    on Seller (Lname, Fname);

-- This field will be used to log in, so it can't have any duplicates
create unique index Seller_Email_uindex
    on Seller (Email);

-- Rename CourierID to ID
alter table Courier change CourierID ID int auto_increment;

-- Rename CourierName to Name
alter table Courier change CourierName Name varchar(64) not null;

alter table Courier modify City varchar(32) not null;

alter table Courier change StateProvince State varchar(32) not null;

alter table Courier modify Country varchar(35) not null after State;

alter table Courier change PostalCode Zip char(5) not null;

alter table Courier change CourierPhoneNo PhoneNo char(10) not null after Name;

alter table Courier modify Street varchar(32) not null;

-- Create unique index on courier name
create unique index Courier_Name_uindex
    on Courier (Name);

-- Standardized field names
alter table Store change StoreID ID int auto_increment;

alter table Store change StoreName Name varchar(64) not null;

alter table Store change StoreEmail Email varchar(255) not null after Name;

alter table Store modify Street varchar(32) not null;

alter table Store modify Apt varchar(20) null;

alter table Store modify City varchar(32) not null;

alter table Store change StateProvince State varchar(32) not null;

alter table Store change PostalCode Zip char(5) not null;

alter table Store modify Country varchar(32) not null;

alter table Store change StorePhoneNo PhoneNo char(10) not null;

alter table Store change StoreDescription Description text not null;

-- No two stores should have the same email address
create unique index Store_Email_uindex
    on Store (Email);

-- Standardized field names for product
alter table Product change ProductID ID int auto_increment;

alter table Product change ProductName Name varchar(64) not null;

-- Changed price field to decimal
alter table Product modify Price decimal(8,2) not null;

-- Rename OrderID to ID
alter table Orders change OrderID ID int auto_increment;

-- Changed cost field to decimal
alter table Orders modify Cost decimal(8,2) not null;

-- Renamed OrderDate to Date
alter table Orders change OrderDate Date date not null;

-- Rename PaymentID to ID
alter table Payment change PaymentID ID int auto_increment;

-- Rename PaymentAmount to Amount
alter table Payment change PaymentAmount Amount decimal(8,2) not null;
