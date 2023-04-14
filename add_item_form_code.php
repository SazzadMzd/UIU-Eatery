  <?php 
                            
    require_once '../db.php';

    session_start();           

    if(isset($_POST['add_itemBTN'])){
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_stock = $_POST['item_stock'];
        $restuarant_id = $_SESSION['restaurant_id'];


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
                //    echo 'File uploaded successfully';
                } else {
                       // echo 'Failed to upload file';
                }
            } else {
                      // echo 'Error Found';

             }
         }

        // Check if empty
        if(empty($item_name) || empty($item_price) || empty($item_stock)){
            echo "Please fill all the fields";
        }else{
                                       
            $sql = "INSERT INTO item (restaurant_id, item_name, stock, price, image) VALUES ('$restuarant_id', '$item_name','$item_stock' ,'$item_price','$uploadFile')";
            $result = mysqli_query($conn, $sql);
             if($result){
                 header('location: add_update.php?msg=itemAdded');
            }else{
                 header('location: add_update.php?msg=Error');

            }
        }

    }                                   

?>