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
      background-color: #e74c3c;
      color: #ffffff;
      border: none;
      border-radius: 10px;
      cursor: pointer;
      font-size: 16px;
    }

    input[type="submit"]:hover {
      background-color: #c0392b;
    }
  </style>
<!--when the form is submitted it will go to this page to process the logic of adding a user-->
    <form action="deleteProductLogic.php" method="post">    
<!--label for the forms-->
        <label for="product_ID">Product ID:</label>
        <input type="int" id="product_ID" name="product_ID" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>