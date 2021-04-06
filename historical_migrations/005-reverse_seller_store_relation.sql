-- Drop foreign key reference to seller table
alter table Product drop foreign key Product_Seller_StoreID_SellerID_fk;

drop index Product_StoreID_SellerID_index on Product;

-- Removed the foreign key from Seller to Store
alter table Seller drop foreign key Seller_Store_StoreID_fk;

drop index Seller_StoreID_SellerID_index on Seller;

drop index StoreID on Seller;

alter table Seller drop column StoreID;

-- Add foreign key from Store to Seller
alter table Store
    add SellerID int not null;

alter table Store
    add constraint Store_Seller_ID_fk
        foreign key (SellerID) references Seller (ID)
            on update cascade on delete cascade;

drop index SellerID on Product;

alter table Product drop column SellerID;

alter table Product
    add constraint Product_Store_ID_fk
        foreign key (StoreID) references Store (ID)
            on update cascade on delete cascade;
