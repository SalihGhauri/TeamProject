<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<body>
<!-- creates a search form to look up different  projects-->
<form action="orderSearch.php" method="post">
  <input name="search" id="search" type="text" placeholder="Search by user ID">
  <input type="submit" value="Search">
</form>
</body>
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

//creates the table
echo "<table>";
echo "<tr><th>order_ID</th><th>Status</th><th>SubTotal</th><th>User_ID</th><th>OrderDate</th></tr>";

class TableRows extends RecursiveIteratorIterator {
  function __construct($it) {
    parent::__construct($it, self::LEAVES_ONLY);
  }

  function current() {
    return "<td>" . parent::current(). "</td>";
  }

  function beginChildren() {
    echo "<tr>";
  }

  function endChildren() {
    echo "</tr>" . "\n";
  }
}

try {
//connects to the database
  	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
// sets the error mode to exception
 	 $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//prepares and executes the statement
 	 $stmt = $conn->prepare("SELECT * FROM Orders");
 	 $stmt->execute();


// sets the resulting array to associative
 	 $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}


echo "</table>";

 
} catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}

//Closes the connection
$conn = null;
?>