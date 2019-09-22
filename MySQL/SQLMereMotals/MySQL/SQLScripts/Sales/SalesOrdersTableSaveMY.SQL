use sales_modify;

create table if not exists Categories_orig like Categories;
insert into Categories_orig select * from Categories;

create table if not exists Customers_orig like Customers;
insert into Customers_orig select * from Customers;

create table if not exists Employees_orig like Employees;
insert into Employees_orig select * from Employees;

create table if not exists Order_Details_orig like Order_Details;
insert into Order_Details_orig select * from Order_Details;

create table if not exists Orders_orig like Orders;
insert into Orders_orig select * from Orders;

create table if not exists Product_Vendors_orig like Product_Vendors;
insert into Product_Vendors_orig select * from Product_Vendors;

create table if not exists Products_orig like Products;
insert into Products_orig select * from Products;

create table if not exists Vendors_orig like Vendors;
insert into Vendors_orig select * from Vendors;