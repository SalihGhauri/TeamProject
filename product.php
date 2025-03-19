<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Page</title>

    <!-- CSS Linksheets -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release-pro/v4.0.0/css/solid.css">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/thinline.css">
    <link rel="stylesheet" href="CSS/general.css">
    <link rel="stylesheet" href="CSS/header.css">
    <link rel="stylesheet" href="CSS/Footer.css">
    <link rel="stylesheet" href="CSS/products.css">
    <link rel="stylesheet" href="CSS/home.css">
</head>

<body>
    <main>
        <!-- TOP MAIN NAV BAR -->
        <div id="main_header">
            <div class="header_container">
                <!--LOGO -->
                <a href="index.html"><img class="logo" src="Images/logo.png" alt="LOGO"></a>
                
                <!--NAVIGATION BAR -->
                <nav>
                    <ul>
                        <li><a href="index.html">Home </a></li>
                        <li><a href="men.html"> Men </a></li>
                        <li><a href="#">Women </a></li>
                        <li><a href="product.html">Categories</a>
                            <ul>
                                <li><a href="basketball.html">Basketball</a></li>
                                <li><a href="football.html">Football</a></li>
                                <li><a href="rugby.html">Rugby</a></li>
                                <li><a href="volleyball.html">Volleyball</a></li>
                                <li><a href="golf.html">Golf</a></li>
                            </ul>
                        </li>
                        <li><a href="aboutus.html">About Us</a></li>
                        <li><a href="contactus.html">Contact Us</a></li>
                    </ul>
                    <div class="search_basket_user">
                        <div class="search">
                            <form action="search.php" method="GET" class="search-form">
                                <input type="text" name="query" placeholder="Search" class="searchInput">
                                <button type="submit" class="search-button">
                                    <img class="icon" src="Icons/search.svg" alt="SEARCH">
                                </button>
                            </form>
                        </div>
                        <a href="login.html" class="unicons"><img class="icon" src="Icons/user.svg" alt="USER"></a>
                        <a href="basket.html" class="unicons"><img class="icon" src="Icons/shopping-basket.svg" alt="BASKET"></a>
                    </div>
                </nav>
            </div>
            <div class="text_slider">
                <div class="text_wrapper">
                    <h3 class="slider_text">10% Student discount - <a href="signup.html" class="highlight">Join today</a></h3>
                    <h3 class="slider_text alternate_text">Get 10% OFF on your First Purchase Today! Offer valid for a limited time only</h3>
                </div>
            </div>
        </div>

        <!-- MAIN CONTENT AREA -->
        <div class="side_by_side">
            <!-- SIDE NAVIGATION -->
            <div class="shop-by">
                <h3>Shop By</h3>
                <div class="category">
                    <details>
                        <summary>Category</summary>
                        <ul>
                            <li>
                                <input type="radio" id="basketball" name="category" onclick="redirectToCategory('basketball')">
                                <label for="basketball">Basketball</label>
                            </li>
                            <li>
                                <input type="radio" id="football" name="category" onclick="redirectToCategory('football')">
                                <label for="football">Football</label>
                            </li>
                            <li>
                                <input type="radio" id="rugby" name="category" onclick="redirectToCategory('rugby')">
                                <label for="rugby">Rugby</label>
                            </li>
                            <li>
                                <input type="radio" id="volleyball" name="category" onclick="redirectToCategory('volleyball')">
                                <label for="volleyball">Volleyball</label>
                            </li>
                            <li>
                                <input type="radio" id="golf" name="category" onclick="redirectToCategory('golf')">
                                <label for="golf">Golf</label>
                            </li>
                        </ul>
                    </details>
                </div>

                <!-- FILTERS SECTION -->
                <div class="filters">
                    <h3>Filter Products</h3>
                    <div>
                        <label for="brandFilter">Brand:</label>
                        <select id="brandFilter">
                            <option value="all">All</option>
                            <option value="Nike">Nike</option>
                            <option value="Adidas">Adidas</option>
                            <option value="Puma">Puma</option>
                        </select>
                    </div>
                    <div>
                        <label for="priceFilter">Price:</label>
                        <select id="priceFilter">
                            <option value="low-high">Low to High</option>
                            <option value="high-low">High to Low</option>
                        </select>
                    </div>
                    <button id="applyFilters">Apply Filters</button>
                </div>
            </div>

            <!-- PRODUCTS GRID -->
            <div class="products_container" id="productContainer">
                <!-- Sample Product Items -->
                <div class="item">
                    <img src="Images/items/grey.jpg" alt="Product 1">
                    <div class="text">
                        <span>Brand</span>
                        <h5>Product 1</h5>
                        <h4>Price</h4>
                    </div>
                    <a href="previousorder.html"><i class="uis uis-heart heart"></i></a>
                </div>
                <div class="item">
                    <img src="Images/items/grey.jpg" alt="Product 2">
                    <div class="text">
                        <span>Brand</span>
                        <h5>Product 2</h5>
                        <h4>Price</h4>
                    </div>
                    <a href="previousorder.html"><i class="uis uis-heart heart"></i></a>
                </div>
                <!-- Add more product items as needed -->
            </div>
        </div>

        <!-- FOOTER -->
        <div class="footer-clean">
            <footer>
                <div class="container">
                    <div class="columns">
                        <ul>
                            <li>
                                <h4>Support</h4>
                            </li>
                            <li><a href="#">FAQ</a></li>
                            <li><a href="#">Refund request</a></li>
                            <li><a href="#">delivery information</a></li>
                        </ul>
                        <ul>
                            <li>
                                <h4>Account</h4>
                            </li>
                            <li><a href="#">manage account</a></li>
                            <li><a href="#">Payment details</a></li>
                            <li><a href="#">Purchase history</a></li>
                        </ul>
                        <ul>
                            <li>
                                <h4>Additional information</h4>
                            </li>
                            <li><a href="#">Privacy policy</a></li>
                            <li><a href="#">Terms of use</a></li>
                            <li><a href="#">Terms of sale</a></li>
                        </ul>
                        <div class="col-lg-3 item social">
                            <a href="#"><img class="icon ion-social-facebook" src="Images/instagram.jpg" alt="insta"></a>
                            <a href="#"><img class="icon ion-social-X" src="Images/X.png" alt="X"></a>
                            <a href="#"><img class="icon ion-social-snapchat" src="Images/youtube.png" alt="youtube"></a>
                            <a href="#"><img class="icon ion-social-instagram" src="Images/facebook.png" alt="facebook"></a>
                            <p class="copyright">Sports are us © 2024</p>
                        </div>
                    </div>
                </div>
            </footer>
        </div>
    </main>
    <script src="JAVASCRIPT/filter.js"></script>
</body>
<?php
// Get filter values from GET request
$brand = isset($_GET['brand']) ? $_GET['brand'] : 'all';
$priceOrder = isset($_GET['price']) ? $_GET['price'] : 'low-high';

// Build the query dynamically
$query = "SELECT * FROM products WHERE 1";

if ($brand !== 'all') {
    $query .= " AND brand = '$brand'";
}

if ($priceOrder === 'low-high') {
    $query .= " ORDER BY price ASC";
} else {
    $query .= " ORDER BY price DESC";
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="item">';
        echo '<img src="Images/items/' . $row["image"] . '" alt="' . $row["name"] . '">';
        echo '<div class="text">';
        echo '<span>' . $row["brand"] . '</span>';
        echo '<h5>' . $row["name"] . '</h5>';
        echo '<h4>$' . $row["price"] . '</h4>';
        echo '</div>';
        echo '<a href="previousorder.html"><i class="uis uis-heart heart"></i></a>';
        echo '</div>';
    }
} else {
    echo "<p>No products found.</p>";
}
?>

</html>
