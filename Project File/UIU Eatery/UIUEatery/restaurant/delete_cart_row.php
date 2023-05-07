<?php
// Establish connection with database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "eatery";

$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

// Get the cart row ID from the URL
$cart_id = $_GET['item_name'];
$id = $_GET['id'];
$user = $_GET['user'];
$res = $_GET['res'];

session_start();
     $_SESSION['ii'] =  $id;
     $_SESSION['uu'] =  $user;
     $_SESSION['rr'] =  $res;

// Delete the row from the cart table
$sql = "DELETE FROM cart WHERE item_name = '$cart_id'";

if (mysqli_query($conn, $sql)) {
  // If the row was deleted successfully, redirect to the same page to refresh the cart
  header("Location: cart.php?id={$_SESSION['ii']}&user={$_SESSION['uu']}&res={$_SESSION['rr']}");
  exit();
} else {
  echo "Error deleting record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>
