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

        <style>
#customers {
  font-family: Arial, Helvetica, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

#customers td, #customers th {
  border: 1px solid #ddd;
  padding: 8px;
}

#customers tr:nth-child(even){background-color: #f2f2f2;}

#customers tr:hover {background-color: #ddd;}

#customers th {
  padding-top: 12px;
  padding-bottom: 12px;
  text-align: left;
  /* background-color: #68cca7; */
  background-color: #2B333F;
  color: white;
}
</style>


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
            
                <table width="1000" border="5" id="customers">
                    <div >


                   <?php 
                    $or_id;
                        $restaurant_id = $_SESSION['restaurant_id'];


                        $sql = "SELECT * FROM restaurant WHERE restaurant_id = '$restaurant_id'";
                        $r = mysqli_query($conn, $sql);
                        $i = mysqli_fetch_assoc($r);
                        $r = $i['restaurant_name'];
                     
                    

                        $query = "SELECT * FROM orders WHERE restaurant_name = '$r' AND order_status=0";
                        
                        $result = mysqli_query($conn, $query);
                     
                     //   $items = mysqli_fetch_all($result, MYSQLI_ASSOC);  
                        #$r2 = mysqli_fetch_assoc($result);
                        while($row = $result->fetch_assoc()) {
                                $or_id = $row['id'];
                                // echo $or_id;
                        
?>
                        <tr>
                        <th>Customer</th>
                        <th>Payment Method</th>
                        <th>Receiving Method</th>
                        <th>Items</th>
                        <th>Base Amount</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Status Update</th>

                        </tr>
<?php
                                $sql2 =  "SELECT * FROM order_details WHERE order_id = '$or_id'";
                                $result3 = mysqli_query($conn, $sql2);
                                while($row3 = $result3->fetch_assoc()) {
                        

                    ?>
                    <tr>
                             
                    <td><?php echo $row["customer_id"]; ?></td>
                    <td><?php echo $row["payment_method"]; ?></td>
                    <td><?php echo  $row["receiving_method"]; ?></td>
                    <td><?php echo $row3["item_name"]; ?></td>
                    <td><?php echo $row3["base_amount"]; ?></td>
                    <td><?php echo  $row3["quantity"]; ?> </td>
                    <td><?php echo  $row3["total_price"]; ?></td>
                    <td>
						<form action="orders.php" method="post">
                        <input type="hidden" name="order_id" value="<?php echo $or_id;?>"/>
						<input type="submit" name="approve" value="&#x2713" />
						
						</form>
					</td>
                   
                   
                    
                    <!-- <td><input type="checkbox" id="check" onclick="enable(this)"></td> -->
                    <!-- <td><button style="font-size:24px"> <i class="fa fa-shopping-cart"></i></button></td> -->
                    
                    </tr>
                    <?php }}?>


       

                  
                            



                    </div>
                </table>
                 </div>
            </div>

     
        </div>
        
    
										
						
						
						
						
	</div>





    <?php


if($_SERVER['REQUEST_METHOD'] == 'POST'){

	$o_id = $_POST['order_id'];
    // echo $o_id;
	
	$sql4 = "UPDATE orders SET order_status=1  WHERE id='$o_id'";
	$result = mysqli_query($conn, $sql4);
	
	// echo '<script type = "text/javascript">';
	// echo 'alert("User Approved!");';
	// echo '</script>';

	header("Location: orders.php");
    echo "<meta http-equiv='refresh' content='0'>";


#x2705;

}


?>
		
		
		



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