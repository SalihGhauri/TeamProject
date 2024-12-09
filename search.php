<?php
require_once 'connectdb.php';
error_reporting(E_ALL);
ini_set('display_errors', 1);

$search_query = isset($_GET['query']) ? $_GET['query'] : '';

if (!empty($search_query)) {
    try {
        $sql = "SELECT p.*, c.sport, c.type 
                FROM Products p 
                JOIN Category c ON p.category_ID = c.category_ID 
                WHERE p.pName LIKE :search 
                OR p.description LIKE :search 
                OR c.sport LIKE :search
                OR c.type LIKE :search";
        
        $stmt = $conn->prepare($sql);
        $search_term = "%" . $search_query . "%";
        $stmt->bindParam(':search', $search_term, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        echo "Error: " . $e->getMessage();
        $result = [];
    }
} else {
    $result = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Results - Sports Are Us</title>
    
    <!-- CSS Linksheets -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release-pro/v4.0.0/css/solid.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/thinline.css">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/products.css">
    <link rel="stylesheet" href="CSS/home.css">
    <link rel="stylesheet" href="CSS/search.css">
</head>
<body>
    <main>
        <div id="main_header">
            <div class="container">
                <!--NAVIGATION BAR -->
                <nav>
                    <ul>
                        <li><a href="#">About Us </a></li>
                        <li><a href="men.html"> Men </a></li>
                        <li><a href="#">Women </a></li>
                        <li><a href="#">Accessories</a></li>
                    </ul>
                    <!--LOGO -->
                    <img class="logo" src="Images/logo.png" alt="LOGO">
                    <div class="search_basket_user">
                        <div class="search">
                            <form action="search.php" method="GET" class="search-form">
                                <input type="text" name="query" placeholder="Search" class="searchInput">
                                <button type="submit" class="search-button">
                                    <img class="icon" src="Icons/search.svg" alt="SEARCH">
                                </button>
                            </form>
                        </div>
                        <a href="login.html" class="unicons"><img class="icon" src="Icons/user.svg" alt="USER"></i></a>
                        <a href="basket.html" class="unicons"><img class="icon" src="Icons/shopping-basket.svg" alt="BASKET"></i></a>
                    </div>
                </nav>
                <div class="text_slider">
                    <div class="text_wrapper">
                        <h3 class="slider_text">10% Student discount - <a href="signup.html" class="highlight">Join today</a></h3>
                        <h3 class="slider_text alternate_text">Get 10% OFF on your First Purchase Today! Offer valid for a limited time only</h3>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Search Results Section -->
        <h2 class="search-results-title">Search Results for: <?php echo htmlspecialchars($search_query); ?></h2>
        
        <?php if (!empty($result)): ?>
            <div class="products_container">
                <?php foreach($result as $row): ?>
                    <div class="item">
                        <?php if (!empty($row['image'])): ?>
                            <img src="<?php echo htmlspecialchars($row['image']); ?>" alt="<?php echo htmlspecialchars($row['pName']); ?>">
                        <?php else: ?>
                            <img src="Images/fJersey/grey.jpg" alt="Product Image">
                        <?php endif; ?>
                        
                        <div class="text">
                            <span><?php echo htmlspecialchars($row['sport'] . ' - ' . $row['type']); ?></span>
                            <h5><?php echo htmlspecialchars($row['pName']); ?></h5>
                            <h4>£<?php echo number_format($row['price'], 2); ?></h4>
                        </div>
                        <a href="#"><i class="uis uis-heart heart"></i></a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php else: ?>
            <div class="no-results-container">
                <h3>No products found matching your search.</h3>
                <p>Try different keywords or check out our categories.</p>
            </div>
        <?php endif; ?>
    </main>

    <script src="JAVASCRIPT/filter.js"></script>
</body>
</html>