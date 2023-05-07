<?php

    $id = $_POST['id'];
    $user = $_POST['user'];
    $res = $_POST['restaurant'];

      $conny = new mysqli('localhost', 'root', '', 'eatery');
      $sqly = "DELETE FROM cart WHERE customer_id='$id'";
     
      mysqli_query($conny, $sqly);
      mysqli_close($conny);

    // header("Location: menu.php?id=$id&user=$user&res_id=$res");

?>