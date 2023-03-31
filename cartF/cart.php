<?php
session_start();
    $type = $_SESSION['user_type'];
    $user_id =  $_SESSION['id'];

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>My Cart</title>
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
        <style>
        table {
  border-collapse: collapse;
  width: 100%;
  margin-bottom: 20px;
}

th,
td {
  text-align: middle;
  padding: 8px;
}

th {
  background-color: white;
  color: black;
}
td {
  background-color: white;
  color: black;
}

tr:hover {
  background-color: whitesmoke;
}

td:first-child {
  width: 45%;
}


#k {
  background-color: #4CAF50;
  color: white;
  border: none;
  padding: 10px 20px;
  text-align: middle;
  align-self: right;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 0;
  cursor: pointer;
}
#plus,
#minus{
  background-color: whitesmoke;
  color: black;
  border: none;
  padding: 2px 3px;
  text-align: middle;
  align-self: right;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 10px 0;
  cursor: pointer;
}

button:hover {
  background-color: #3e8e41;
}

</style>

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(uiulogo.png);"></a>
	        <ul class="list-unstyled components mb-5">

	          <!-- <li class="active">
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Home</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="#">Home 1</a>
                </li>
                <li>
                    <a href="#">Home 2</a>
                </li>
                <li>
                    <a href="#">Home 3</a>
                </li>
	            </ul>
	          </li> -->
	          <li>
	              <a href="../landing_page/index.php">Home</a>
	          </li>
            
            <li>
	              <a href="#">Order History</a>
	          </li>
	          <!-- <li>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Pages</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="#">Page 1</a>
                </li>
                <li>
                    <a href="#">Page 2</a>
                </li>
                <li>
                    <a href="#">Page 3</a>
                </li>
              </ul>
	          </li> -->
	          <li>
              <a href="#">Complaint</a>
	          </li>
	          <li>
              <a href="../landing_page/index.php">LogOut</a>
	          </li>
	        </ul>

	     

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

      <div class="container">
				<div class="section-header">
					<h2 style="font-family: 'Poppins', sans-serif;">My Cart</h2>
				</div>
<form>
        <?php


// Connect to database
include "../db.php";


// Get all items from the cart table
$sql = "SELECT * FROM cart where customer_id = '$user_id'";
$result = $conn->query($sql);

// Initialize variables
$total_price = 0;

// Check if there are items in the cart
if ($result->num_rows > 0) {
    // Output table header
    echo '<form method="post">';
    echo '<table>';
    echo '<tr><th> Item Name </th><th> Unit Price </th><th> Quantity </th></tr>';
    
    // Loop through each item in the cart
    while($row = $result->fetch_assoc()) {
        // Get the item name and quantity from the form data
        $item_name = $row['item_name'];
        $quantity = $row['quantity'];
        
        // Increase or decrease quantity based on button press
        if(isset($_POST[$item_name . '_minus'])){
            $quantity = max(1, $quantity - 1);
        }elseif(isset($_POST[$item_name . '_plus'])){
            $quantity = $quantity + 1;
        }
        
        // Update quantity in cart database
        $update_query = "UPDATE cart SET quantity = $quantity WHERE item_name = '$item_name'";
        $conn->query($update_query);
        
        // Output table row
        echo '<tr>';
        echo '<td>' . $row['item_name'] . '</td>';
        echo '<td>' . $row['base_price'] . '$</td>';
        echo '<td>';
        echo '<button type="submit" name="' . $item_name . '_minus">-</button>';
        echo $quantity;
        echo '<button type="submit" name="' . $item_name . '_plus">+</button>';
        echo '</td>';
        echo '</tr>';
        
        // Calculate total price
        $total_price += $row['base_price'] * $quantity;
    }

    // Output total price
    echo '<tr><td style="font-weight:bold;">Total Price:</td><td style="font-weight:bold;">$' . $total_price . '</td></tr>';

    // Output checkout button
    echo '<tr><td></td><td colspan="2"><a href="#payment.php"><button id="k" >Checkout</button></td></tr>';

    echo '</table>';
    echo '</form>';
}

 else {
    // Output message if cart is empty
    echo 'Your cart is empty.';
}
?>

    
		
</form>
				
							
						
						
		
			</div><!--/.container-->
			
		</section><!--/.new-arrivals-->
		<!--new-arrivals end -->
		
		



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