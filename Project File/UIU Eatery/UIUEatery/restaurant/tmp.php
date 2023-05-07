<?php
error_reporting(E_ALL); ini_set('display_errors', '1');
$max_id;

#$json = file_get_contents('php://input');
$jsonData = $_POST['json'];

// Decode the JSON data into a PHP array
$data = json_decode($jsonData, true);


// foreach ($data as $row) {
//     echo "Item: " . $row['item'] . "<br>";
//     echo "Price: " . $row['price'] . "<br>";
//     echo "Quantity: " . $row['quantity'] . "<br>";
//     echo "Total: " . $row['total'] . "<br><br>";
// }



$cn = new mysqli('localhost', 'root', '', 'eatery');
$sqln ="SELECT MAX(id) as ID FROM orders";
$resultn = mysqli_query($cn, $sqln);
if ($resultn) {
    while($rown=mysqli_fetch_assoc($resultn)){
        $max_id = $rown['ID'];
    }
}
// close the database connection
mysqli_close($cn);

// connect to the MySQL server
$host = 'localhost';
$username = 'root';
$password = '';
$database = 'eatery';

$connt = mysqli_connect($host, $username, $password, $database);

if (!$connt) {
  die('Connection failed: ' . mysqli_connect_error());
}

// loop through each row of the table data and insert into the MySQL table
foreach ($data as $rowData) {
  $i = $rowData['item'];
  $p = $rowData['price'];
  $q = $rowData['quantity'];
  $t = $rowData['total'];

  $sqll = "INSERT INTO order_details (`order_id`,`item_name`, `base_amount`, `quantity`, `total_price`) VALUES ('$max_id','$i', '$p', '$q', '$t')";

  if (mysqli_query($connt, $sqll)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sqll . "<br>" . mysqli_error($connt);
  }
}

// close the database connection
mysqli_close($connt);

?>
