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
                    $_SESSION['id'] = $row['faculty_username'];
                    $_SESSION['user_type'] = 'faculty';
                    header("Location: restaurant/restaurant.php?id={$_SESSION['id']}&user={$_SESSION['user_type']}");
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