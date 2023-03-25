<?php
include "db.php";
session_start();
    if(isset($_POST['username']) && isset($_POST['password'])){
    
        $username = $_POST['username'];
        $password = $_POST['password'];

    
        $sql = "SELECT * FROM faculty";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {

                if($row["faculty_username"] === $username && $row["password"] === md5($password)){
                    $_SESSION['username'] = $row['faculty_username'];
                    header("Location: restaurant.php?id={$_SESSION['username']}");
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