<?php
session_start();
    $type = $_SESSION['user_type'];
    $user_id =  $_SESSION['id'];
    $res_id = $_GET['res_id'];
$conn = new mysqli('localhost', 'root', '', 'eatery');

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Get the item ID from the URL parameter
$item_name = $_GET['item_name'];
$result = mysqli_query($conn, "SELECT price FROM item WHERE item_name = '$item_name'");
$row = mysqli_fetch_assoc($result);
$base_price = $row['price'];

// Insert the item into the cart
$sql = "INSERT INTO cart (customer_id, user_type, item_name, base_price, quantity) VALUES ('$user_id', '$type', '$item_name', '$base_price', 1)";
mysqli_query($conn, $sql);

echo "<script>alert('Item added to cart!'); window.location = '../restaurant/menu.php?res_id=$res_id';</script>";
// Close the database connection
mysqli_close($conn);

exit;
?>
