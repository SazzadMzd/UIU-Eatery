



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eatery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">

</head>
<body>
    
    <section>
        <div class="container_card">
            <div class="row">
                <div class="col-md-12" style="margin-top:20%;">
                     <form action="" method="POST" enctype="multipart/form-data">
                           <div class="d-flex justify-content-center mb-5">
                                <img src="../images/logo.png" alt="Logo" style="max-width:30%;">
                           </div>

                           <div class="form-group">
                                <input type="text" class="form-control" placeholder="Restaurant Name" id="restuarant_name" name="restuarant_name" required>
                            </div>

                            <div class="form-group">
                                <input type="email" class="form-control" placeholder="Restaurant Email" id="restuarant_email" name="restuarant_email" required>
                            </div>
       
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
                            </div>

                            
                            <div class="form-group">
                                <input type="file" class="form-control" id="file" name="file" >
                            </div>



                             <div class="d-flex justify-content-center mb-5">
                                <button type="submit" name="user_register" class="btn btn-md btn-primary">Register</button>
                            </div>
            
                            
                            <div class="d-flex justify-content-center">
                                <p>Already have an account? <a href="login.php">Sign in</a></p>
                            </div>
                    </form>    
                    
                    
                    <?php
                         require_once '../db.php';

                        if(isset($_POST['user_register'])) {
                            // Get form data
                            $restaurantName = $_POST['restuarant_name'];
                            $restaurantEmail = $_POST['restuarant_email'];
                            $password = md5($_POST['password']);
                            
                            // Handle file upload (if a file was uploaded)
                            if(isset($_FILES['file']) && $_FILES['file']['error'] === UPLOAD_ERR_OK) {
                                $fileName = $_FILES['file']['name'];
                                $fileTmpName = $_FILES['file']['tmp_name'];
                                $fileSize = $_FILES['file']['size'];
                                $fileType = $_FILES['file']['type'];
                                $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
                                $allowedFileExtensions = array('jpg', 'jpeg', 'png');
                                if(in_array($fileExt, $allowedFileExtensions)) {
                                    // Save uploaded file to server
                                    $uploadDir = '../images/restuarant_image/';
                                    $uploadFile = $uploadDir . basename($fileName);
                                    if(move_uploaded_file($fileTmpName, $uploadFile)) {
                                    //    echo 'File uploaded successfully';
                                    } else {
                                        // echo 'Failed to upload file';
                                    }
                                } else {
                                        // echo 'Error Found';

                                }
                            }
                            
                            // Insert data into database (assuming you have a database connection already established)
                            $sql = "INSERT INTO restaurant (restaurant_name,img_dir) VALUES (?,?)";

                            $stmt = $db->prepare($sql);
                            $stmt->bind_param("ss", $restaurantName, $uploadFile);
                            $stmt->execute();
                            
                            // Check if the query executed successfully
                            if($stmt->affected_rows > 0) {
                                echo 'Data inserted successfully';
                                $status = 'pending';
                                $new_restaurant_id = mysqli_insert_id($db);

                                $sql2 = "INSERT INTO owner (email,password,restaurant_id,status) VALUES (?,?,?,?)";
                                $stmt2 = $db->prepare($sql2);
                                $stmt2->bind_param("ssis", $restaurantEmail, $password, $new_restaurant_id, $status);
                                $stmt2->execute();

                                if($stmt2->affected_rows > 0) {
                                    header("Location: login.php?msg=inserted");

                                    // echo 'Data inserted successfully';
                                    // Redirect to success page or show success message
                                } else {
                                    // echo 'Failed to insert data';
                                    // Failed to insert data
                                    // Handle the error
                                }
                                // Data inserted successfully
                                // Redirect to success page or show success message
                            } else {
                                echo 'Failed to insert data';
                                // Failed to insert data
                                // Handle the error
                            }
                        }




                        ?>

                </div>
            </div>
        </div>
    </section>



    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
