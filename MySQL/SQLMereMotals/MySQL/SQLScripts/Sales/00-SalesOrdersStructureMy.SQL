CREATE DATABASE sales;

use sales;

CREATE TABLE Categories (
	CategoryID int NOT NULL DEFAULT 0 ,
	CategoryDescription nvarchar (75) NULL 
);

CREATE TABLE Customers (
	CustomerID int NOT NULL ,
	CustFirstName nvarchar (25) NULL ,
	CustLastName nvarchar (25) NULL ,
	CustStreetAddress nvarchar (50) NULL ,
	CustCity nvarchar (30) NULL ,
	CustState nvarchar (2) NULL ,
	CustZipCode nvarchar (10) NULL ,
	CustAreaCode smallint NULL DEFAULT 0 ,
	CustPhoneNumber nvarchar (8) NULL 
);

CREATE TABLE Employees (
	EmployeeID int NOT NULL ,
	EmpFirstName nvarchar (25) NULL ,
	EmpLastName nvarchar (25) NULL ,
	EmpStreetAddress nvarchar (50) NULL ,
	EmpCity nvarchar (30) NULL ,
	EmpState nvarchar (2) NULL ,
	EmpZipCode nvarchar (10) NULL ,
	EmpAreaCode smallint NULL DEFAULT 0 ,
	EmpPhoneNumber nvarchar (8) NULL , 
        EmpBirthDate date NULL
);

CREATE TABLE Order_Details (
	OrderNumber int NOT NULL DEFAULT 0 ,
	ProductNumber int NOT NULL DEFAULT 0 ,
	QuotedPrice decimal (15, 2) NULL DEFAULT 0 ,
	QuantityOrdered smallint NULL DEFAULT 0 
);

CREATE TABLE Orders (
	OrderNumber int NOT NULL DEFAULT 0 ,
	OrderDate date NULL ,
	ShipDate date NULL ,
	CustomerID int NULL DEFAULT 0,
	EmployeeID int NULL DEFAULT 0
);

CREATE TABLE Product_Vendors (
	ProductNumber int NOT NULL DEFAULT 0 ,
	VendorID int NOT NULL DEFAULT 0 ,
	WholesalePrice decimal (15, 2) NULL DEFAULT 0 ,
	DaysToDeliver smallint NULL DEFAULT 0
);

CREATE TABLE Products (
	ProductNumber int NOT NULL DEFAULT 0,
	ProductName nvarchar (50) NULL ,
	ProductDescription nvarchar (100) NULL ,
	RetailPrice decimal (15, 2) NULL DEFAULT 0 ,
	QuantityOnHand smallint NULL DEFAULT 0 ,
	CategoryID int NULL DEFAULT 0
);

CREATE TABLE Vendors (
	VendorID int NOT NULL ,
	VendName nvarchar (25) NULL ,
	VendStreetAddress nvarchar (50) NULL ,
	VendCity nvarchar (30) NULL ,
	VendState nvarchar (2) NULL ,
	VendZipCode nvarchar (10) NULL ,
	VendPhoneNumber nvarchar (15) NULL ,
	VendFaxNumber nvarchar (15) NULL ,
	VendWebPage text NULL ,
	VendEMailAddress nvarchar (50) NULL 
) ;

CREATE TABLE ztblMonths (
	MonthYear nvarchar (15) NOT NULL ,
        YearNumber smallint NOT NULL ,
        MonthNumber smallint NOT NULL ,
        MonthStart date NOT NULL ,
        MonthEnd date NOT NULL ,
        January smallint NOT NULL DEFAULT 0 ,
        February smallint NOT NULL DEFAULT 0 ,
        March smallint NOT NULL DEFAULT 0 ,
        April smallint NOT NULL DEFAULT 0 ,
        May smallint NOT NULL DEFAULT 0 ,
        June smallint NOT NULL DEFAULT 0 ,
        July smallint NOT NULL DEFAULT 0 ,
        August smallint NOT NULL DEFAULT 0 ,
        September smallint NOT NULL DEFAULT 0 ,
        October smallint NOT NULL DEFAULT 0 ,
        November smallint NOT NULL DEFAULT 0 ,
        December smallint NOT NULL DEFAULT 0 
) ;


CREATE TABLE ztblPriceRanges ( 
        PriceCategory nvarchar (20) NOT NULL ,
        LowPrice decimal (15,2) NULL ,
        HighPrice decimal (15,2) NULL
) ;


CREATE TABLE ztblPurchaseCoupons (
        LowSpend decimal (15,2) NOT NULL ,
        HighSpend decimal (15,2) NULL ,
        NumCoupons smallint NULL DEFAULT 0 
) ;


CREATE TABLE ztblSeqNumbers (
        Sequence int NOT NULL DEFAULT 0 
) ;


ALTER TABLE Categories ADD 
	CONSTRAINT Categories_PK PRIMARY KEY   
	(
		CategoryID
	)  ;

 CREATE  INDEX CategoryID ON Categories(CategoryID);

ALTER TABLE Customers ADD 
	CONSTRAINT Customers_PK PRIMARY KEY   
	(
		CustomerID
	)  ;

 CREATE  INDEX CustAreaCode ON Customers(CustAreaCode);

 CREATE  INDEX CustZipCode ON Customers(CustZipCode);

ALTER TABLE Employees ADD 
	CONSTRAINT Employees_PK PRIMARY KEY   
	(
		EmployeeID
	)  ;

 CREATE  INDEX EmpAreaCode ON Employees(EmpAreaCode);

 CREATE  INDEX EmpZipCode ON Employees(EmpZipCode);

ALTER TABLE Order_Details ADD 
	CONSTRAINT Order_Details_PK PRIMARY KEY   
	(
		OrderNumber,
		ProductNumber
	)  ;

 CREATE  INDEX OrdersOrderDetails ON Order_Details(OrderNumber);

 CREATE  INDEX ProductsOrderDetails ON Order_Details(ProductNumber);

ALTER TABLE Orders ADD 
	CONSTRAINT Orders_PK PRIMARY KEY   
	(
		OrderNumber
	)  ;

 CREATE  INDEX CustomerID ON Orders(CustomerID);

 CREATE  INDEX EmployeeID ON Orders(EmployeeID);

ALTER TABLE Product_Vendors ADD 
	CONSTRAINT Product_Vendors_PK PRIMARY KEY   
	(
		ProductNumber,
		VendorID
	)  ;

 CREATE  INDEX ProductsProductVendors ON Product_Vendors(ProductNumber);

 CREATE  INDEX VendorID ON Product_Vendors(VendorID);

ALTER TABLE Products ADD 
	CONSTRAINT roducts_PK PRIMARY KEY   
	(
		ProductNumber
	)  ;

 CREATE  INDEX CategoriesProducts ON Products(CategoryID);

ALTER TABLE Vendors ADD 
	CONSTRAINT Vendors_PK PRIMARY KEY   
	(
		VendorID
	)  ;

 CREATE  INDEX VendZipCode ON Vendors(VendZipCode);

ALTER TABLE ztblMonths ADD
 	CONSTRAINT ztblMonths_PK PRIMARY KEY 
	(
		YearNumber, 
                MonthNumber
	) ;


 CREATE  UNIQUE INDEX Month_End ON ztblMonths(MonthEnd) ;


 CREATE  UNIQUE INDEX Month_Start ON ztblMonths(MonthStart) ;


 CREATE  UNIQUE INDEX Month_Year ON ztblMonths(MonthYear) ;


ALTER TABLE ztblPriceRanges ADD 
	CONSTRAINT ztblPriceRanges_PK PRIMARY KEY 
	(
		PriceCategory 
	) ;


ALTER TABLE ztblPurchaseCoupons ADD 
	CONSTRAINT ztblPurchaseCoupons_PK PRIMARY KEY 
	( 
		LowSpend
	) ;


 CREATE  INDEX Num_Coupons ON ztblPurchaseCoupons(NumCoupons) ;


ALTER TABLE ztblSeqNumbers ADD 
        CONSTRAINT ztblSeqNumbers_PK PRIMARY KEY
        (
                Sequence
        ) ;


ALTER TABLE Order_Details ADD 
	CONSTRAINT Order_Details_FK00 FOREIGN KEY 
	(
		OrderNumber
	) REFERENCES Orders (
		OrderNumber
	),
	ADD CONSTRAINT Order_Details_FK01 FOREIGN KEY 
	(
		ProductNumber
	) REFERENCES Products (
		ProductNumber
	);

ALTER TABLE Orders ADD 
	CONSTRAINT Orders_FK00 FOREIGN KEY 
	(
		CustomerID
	) REFERENCES Customers (
		CustomerID
	),
	ADD CONSTRAINT Orders_FK01 FOREIGN KEY 
	(
		EmployeeID
	) REFERENCES Employees (
		EmployeeID
	);

ALTER TABLE Product_Vendors ADD 
	CONSTRAINT Product_Vendors_FK00 FOREIGN KEY 
	(
		ProductNumber
	) REFERENCES Products (
		ProductNumber
	),
	ADD CONSTRAINT Product_Vendors_FK01 FOREIGN KEY 
	(
		VendorID
	) REFERENCES Vendors (
		VendorID
	);

ALTER TABLE Products ADD 
	CONSTRAINT Products_FK00 FOREIGN KEY 
	(
		CategoryID
	) REFERENCES Categories (
		CategoryID
	);


