<?php
session_start();

require_once 'ConnectDB.php'; 

function getCurrentUserId() {
    if (isset($_SESSION['user_id']) && is_numeric($_SESSION['user_id'])) {
        return (int)$_SESSION['user_id'];
    } else {
        header('Location: login.html');
        exit;
    }
}

if (isset($_POST['product_id'], $_POST['quantity']) && is_numeric($_POST['product_id']) && is_numeric($_POST['quantity'])) {
    $product_id = (int)$_POST['product_id'];
    $quantity = (int)$_POST['quantity'];

    if ($quantity > 0) {
        $conn = getConnection();
        $user_id = getCurrentUserId();

        // Fetch product details
        $stmt = $conn->prepare('SELECT price FROM product_table WHERE product_id = ?');
        $stmt->execute([$product_id]);
        $product = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($product) {
            $price = $product['price'];
            $subtotal = $price * $quantity;

            // Check if the item already exists in the basket
            $basketQuery = $conn->prepare('SELECT * FROM basket_table WHERE user_ID = ? AND product_ID = ?');
            $basketQuery->execute([$user_id, $product_id]);
            $basketItem = $basketQuery->fetch(PDO::FETCH_ASSOC);

            if ($basketItem) {
                // Update existing basket item
                $updateStmt = $conn->prepare(
                    'UPDATE basket_table 
                     SET item_Count = item_Count + ?, subTotal = subTotal + ? 
                     WHERE basket_id = ?'
                );
                $updateStmt->execute([$quantity, $subtotal, $basketItem['basket_id']]);
            } else {
                // Insert new item into the basket
                $insertStmt = $conn->prepare(
                    'INSERT INTO basket_table (user_ID, product_ID, item_Count, subTotal) 
                     VALUES (?, ?, ?, ?)'
                );
                $insertStmt->execute([$user_id, $product_id, $quantity, $subtotal]);
            }
        } else {
            echo "Product not found!";
        }
    }
    header('Location: basket.html');
    exit;
}

function fetchBasketItems() {
    $conn = getConnection();
    $user_id = getCurrentUserId();

    $stmt = $conn->prepare(
        'SELECT b.basket_id, p.product_id, p.price, p.image_url, p.type, b.item_Count, b.subTotal 
         FROM basket_table b
         JOIN product_table p ON b.product_ID = p.product_id
         WHERE b.user_ID = ?'
    );
    $stmt->execute([$user_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

$basketItems = fetchBasketItems();
?>
