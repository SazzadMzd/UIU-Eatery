  <?php 
                            
    require_once '../db.php';

    session_start();           

    if(isset($_POST['update_itemBTN'])){
        // Get form data
        $item_name = $_POST['item_name'];
        $item_price = $_POST['item_price'];
        $item_stock = $_POST['item_stock'];
        $restuarant_id = $_SESSION['restaurant_id'];

        // Check if empty
        if(empty($item_name) || empty($item_price) || empty($item_stock)){
            echo "Please fill all the fields";
        }else{
                                           
            // Insert into database
            $sql = "UPDATE item SET stock = '$item_stock', price = '$item_price' WHERE restaurant_id = '$restuarant_id' and item_name = '$item_name'";
            $result = mysqli_query($conn, $sql);
            if($result){
                    header('location: add_update.php?msg=itemUpdated');
            }else{
                 header('location: add_update.php?msg=Error');

            }
        }
    }
                                   


?>