CREATE TABLE Users{
    User_ID Int Primary Key,
    firstName String,
    surName String,
    email Varchar(100),
    password Varchar(100),
    address_ID Int,
    phoneNum Varchar(100),
    accessLevel Enum ('Admin','User')
}

CREATE TABLE Address{
    address_ID Int,
    postCode Varchar(100),
    houseNum Varchar(100),
    streetName String,
    county String,
    city String,
}

CREATE TABLE Orders{
    order_ID Int,
    status Enum('Pending','Accepted','Delivered')
    subTotal Float,
    orderDate Date,
}

CREATE TABLE Products{
    product_ID Int,
    pName String,
    
}

CREATE TABLE ProductStock (
    stock_ID INT PRIMARY KEY AUTO_INCREMENT,
    productId INT NOT NULL,                                 
    size ENUM('XS', 'S', 'M', 'L', 'XL', 'XXL') NOT NULL,
    quantity INT NOT NULL DEFAULT 0,
    FOREIGN KEY (productId) REFERENCES Products(product_ID),
    UNIQUE KEY unique_product_size (productId, size)
);

CREATE TABLE Category

