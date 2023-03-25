<?php
    $showAlert = false; 
    $showError = false; 
    $exists=false;

    include 'db.php';   
    
    $id = $_POST["id"]; 
    $password = $_POST["password"]; 
    $password_conf = $_POST["password_conf"];
    $email = $_POST["email"];
    $phone = $_POST["phone_no"];

    $encrypted_pass = md5($password);
            
    
    $sql = "Select * from student where student_id='$id'";
    $result = mysqli_query($conn, $sql);
    
    $num = mysqli_num_rows($result); 
    
    
    if($num == 0) {
        if($password == $password_conf && $exists == false) {

            $sql = "INSERT INTO `student` ( `student_id`, 
                `password`, email, phone_no) VALUES ('$id', 
                '$encrypted_pass','email', 'phone_no')";
    
            $result = mysqli_query($conn, $sql);
           
            header("Location: student_portal.html");

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