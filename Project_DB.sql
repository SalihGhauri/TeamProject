CREATE TABLE Users(
    User_ID Int Primary Key,
    firstName Text,
    surName Text,
    email Varchar(100),
    password Varchar(100),
    address_ID Int,
    phoneNum Varchar(100),
    accessLevel Enum ('Admin','User')
);

CREATE TABLE Address(
    address_ID Int,
    postCode Varchar(100),
    houseNum Varchar(100),
    streetName Text,
    county Text,
    city Text
);

CREATE TABLE Orders(
    order_ID Int,
    status Enum('Pending','Accepted','Delivered'),
    subTotal Float,
    orderDate Date
);

CREATE TABLE Products(
    product_ID Int,
    pName Text
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

);


ALTER TABLE Products ADD INDEX(product_ID);
