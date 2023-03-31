



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
                                <input type="text" class="form-control" placeholder="Enter username" id="username" name="username" required>
                            </div>
       
                            <div class="form-group">
                                <input type="password" class="form-control" placeholder="Enter password" id="password" name="password" required>
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
                        
                            $username = $_POST['username'];
                            $password = md5($_POST['password']);
                            
                            $conn = new mysqli('localhost', 'root','', 'eatery');
                            $sql = "SELECT * FROM admin WHERE `username` = '$username'";
                            $result = mysqli_query($conn, $sql);
                
                            if (!$result->num_rows > 0) {
                                
                                $conn = new mysqli('localhost', 'root','', 'eatery');
                                $sql2 = "INSERT INTO admin (`username`, `password`)
                                        VALUES ('$username','$password')";
                                $result = mysqli_query($conn, $sql2);

                                header('location: login.php');
                            } else {
                                echo "<script>alert('Woops! Email Already Exists.')</script>";
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
