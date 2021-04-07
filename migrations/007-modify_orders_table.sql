-- Replace cost with quantity for orders table
alter table Orders change Cost Quantity int not null;

create index Orders_Date_index
    on Orders (Date desc);

create index Product_Name_index
    on Product (Name);
