<?php
error_reporting(E_ALL); ini_set('display_errors', '1');

$stock = 0;

#$json = file_get_contents('php://input');
$jsonData = $_POST['json'];

// Decode the JSON data into a PHP array
$data = json_decode($jsonData, true);

var_dump($data);

foreach ($data as $row) {

    $r = $row['RESNUM'];
    $i = $row['item'];
    $q = $row['quantity'];

    $conn = new mysqli('localhost', 'root', '', 'eatery');
    $sql = "SELECT * FROM item WHERE restaurant_id = '$r' AND item_name='$i'";
    $res = mysqli_query($conn, $sql);

    if ($res) {
        while($row=mysqli_fetch_assoc($res)){
            $stock = $row['stock'];
        }
    }

    mysqli_close($conn);

    $stock = $stock - $q;

    $cn = new mysqli('localhost', 'root', '', 'eatery');
    $sqln ="UPDATE item SET stock='$stock' WHERE restaurant_id = '$r' AND item_name='$i'";
    $resultn = mysqli_query($cn, $sqln);

    mysqli_close($cn);
}

?>
