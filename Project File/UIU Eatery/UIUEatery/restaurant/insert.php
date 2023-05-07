<?php
//connect to the database
$conn = mysqli_connect("localhost", "root", "", "eatery");

//check if connection was successful
if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

//get data from AJAX request
$id = $_POST['id'];
$user = $_POST['user'];
$res = $_POST['restaurant'];
$pmnt = $_POST['pmt'];
$dlvry = $_POST['dly'];

//insert data into MySQL table

$sql = "INSERT INTO orders (customer_id, restaurant_name, user_type, payment_method, receiving_method) VALUES ('$id', '$res', '$user', '$pmnt', '$dlvry')";
if(mysqli_query($conn, $sql)){
  echo "Data inserted successfully";
} else {
  echo "Error: " . mysqli_error($conn);
}

//close database connection
mysqli_close($conn);
?>
