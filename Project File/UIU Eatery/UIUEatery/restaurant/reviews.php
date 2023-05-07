<?php

session_start();

$id = $_GET['id'];
$user = $_GET['user'];
$res = $_GET['res'];

?>

<!DOCTYPE html>

<html class="no-js" lang="en">

<head>
  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
  <script Type="text/javascript" src="addcart.js"></script>

  <!-- meta data -->
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

  <!--font-family-->
  <link href="https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i" rel="stylesheet">

  <!-- title of site -->
  <title>Review & feedback</title>

  <!-- For favicon png -->
  <link rel="icon" href="../Images/auction.png">

  <!--font-awesome.min.css-->
  <link rel="stylesheet" href="assets/css/font-awesome.min.css">

  <!--linear icon css-->
  <link rel="stylesheet" href="assets/css/linearicons.css">

  <!--animate.css-->
  <link rel="stylesheet" href="assets/css/animate.css">

  <!--owl.carousel.css-->
  <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
  <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">

  <!--bootstrap.min.css-->
  <link rel="stylesheet" href="assets/css/bootstrap.min.css">

  <!-- bootsnav -->
  <link rel="stylesheet" href="assets/css/bootsnav.css">

  <!--style.css-->
  <link rel="stylesheet" href="assets/css/style.css">

  <!--responsive.css-->
  <link rel="stylesheet" href="assets/css/responsive.css">

  <link rel="stylesheet" href="ratestyle.css">


</head>

<body style=" background: #e2e9f7; ">

  <div class="header">
      <div class="container">

      <div class="side-nav" style=" background-color: #2B333F; ">
            <a href="#" class="logo"> <img src="uiulogo.png" alt="give image" class="logo-img">
            </a>

            <ul class="nav-links">
                <li><a href="#"><p>Dashboard</p></a></li>
                
                <li><a href="#"><p>Settings</p></a></li>
            </ul>

        </div>


        <div class="">
          <br><br>
  </div>
  <?php
  $conn = new mysqli('localhost', 'root', '', 'eatery');
  $sql = "SELECT * FROM rate";
  $result = $conn->query($sql);
  ?> <div class="">


    <?php



    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
       
    ?>

        <div style=" padding: 20px 20px 20px 5px; margin-left: 280px; margin-right:180px; border: 2px solid orange; border-radius: 50px 20px;">
              
              <h4 style=" color: green; margin-left: 50px; font-size:25px"><img src="cmnt img.png" height="50px" width="40px" alt="Image Not found"> 
              <?php echo $row['customer_id'] ?> </h4>
              
            <p style="margin-left: 50px; color:black; font-size: 20px;"><?php echo $row['review']; ?></p>
            
            <br>
          

        </div><br>
      <?php
      } ?>
  </div> <?php
        } else {
          echo "0 results";
        }
        $conn->close();
          ?>

</div>





          
    












      </div>

  </div>
  
  
</body>

</html>