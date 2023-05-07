<?php 
    require_once '../db.php';

    session_start(); 
    if (isset($_POST['delete_item'])) {
        
        $restaurant_id = $_POST['restaurant_id'];
        $item_name = $_POST['item_name'];
        $query = "DELETE FROM item WHERE item_name = '$item_name' AND restaurant_id = '$restaurant_id'";
        $result = mysqli_query($conn, $query);
        if ($result) {
            // success message
            header("Location: add_update.php"); // reload the page after deletion
        } else {
            echo 'Record not deleted';
        }
    }
?>