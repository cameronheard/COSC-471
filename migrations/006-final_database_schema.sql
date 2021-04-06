drop database if exists eMarket;
create database eMarket;

create table Courier
(
    ID      int auto_increment
        primary key,
    Name    varchar(64) not null,
    PhoneNo char(10)    not null,
    Street  varchar(32) not null,
    Apt     varchar(20) not null,
    City    varchar(32) not null,
    State   varchar(32) not null,
    Country varchar(35) not null,
    Zip     char(5)     not null,
    constraint Courier_Name_uindex
        unique (Name)
);

create table Customer
(
    ID       int auto_increment
        primary key,
    Fname    varchar(32)  not null,
    Lname    varchar(32)  not null,
    Email    varchar(255) not null,
    PhoneNo  char(10)     not null,
    Password varchar(255) not null,
    Street   varchar(32)  not null,
    Apt      varchar(20)  null,
    City     varchar(32)  not null,
    State    varchar(32)  not null,
    Country  varchar(32)  not null,
    Zip      char(5)      not null,
    constraint Customer_Email_uindex
        unique (Email)
);

create index Customer_Lname_Fname_index
    on Customer (Lname, Fname);

create table Payment
(
    ID          int auto_increment
        primary key,
    Amount      decimal(8, 2) not null,
    PaymentType varchar(30)   not null,
    CustomerID  int           not null,
    constraint Payment_Customer_CustomerID_fk
        foreign key (CustomerID) references Customer (ID)
            on update cascade on delete cascade
);

create index CustomerID
    on Payment (CustomerID);

create table Seller
(
    ID       int auto_increment
        primary key,
    Fname    varchar(32)  not null,
    Lname    varchar(32)  not null,
    Email    varchar(255) not null,
    PhoneNo  char(10)     not null,
    Password varchar(255) not null,
    Street   varchar(32)  not null,
    Apt      varchar(20)  null,
    City     varchar(32)  not null,
    State    varchar(32)  not null,
    Country  varchar(32)  not null,
    Zip      char(5)      not null,
    constraint Seller_Email_uindex
        unique (Email)
);

create index Seller_Lname_Fname_index
    on Seller (Lname, Fname);

create table Store
(
    ID          int auto_increment
        primary key,
    Name        varchar(64)  not null,
    Email       varchar(255) not null,
    Street      varchar(32)  not null,
    Apt         varchar(20)  null,
    City        varchar(32)  not null,
    State       varchar(32)  not null,
    Zip         char(5)      not null,
    Country     varchar(32)  not null,
    PhoneNo     char(10)     not null,
    Description text         not null,
    SellerID    int          not null,
    constraint Store_Email_uindex
        unique (Email),
    constraint Store_Seller_ID_fk
        foreign key (SellerID) references Seller (ID)
            on update cascade on delete cascade
);

create table Product
(
    ID      int auto_increment
        primary key,
    Name    varchar(64)   not null,
    Price   decimal(8, 2) not null,
    Stock   int           not null,
    StoreID int           not null,
    constraint Product_Store_ID_fk
        foreign key (StoreID) references Store (ID)
            on update cascade on delete cascade
);

create table Orders
(
    ID         int auto_increment
        primary key,
    Cost       decimal(8, 2) not null,
    Date       date          not null,
    CustomerID int           not null,
    ProductID  int           not null,
    CourierID  int           not null,
    constraint Orders_Courier_CourierID_fk
        foreign key (CourierID) references Courier (ID)
            on update cascade on delete cascade,
    constraint Orders_Customer_CustomerID_fk
        foreign key (CustomerID) references Customer (ID)
            on update cascade on delete cascade,
    constraint Orders_Product_ProductID_fk
        foreign key (ProductID) references Product (ID)
            on update cascade on delete cascade
);

create index CourierID
    on Orders (CourierID);

create index CustomerID
    on Orders (CustomerID);

create index ProductID
    on Orders (ProductID);
