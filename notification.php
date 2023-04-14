<?php
    session_start();
    $user= $_SESSION['id'];
    $conn = new mysqli('localhost', 'root', '', 'eatery');
    $query = "UPDATE `orders` SET `read_status` = '1' WHERE `orders`.`customer_id` = '$user';";
    mysqli_query($conn, $query);
    return 'success';

?> 