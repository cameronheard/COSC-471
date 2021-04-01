/*
 As per PHP's documentation, the password field will be stored as a varchar, as the length of the string generated by
 PHP's password_hash() function could very well increase in the future.
 */

-- Add password field to Customer table
alter table Customer
    add Password varchar(255) not null after PhoneNo;

-- Add password field to Seller table
alter table Seller
    add Password varchar(255) not null after PhoneNo;