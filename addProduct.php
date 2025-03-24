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
<style>
    body {
      background-color: #1c252b;
      font-family: Arial, sans-serif;
      color: #ffffff;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
      margin: 0;
      padding: 0;
    }

    .form-container {
      background-color: #2e3a42;
      padding: 30px;
      border-radius: 15px;
      width: 400px;
      box-shadow: 0 4px 10px #000000;
    }

    .form-container h1 {
      text-align: center;
      margin-bottom: 25px;
      font-size: 24px;
      color: #ffffff;
    }

    label {
      display: block;
      margin-bottom: 6px;
      font-weight: bold;
      color: #ffffff;
    }

    input[type="text"],
    input[type="number"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 15px;
      border-radius: 10px;
      border: none;
      background-color: #1c252b;
      color: #ffffff;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #27ae60;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #219150;
    }
  </style>
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