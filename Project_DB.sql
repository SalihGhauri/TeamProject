CREATE TABLE Users(
    User_ID Int PRIMARY KEY,
    firstName Text,
    surName Text,
    email Varchar(100),
    password Varchar(100),
    address_ID Int,
    phoneNum Varchar(100),
    accessLevel Enum ('Admin','User')
);

CREATE TABLE Address(
    address_ID Int PRIMARY KEY,
    postCode Varchar(100),
    houseNum Varchar(100),
    streetName Text,
    county Text,
    city Text
);

CREATE TABLE Orders(
    order_ID Int PRIMARY KEY,
    status Enum('Pending','Accepted','Delivered'),
    subTotal Float,
    orderDate Date
);

CREATE TABLE Products(
    product_ID Int PRIMARY KEY,
    pName Text,
    description Varchar(255),
    price Float,
    category_ID int
);

CREATE TABLE ProductStock (
    stock_ID INT PRIMARY KEY AUTO_INCREMENT,
    product_ID INT NOT NULL,                                 
    size ENUM('XS', 'S', 'M', 'L', 'XL', 'XXL') NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (product_ID) REFERENCES Products(product_ID),
    UNIQUE KEY unique_product_size (product_ID, size)
);

CREATE TABLE Category(
    category_ID INT PRIMARY KEY, 
    sport ENUM('Football', 'Rugby', 'Volleyball', 'Golf', 'Basketball') NOT NULL,
    type ENUM('Men', 'Women', 'Accessories') NOT NULL
);

CREATE TABLE Basket(
    basket_id Int PRIMARY KEY,
    item_Count Int,
    subTotal Float,
    product_ID INT
);


ALTER TABLE Products ADD INDEX(product_ID);
