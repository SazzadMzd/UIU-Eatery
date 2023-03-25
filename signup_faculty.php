<?php
    $showAlert = false; 
    $showError = false; 
    $exists=false;

    include 'db.php';   
    
    $username = $_POST["username"]; 
    $room_no =$_POST["room_no"];
    $email = $_POST["email"];
    $phone_no = $_POST["phone_no"];
    $password = $_POST["password"]; 
    $password_conf = $_POST["password_conf"];
    
    $encrypted_pass = md5($password);
            
    
    $sql = "Select * from faculty where faculty_username='$username'";
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    
    if($num == 0) {
        if($password == $password_conf && $exists == false) {

            $sql = "INSERT INTO `faculty` ( `faculty_username`, 
                `password`, room_no, email, phone_no) VALUES ('$username', 
                '$encrypted_pass','$room_no', '$email', '$phone_no')";
    
            $result = mysqli_query($conn, $sql);
           
            header("Location: faculty_portal.html");

            if ($result) {
                $showAlert = true; 
            }
         }
        else { 
            $showError = true; 
        }    
   }
        if($num>0) {
      $exists= true; 
      echo "User already exist";
   } 

?>