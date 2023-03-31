<?php 
  require_once '../db.php';

    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['restaurant_id'])){
        header('location: login.php?session=empty');
    }

    if(isset($_GET['restaurant_id']) && isset($_GET['item_name'])){
        $restaurant_id = $_GET['restaurant_id'];
        $item_name = $_GET['item_name'];
        $query = "SELECT * FROM item WHERE restaurant_id = '$restaurant_id' AND item_name = '$item_name'";
        $result = mysqli_query($conn, $query);
        $item = mysqli_fetch_assoc($result);
    }
    
?>


<!doctype html>
<html lang="en">
  <head>
  	<title>Restaurant Owner</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<link rel="stylesheet" href="css/style.css">



    <!-- For favicon png -->
		<link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>
       
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
		<link rel="stylesheet" href="assets/css/bootsnav.css" >	
        
        <!--style.css-->
        <link rel="stylesheet" href="assets/css/style.css">
        
        <!--responsive.css-->
        <link rel="stylesheet" href="assets/css/responsive.css">


        
        <link rel="stylesheet" href="localcss.css">

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(uiulogo.png);"></a>
                <ul class="list-unstyled components mb-5">

                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Orders</a>
                    </li>
                    <li>
                        <a href="add_update.php">Add/Update</a>
                    </li>
                </ul>

	     

	      </div>
    	</nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 bg-ash" style="background-color:#F2E7E4;">
        <div class="container">
          
            <div class="add_update_items mt-5">
                <h2 class="text-left mb-5" style="color:blue;">EDIT/UPDATE ITEMS</h2>

                
                <div class="item_form">
                      <form method="post" action="update_item_form_code.php">
                           <div class="d-flex justify-content-between">
                                    <div>
                                        <label for="item_name">Item Name</label>
                                        <input type="text" name="item_name1" id="item_name1" class="form-control" value="<?= $item['item_name'] ?? '' ?>" placeholder="Item Name" disabled>
                                        <input type="hidden" name="item_name" id="item_name" class="form-control" value="<?= $item['item_name'] ?? '' ?>" placeholder="Item Name" >
                                    </div>
                                    <div>
                                        <label for="item_price">Item Price</label>
                                        <input type="text" name="item_price" id="item_price" class="form-control" value="<?= $item['price'] ?? '' ?>" placeholder="Item Price" required>
                                    </div>
                                    <div>
                                        <label for="item_stock">Item Stock</label>
                                        <input type="text" name="item_stock" id="item_stock" class="form-control" value="<?= $item['stock'] ?? '' ?>" placeholder="Item Stock" required>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <button type="submit" name="update_itemBTN" class="btn btn-success btn-md">Update Item</button>
                                    </div>
                           </div>


                      </form>    
                      
                    
                </div>

            </div>
        </div>
        
    
										
						
						
							
						
						
	</div>
		
		
		



    <script src="js/jquery.min.js"></script>
    <script src="js/popper.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>





    <!-- Include all js compiled plugins (below), or include individual files as needed -->

		<script src="assets/js/jquery.js"></script>
        
        <!--modernizr.min.js-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>
		
		<!--bootstrap.min.js-->
        <script src="assets/js/bootstrap.min.js"></script>
		
		<!-- bootsnav js -->
		<script src="assets/js/bootsnav.js"></script>

		<!--owl.carousel.js-->
        <script src="assets/js/owl.carousel.min.js"></script>


		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
		
        
        <!--Custom JS-->
        <script src="assets/js/custom.js"></script>
  </body>
</html>