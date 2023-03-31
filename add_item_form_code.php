  <?php 
                            
    require_once '../db.php';

    session_start();           

    if(isset($_POST['add_itemBTN'])){
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
                                        $sql = "INSERT INTO item (restaurant_id, item_name, stock, price) VALUES ('$restuarant_id', '$item_name','$item_stock' ,'$item_price')";
                                        $result = mysqli_query($conn, $sql);
                                        if($result){
                                             header('location: add_update.php?msg=itemAdded');
                                        }else{
                                            header('location: add_update.php?msg=Error');

                                        }
                                    }

                                }

                      ?>