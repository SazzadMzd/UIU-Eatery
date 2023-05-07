<?php 

    session_start();
    require_once '../../db.php';
    if(isset($_POST['Complaint_submit_button'])){
        $remarks = $_POST['remarks'];
        $type = $_SESSION['user_type'];
        $user_id =  $_SESSION['id'];

        $sql = "INSERT INTO complaint (type, user_id, remarks) VALUES ('$type','$user_id' ,'$remarks')";
        $result = mysqli_query($conn, $sql);
        if($result){
                header('location: complaint.php?msg=inserted');
         }else{
             header('location: complaint.php?msg=failed');

        }


                                   
    }

?>