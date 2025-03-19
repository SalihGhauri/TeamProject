<?php
//connects to db credentials
$dbname = "cs2team10_db";
$dbhost = "localhost";
$username = "cs2team10";
$password = "3WqYX34Scob8B1n";
//connects to the database
try {
  	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
//sets the error mode to exception
  	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<!--when the form is submitted it will go to this page to process the logic of adding a project-->
    <form action="addProductLogic.php" method="post">    
<!--label for the forms-->
        <label for="pName">productName:</label>
        <input type="text" id="pName" name="pName" required><br><br>
        
        <label for="description">Description:</label>
        <input type="text" id="description" name="description" required><br><br>
    
        <label for="category_type_id">Category ID:</label>
        <input type="int" id="category_type_id" name="category_type_id" required><br><br>
               
       <label for="price">Price:</label>
        <input type="float" id="price" name="price" required><br><br>
       
       <label for="brand_id">Brand ID:</label>
        <input type="int" id="brand_id" name="brand_id" required><br><br>
       
       <label for="type_id">Type ID:</label>
        <input type="int" id="type_id" name="type_id" required><br><br>
       
       <label for="image">Image Path:</label>
        <input type="varchar" id="image" name="image" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>