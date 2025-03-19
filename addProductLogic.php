<?php
//connects to db credentials
$dbname = "cs2team10_db";
$dbhost = "localhost";
$username = "cs2team10";
$password = "3WqYX34Scob8B1n";
//connects to database
try{
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
//sets error mode to exception
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $pName = $_POST['pName'];
	$description = $_POST['description'];
    $category_type_id = $_POST['category_type_id'];
    $price = $_POST['price'];
    $brand_id = $_POST['brand_id'];
    $type_id = $_POST['type_id'];
    $image = $_POST['image'];

// Prepares the statements and binds the parameters
    $stmt = $conn->prepare("INSERT INTO Products (pName, description, category_type_id, price, brand_id, type_id, image) VALUES (:pName, :description, :category_type_id, :price, :brand_id, :type_id, :image)");
    $stmt->bindParam(':pName', $pName);
    $stmt->bindParam('description', $description);
    $stmt->bindParam('category_type_id', $category_type_id);
    $stmt->bindParam('price', $price);
	$stmt->bindParam('brand_id', $brand_id);
	$stmt->bindParam('type_id', $type_id);
    $stmt->bindParam('image', $image);
// Executes the statement
    $stmt->execute();

    echo "New product added successfully";
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Closes the connection
$conn = null;
?>