CREATE TABLE Users(
    user_ID Int PRIMARY KEY AUTO_INCREMENT,
    firstname Text,
    lastname Text,
    email Varchar(100),
    password Varchar(100),
    address_ID Int,
    FOREIGN KEY (address_ID) REFERENCES Address(address_ID),
    accessLevel Enum ('Admin','User')
);

CREATE TABLE Address(
    address_ID Int PRIMARY KEY AUTO_INCREMENT,
    postCode Varchar(100),
    houseNum Varchar(100),
    streetName Text,
    county Text,
    city Text
);

CREATE TABLE Orders(
    order_ID Int PRIMARY KEY AUTO_INCREMENT,
    status Enum('Pending','Accepted','Delivered'),
    subTotal Float,
    user_ID Int,
    FOREIGN KEY (user_ID) REFERENCES Users(user_ID),
    orderDate Date
);

CREATE TABLE Order_items(
    order_itemID Int PRIMARY KEY AUTO_INCREMENT,
    order_ID Int,
    FOREIGN KEY (order_ID) REFERENCES Orders(order_ID)
    product_ID Int,
    FOREIGN KEY (product_ID) REFERENCES Products(product_ID)
    quantity Int,
    price Int
);

CREATE TABLE Products(
    product_ID Int PRIMARY KEY AUTO_INCREMENT,
    pName Text,
    description Varchar(255),
    price Float,
    category_ID int,
    FOREIGN KEY (category_ID) REFERENCES Category(category_ID)
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
    category_ID INT PRIMARY KEY AUTO_INCREMENT, 
    sport ENUM('Football', 'Rugby', 'Volleyball', 'Golf', 'Basketball') NOT NULL,
    type ENUM('Men', 'Women', 'Accessories') NOT NULL
);

CREATE TABLE Basket(
    basket_id Int PRIMARY KEY AUTO_INCREMENT,
    item_Count Int,
    subTotal Float,
    user_ID Int,
    FOREIGN KEY (user_ID) REFERENCES Users(user_ID),
    product_ID INT,
    FOREIGN KEY (product_ID) REFERENCES Products(product_ID)
);

CREATE TABLE Returns(
    return_id Int PRIMARY KEY  AUTO_INCREMENT,
    order_itemID Int,
    FOREIGN KEY (order_itemID) REFERENCES Order_items(order_itemID)
    reason Varchar(255),
    returndate Date
);

CREATE TABLE Review(
    review_ID Int PRIMARY KEY  AUTO_INCREMENT,
    user_ID Int,
    FOREIGN KEY (user_ID) REFERENCES Users(user_ID),
    product_ID Int,
    FOREIGN KEY (product_ID) REFERENCES Products(product_ID),
    rating ENUM('1', '2', '3', '4', '5') NOT NULL
);

CREATE TABLE Discount(
    discount_ID Int PRIMARY KEY AUTO_INCREMENT,
    amount Int
);

CREATE TABLE Basket_Items (
    basket_item_id INT PRIMARY KEY AUTO_INCREMENT,
    basket_id INT NOT NULL,
    FOREIGN KEY (basket_id) REFERENCES Basket(basket_id),
    product_ID INT NOT NULL,
    FOREIGN KEY (product_ID) REFERENCES Products(product_ID)
);


ALTER TABLE Products ADD INDEX(product_ID);
ALTER TABLE Users ADD INDEX(address_ID);
ALTER TABLE Orders ADD INDEX(user_ID);
ALTER TABLE Order_items ADD INDEX(order_ID);
ALTER TABLE Order_items ADD INDEX(product_ID);
ALTER TABLE Products ADD INDEX(category_ID);
ALTER TABLE ProductStock ADD INDEX(product_ID);
ALTER TABLE Basket ADD INDEX(product_ID);
ALTER TABLE Basket ADD INDEX(user_ID);
ALTER TABLE Returns ADD INDEX(order_itemID);
ALTER TABLE Review ADD INDEX(user_ID);
ALTER TABLE Review ADD INDEX(product_ID);
ALTER TABLE Basket_Items ADD INDEX(basket_id);
ALTER TABLE Basket_Items ADD INDEX(product_ID);


