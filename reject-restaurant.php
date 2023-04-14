<?php 

  //  require_once '../db.php';

    ////if(isset($_GET['id'])) {
       /// $id = $_GET['id'];

       // $sql = "UPDATE `owner` SET `status` = 'accepted' WHERE `owner`.`restaurant_id` = $id";
       // $result = mysqli_query($db, $sql);

        //if($result) {
          //  header('location: index.php?approve_msg=success');
       // } else {
           // header('location: index.php?approve_msg=failed');
       // }
   // }



    require_once '../db.php';


    if(isset($_GET['id'])) {
        $id = $_GET['id'];

        $sql = "DELETE restaurant, owner
        FROM restaurant
        INNER JOIN owner ON restaurant.restaurant_id = owner.restaurant_id
        WHERE restaurant.restaurant_id = $id";

// execute the SQL statement
if (mysqli_query($db, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($db);
}

// close the database connection
mysqli_close($db);

       
    }

?>


