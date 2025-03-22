<?php
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

$dbname = "cs2team10_db";
$dbhost = "localhost";
$username = "cs2team10";
$password = "3WqYX34Scob8B1n";

try {
//connects to the database
	$conn = new PDO("mysql:host=$dbhost;dbname=$dbname", $username, $password);
//sets the error mode to exception
 	$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

	$search = $_POST['search'];
 	$stmt = $conn->prepare("SELECT * FROM Orders WHERE user_ID = :search");
	$stmt->bindParam(":search", $search, PDO::PARAM_STR);
 	$stmt->execute();

// sets the resulting array to associative
 	$result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
  	foreach(new TableRows(new RecursiveArrayIterator($stmt->fetchAll())) as $k=>$v) {
    echo $v;
  }
} catch(PDOException $e) {
  echo "Error: " . $e->getMessage();
}

$conn = null;
echo "</table>";
?>