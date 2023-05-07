<?php 
  $id = $_GET['id'];
  $user = $_GET['user'];  
  $rt = $_GET['res_id'];
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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>


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
              <a href="rate.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt ;?>">Rate & Review</a>
	          </li>
              <li>
              <a href="cart.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt;?>">My Cart</a>
	          </li>
            <li>
              <a href="reviews.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt;?>">Read Reviews</a>
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

            <!-- <button type="button" id="sidebarCollapse" class="btn btn-primary">
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
                
               
                    
                <li class="nav-item">
                <h1 style="color:orange; font-size:20px; font-family: 'Poppins', sans-serif;"><?php $conn = new mysqli('localhost', 'root', '', 'eatery');
                             $id = $_GET['res_id'];
                             $sql = "SELECT * FROM restaurant WHERE restaurant_id = '$id'";
                             $result = mysqli_query($conn, $sql);
		                    while($row=mysqli_fetch_assoc($result)){
                          $res = $row['restaurant_name'];
                     echo $row['restaurant_name'];}?></h1>
                
                <form action="search.php" method="POST">
                  
                    <input style="border-color:orange; border-radius:10px; padding:6px; margin-top: 8px; margin-right: 16px; font-size: 17px; " type="text" name="khoj" id="search" placeholder="Search Food">
                    <!-- <input type="submit" value="Search" /> -->
                    </form>
                </li>
              
                
                <li class="nav-item">
                    <button class="profile-btn">
                        <img src="https://www.svgrepo.com/show/394266/male.svg" alt="" class="profile-icon">
                    </button>
                </li>

              </ul>
            </div>
          </div>
        </nav>

                                <h1 style="font-size:40px; font-family: 'Poppins', sans-serif; margin: 0px 0px 0px 500px;">Food Menu</h1>
        <table width="1000" border="5" id="customers">
		<thead>
    <tr>
    <th>Image</th>
			<th>Item Name</th>
      <th>Stock</th>
			<th>Price</th>
			<th>Add To Cart</th>
		</tr>
    </thead>
		
<?php  
        $conn = new mysqli('localhost', 'root', '', 'eatery');
        $id = $_GET['res_id'];
		$sql = "SELECT * FROM item WHERE restaurant_id = '$id' AND stock > 0";
		$result = mysqli_query($conn, $sql);
		
		while($row=mysqli_fetch_assoc($result)){	
      $pic="../";	
    ?>
     <tbody id="output">
		<tr>
		<td style="width:120px;"><img src="<?php echo $pic.$row['image']?>" alt="new-arrivals images"></td>
		<td><?php echo $row["item_name"]; ?></td>
        <td><?php echo  $row["stock"]; ?> pieces/servings</td>
		<td>Tk. <?php echo  $row["price"]; ?></td>
		<!-- <td><input type="checkbox" id="check" onclick="enable(this)"></td> -->
        <td>
        <form method="POST"> 
        <input readonly size="25" type="hidden"  id="nm" name="nm"  value="<?php echo $row["item_name"];?>" >   
        <input readonly type="hidden"  id="pr" name="pr" value=<?php echo $row["price"];?> > 
        <button  onclick="window.location.href='#'" name="submit" style="font-size:24px"> <i class="fa fa-shopping-cart"></i></button>
        </form>
      </td>
		
		</tr>
    </tbody>
	<?php } ?>
	

</table>    

<?php 
  $id = $_GET['id'];
  $user = $_GET['user'];  

  $JsonID = json_encode($id);
?>
	
      </div>
		</div>


        <?php 
            require_once '../../db.php';


            if(isset($_POST['submit'])){

                // Get form data
                $name = $_POST['nm'];
                echo $name;
                $price = $_POST['pr'];

                $s = "SELECT * FROM cart WHERE item_name='$name' AND base_price = '$price'";
                $rs = mysqli_query($db, $s);

                if ($rs) {
                  if (mysqli_num_rows($rs) == 0) {

                $sql =  "INSERT INTO cart (customer_id,user_type, restaurant_id, `item_name`, base_price ) VALUES ('$id','$user','$rt','$name','$price')";
                $result = mysqli_query($db, $sql);

                if($result){
                  echo '<script>alert("Added to Cart")</script>';
                }else{
                  echo '<script>alert("Error adding to cart")</script>';
                }
                  }
                }else{
                  echo '<script>alert("Already in Cart")</script>';
                }
                    
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

      <script type="text/javascript">

var ID = <?php echo $JsonID; ?>;

  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:"search2.php",
        data:{
          name:$("#search").val(),
          id: ID,
        },
        success:function(data){
          $("#output").html(data);
        }
      });
    });
  });

</script>
  </body>
</html>