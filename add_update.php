<?php 
  require_once '../db.php';

    session_start();
    if(!isset($_SESSION['email']) && !isset($_SESSION['restaurant_id'])){
        header('location: login.php?session=empty');
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
                        <a href="orders.php">Orders</a>
                    </li>
                    <li>
                        <a href="add_update.php">Add/Update/Remove</a>
                    </li>
                </ul>

	     

	      </div>
    	</nav>

        <!-- Page Content  -->
    <div id="content" class="p-4 p-md-5 bg-ash" style="background-color:#F2E7E4;">
        <div class="container">
            <div class="menu_list mt-5 mb-5" ><h1 class="text-center mb-5" style="color:#0B2161; font-family: serif; font-size: 32px;"><b>CURRENT MENU LIST</b></h1>
                    <div class="col-md-12" style:"color:black;">


                   <?php 
                        $restaurant_id = $_SESSION['restaurant_id'];
                        $query = "SELECT * FROM item WHERE restaurant_id = '$restaurant_id'";
                        $result = mysqli_query($conn, $query);

                        $items = mysqli_fetch_all($result, MYSQLI_ASSOC);
                    ?>

                    <?php foreach ($items as $item): ?>
                        <div class="row mb-3 border border-5 bg-white"> 
                            <div class="col-3 p-3">
                                <img src="<?php echo $item['image']; ?>" alt="image" style="width:100px;">
                            </div>
                            <div class="col-3">
                            <p class="text-bold" style="font-weight:bold;"><?php echo $item['item_name']; ?></p>
                            </div>
                            <div class="col-2">
                                <p><b>Price:</b> Tk. <?php echo $item['price']; ?></p>
                            </div>
                            <div class="col-2">
                                <p><b>Stock:</b> <?php echo $item['stock']; ?> pieces</p>
                            </div>
                            <div class="col-2 d-flex">
                                <form method="POST" action="delete_item_form_code.php">
                                    <input type="hidden" name="restaurant_id" value="<?php echo $item['restaurant_id']; ?>">
                                    <input type="hidden" name="item_name" value="<?php echo $item['item_name']; ?>">
                                    <button type="submit" name="delete_item">
                                        <i class="fa fa-trash"></i>
                                    </button>
                                </form>
                                <a href="edit_item_form.php?restaurant_id=<?php echo $item['restaurant_id']; ?>&item_name=<?php echo $item['item_name']; ?>" style="margin-left:5px;"><i class="fa fa-pencil"></i></a>

                            </div>
                        </div>
                    <?php endforeach; ?>
                            



                    </div>
                 </div>
            </div>

            <div class="add_update_items mt-5">
                <h1 class="text-left mb-5" style="color:#0B2161; font-family: serif; font-size: 32px;"><b>ADD ITEMS</b></h1>

                <div class="item_form">
                      <form method="post" action="add_item_form_code.php" enctype="multipart/form-data">
                           <div class="d-flex justify-content-between">
                                    <div>
                                        <label for="item_name">Item name</label>
                                        <input type="text" name="item_name" id="item_name" class="form-control" placeholder="Item Name" required>
                                    </div>
                                    <div>
                                        <label for="item_price">Item price</label>
                                        <input type="text" name="item_price" id="item_price" class="form-control" placeholder="Item Price" required>
                                    </div>
                                    <div>
                                        <label for="item_stock">Item stock</label>
                                        <input type="text" name="item_stock" id="item_stock" class="form-control" placeholder="Item Stock" required>
                                    </div>

                                    <div>
                                        <label for="item_stock">Item image</label>
                                        <input type="file"  id="file" name="file" class="form-control" required>
                                    </div>
                                    
                                    <div class="mt-4">
                                        <button type="submit" name="add_itemBTN" class="btn btn-dark btn-md">Add Item</button>
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