<?php
require_once '../db.php';
session_start();

if(isset($_POST['update_itemBTN'])){

    // Get form data
    $item_name = $_POST['item_name'];
    $item_price = $_POST['item_price'];
    $item_stock = $_POST['item_stock'];
    $restaurant_id = $_SESSION['restaurant_id'];

    if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
        $fileName = $_FILES['file']['name'];
        $fileTmpName = $_FILES['file']['tmp_name'];
        $fileSize = $_FILES['file']['size'];
        $fileType = $_FILES['file']['type'];
        $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
        $allowedFileExtensions = array('jpg', 'jpeg', 'png');
        if(in_array($fileExt, $allowedFileExtensions)) {
            $uploadDir = '../images/food_items/';
            $uploadFile = $uploadDir . basename($fileName);
            if(move_uploaded_file($fileTmpName, $uploadFile)) {
                // File uploaded successfully
            } else {
                // Failed to upload file
            }
        } else {
            // Error found
        }
    }

    // Check if empty
    if(empty($item_name) || empty($item_price) || empty($item_stock)){
        echo "Please fill all the fields";
    } else {
        // Update item in database
        $stmt = $conn->prepare("UPDATE item SET stock = ?, price = ?, image = ? WHERE restaurant_id = ? AND item_name = ?");
        if(isset($_FILES['file'])){
            $stmt->bind_param("dssis", $item_stock, $item_price, $uploadFile, $restaurant_id, $item_name);
        } else {
            $stmt->bind_param("dssi", $item_stock, $item_price, $restaurant_id, $item_name);
        }

        $result = $stmt->execute();
        if($result){
            header('location: add_update.php?msg=itemUpdated');
        } else {
            header('location: add_update.php?msg=Error');
        }
    }
}
?>
