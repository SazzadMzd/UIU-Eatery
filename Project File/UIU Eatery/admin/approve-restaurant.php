<?php 

    require_once '../db.php';

    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "UPDATE `owner` SET `status` = 'accepted' WHERE `owner`.`restaurant_id` = $id";
        $result = mysqli_query($db, $sql);

        if($result) {
            header('location: restaurant_approval_panel.php');
        } else {
            header('location: index.php?approve_msg=failed');
        }
    }


?>