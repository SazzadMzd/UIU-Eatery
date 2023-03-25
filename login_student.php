<?php
include "db.php";
session_start();
    if(isset($_POST['id']) && isset($_POST['password'])){
    
        $id = $_POST['id'];
        $password = $_POST['password'];

    
        $sql = "SELECT * FROM student";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                if($row["student_id"] === $id && $row["password"] === md5($password)){
                    $_SESSION['id'] = $row['student_id'];
                    header("Location: restaurant.php?id={$_SESSION['id']}");
                }
                else{
                    echo "Not found";
                }
            }
        } else {
             echo "0 results";
            }
        }
?>