<?php 
  $id = $_GET['id'];
  $user = $_GET['user'];  
?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Eatery</title>
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">




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
          <h4 style="margin-left: 50px; font-family: 'Poppins', sans-serif; color:orange;">ID : <?php echo $id;?></h4><br>
          <h4 style="margin-left: 45px; font-family: 'Poppins', sans-serif; color:orange;">User : <?php echo $user;?></h4>
	        <ul class="list-unstyled components mb-5">

	          <li>
	              <a href="restaurant.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt ;?>">Home</a>
	          </li>
            <li>
              <a href="cart.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt;?>">My Cart</a>
	          </li>
	          <li>
              <a href="../../landing_page/">LogOut</a>
	          </li>
	        </ul>

	     

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">
<!-- 
            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button> -->

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li> -->
                
               
<!--                     
                <li class="nav-item">
           
                </li> -->
              
                
                <li class="nav-item">
                    <button class="profile-btn">
                        <img src="https://www.svgrepo.com/show/394266/male.svg" alt="" class="profile-icon">
                    </button>
                </li>

              </ul>
            </div>
          </div>
        </nav>

                                <h1 style="font-size:40px; font-family: 'Poppins', sans-serif; margin: 0px 0px 0px 500px;">Order History</h1>

        <table width="1000" border="5" id="customers">
<!-- 		
		<tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Restaurant Name</th>
			<th>Item Name</th>
            <th>Base Amount</th>
            <th>Quantity</th>
			<th>Price</th>
			
		</tr> -->
<?php  
        $conn = new mysqli('localhost', 'root', '', 'eatery');
        //$id = $_GET['res_id'];
		$sql = "SELECT orders.id, orders.order_date, orders.restaurant_name FROM orders WHERE customer_id = '$id' AND order_status=1";
     
		$result = mysqli_query($conn, $sql);
		
		while($row=mysqli_fetch_assoc($result)){
            $each_id= $row["id"];
            $sum=0;
            ?>

<tr>
            <th>Order ID</th>
            <th>Date</th>
            <th>Restaurant Name</th>
			<th>Item Name</th>
            <th>Base Amount</th>
            <th>Quantity</th>
			<th>Price</th>
			
		</tr>
            
          
            	<?php
            
            $sql2 = "SELECT order_details.item_name, order_details.base_amount, order_details.quantity, order_details.total_price FROM order_details WHERE order_id='$each_id'";
            $result2 = mysqli_query($conn, $sql2);
            while($row2=mysqli_fetch_assoc($result2)){
                $sum += $row2["total_price"];
    ?>

       

		<tr>
		
       

        <td><?php echo $row["id"]; ?></td>
		<td><?php echo $row["order_date"]; ?></td>
        <td><?php echo  $row["restaurant_name"]; ?></td>
        <td><?php echo $row2["item_name"]; ?></td>
		<td><?php echo $row2["base_amount"]; ?></td>
        <td><?php echo  $row2["quantity"]; ?> </td>
        <td><?php echo  $row2["total_price"]; ?></td>
       
       
		
		<!-- <td><input type="checkbox" id="check" onclick="enable(this)"></td> -->
        <!-- <td><button style="font-size:24px"> <i class="fa fa-shopping-cart"></i></button></td> -->
		
		</tr>
	<?php }?>

        <tr> <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
        <td></td>
             <td>Total : <?php echo  $sum; ?></td>
            
        </tr>
<?php
} ?>
	

</table>    


	
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