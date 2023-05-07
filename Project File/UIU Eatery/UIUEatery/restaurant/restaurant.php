<?php 
    require_once '../../db.php';
     $id = $_GET['id'];
     $user_type = $_GET['user'];

     $rrr;

     $JsonID = json_encode($id);
     $Json_usertype = json_encode($user_type);
     

?>
<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
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

  </head>
  <body>
		
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
				<div class="p-4 pt-5">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(uiulogo.png);"></a>
          <h4 style="margin-left: 50px; font-family: 'Poppins', sans-serif; color:orange;">ID : <?php echo $id;?></h4><br>
          <h4 style="margin-left: 45px; font-family: 'Poppins', sans-serif; color:orange;">User : <?php echo $user_type;?></h4>

	        <ul class="list-unstyled components mb-5">
	          <li>
	              <a href="restaurant.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt ;?>">Home</a>
	          </li>
            <li>
	              <a href="order_history.php?id=<?php echo $id;?>&user=<?php echo $user_type;?>">Order History</a>
	          </li>
            
	          <li>
              <a href="complaint.php">Complaint</a>
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
                <!-- <form action="search.php" method="POST">
                    <input style=" border-color:orange; border-radius:10px; padding:6px; margin-top: 8px; margin-right: 16px; font-size: 17px; " type="text" id="search" name="khoj"  placeholder="Search Restaurants">
                    </form> -->
                    <input style=" border-color:orange; border-radius:10px; padding:6px; margin-top: 8px; margin-right: 16px; font-size: 17px; " type="text" id="search" name="khoj"  placeholder="Search Restaurants">
                </li>




                <?php 
                  //  session_start();

                    // $user_id = $_SESSION['id'];
                    // $query = "select * from orders where customer_id = '$user_id' and read_status = 0";
                    // $result = mysqli_query($conn, $query);


               //     $user_id = $_SESSION['id'];
               $user_id = $id;
                    $query = "SELECT COUNT(*) as count FROM orders WHERE customer_id = '$user_id' and order_status = 1 and read_status = 0";
                    $result = mysqli_query($conn, $query);
                    $row = mysqli_fetch_assoc($result);
                    $count = $row['count'] ?? 0;
                    $user = $id;


                    $query = "UPDATE `orders` SET `read_status` = '1' WHERE `orders`.`customer_id` = '$user';";
                    mysqli_query($conn, $query);



                    if($count > 0) {
                  ?>

                    <li class="nav-item">
                        <button id="notificationButton" type="button" class="btn" data-toggle="modal" data-target="#latestOrderModal" >
                          <img src="notification-on.svg" alt="" class="notifications-icon">
                        </button>
                    </li>

                  <?php 
                     
                    }

                    else {
                  ?>

                       <li class="nav-item">
                         <img src="notification-off.svg" alt="" class="notifications-icon">
                        </li>
                        
                  <?php
                    }


                ?>
                
                
                <li class="nav-item">
                    <button class="profile-btn">
                        <img src="https://www.svgrepo.com/show/394266/male.svg" alt="" class="profile-icon">
                    </button>
                </li>

   










              </ul>
            </div>
          </div>
        </nav>

      <div class="container">
        <div class="single-new-arrival" id="output">
								
        </div>
      </div>

    
		<?php
     
            $conn = new mysqli('localhost', 'root', '', 'eatery');
           
            $sql = "SELECT * FROM restaurant";
            $result = $conn->query($sql);
            ?> 
		
    <!-- Code by Shifa Begins  -->


    <section>
      <!-- Modal -->
      <div class="modal fade" id="latestOrderModal" tabindex="-1" role="dialog" aria-labelledby="latestOrderModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="latestOrderModalLabel">Latest Order Details</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              <p>Your Order is Ready</p>
            </div>
          </div>
        </div>
      </div>

    </section>

    <section id="popular-items" class="popular-items">
      <div class="container">
          <div class="row">
            <div class="col-12">
              <div class="text-center">
                <h2 class="" style="font-family: 'Poppins', sans-serif;font-size:28px;">Popular Items</h2>
              </div>
            </div>


            <?php 
                $query_popularitems = "SELECT item.restaurant_id as res_id,item.price as price,orders.restaurant_name as res_name,order_details.item_name as item_name, COUNT(*) as item_count, item.image as image
                                        FROM order_details
                                        JOIN orders ON orders.id = order_details.order_id
                                        JOIN item ON item.item_name = order_details.item_name
                                        
                                        GROUP BY order_details.item_name
                                        ORDER BY item_count DESC
                                        LIMIT 4";

                      $stmt2 = $pdo->prepare($query_popularitems);
                      $stmt2->execute();

                      // Retrieve the results
                      $popular_food_items = $stmt2->fetchAll(PDO::FETCH_ASSOC);

                if(count($popular_food_items) > 0){
                          foreach ($popular_food_items as $data) {
                          ?> 
                            <div class="col-md-3 col-sm-4">
                              <div class="single-new-arrival">
                                <div class="single-new-arrival-bg">
                                  <img src="<?php echo '../'.$data['image']; ?>" alt="new-arrivals images" style="width:300px;height:150px;">
                                  <div class="single-new-arrival-bg-overlay"></div>
                                
                                </div>
                                <h3 style="font-family: 'Poppins', sans-serif;"><a><?php echo $data['item_name'] ?></a></h3>
                                <h4 style="font-family: 'Poppins', sans-serif;"><a><?php echo $data['res_name'] ?></a></h4>


                              <form method="POST"> 
                                <input readonly size="25" type="hidden"  id="nm" name="nm"  value="<?php echo $data["item_name"];?>" >   
                                <input readonly type="hidden"  id="pr" name="pr" value=<?php echo $data["price"];?> > 
                                <input readonly type="hidden"  id="rt" name="rt" value=<?php echo $data["res_id"];?> > 
                                <button  onclick="window.location.href='#'" name="itemAddtoCart" class="btn btn-sm btn-primary"> Add to Cart </button>
                              </form>


                                <!-- <a href="student_addToCart.php?">
                                  <button class="btn btn-sm btn-primary">Add to Cart</button>
                                </a> -->
                              </div>
                            </div>

                          <?php
                          
                          
                        }
                }
                else 
                {
                  echo "<h3 class='text-center'>No Popular Items Found</h3>";
                }
            ?>
            
          </div>
      </div>
    </section>

    <section id="recommended-items" class="recommended-items" style="margin-top:-100px;">
      <div class="container">
          <div class="new-arrivals-content">
              <div class="row">                  
                <?php 
                
                  $timezone = new DateTimeZone('Asia/Dhaka'); 
                  $time_string = new DateTime('now', $timezone);
                  //$current_time = $time_string->format('H:i');
                  $current_time = '11:30';

                  // Define your three time shifts
                  $time_shifts = array(
                      array('shift_name' => 'EarlyMorning', 'start_time' => '00:01', 'end_time' => '05:59'),
                       array('shift_name' => 'Morning', 'start_time' => '06:00', 'end_time' => '07:29'),
                      array('shift_name' => 'Afternoon', 'start_time' => '07:30', 'end_time' => '14:59'),
                      array('shift_name' => 'Dinner', 'start_time' => '15:00', 'end_time' => '23:59'),
                  );

                  // Determine the current shift based on the current time
                  $current_shift = null;
                  foreach ($time_shifts as $shift) {
                      $start_time = $shift['start_time'];
                      $end_time = $shift['end_time'];
                      if ($current_time >= $start_time && $current_time <= $end_time) {
                          $current_shift = $shift;
                          break;
                      }
                  }

                  if ($current_shift) {
                      $start_time_str = $current_shift['start_time'];
                      $end_time_str = $current_shift['end_time'];

                      $query_orders = "SELECT item.restaurant_id as res_id,item.price as price,orders.restaurant_name as res_name,order_details.item_name as item_name, COUNT(*) as item_count, item.image as image
                                        FROM order_details
                                        JOIN orders ON orders.id = order_details.order_id
                                        JOIN item ON item.item_name = order_details.item_name
                                        WHERE DATE_FORMAT(order_date, '%H:%i') BETWEEN '$start_time_str' AND '$end_time_str'
                                        GROUP BY order_details.item_name
                                        ORDER BY item_count DESC
                                        LIMIT 4";


                      $stmt = $pdo->prepare($query_orders);
                      $stmt->execute();

                      // Retrieve the results
                      $results = $stmt->fetchAll(PDO::FETCH_ASSOC);

                      ?>
                       <div class="col-12 d-flex justify-content-center">
                        <h2 class="" style="font-family: 'Poppins', sans-serif;font-size:28px;">Orders for <?= $current_shift['shift_name'] ?> shift</h2>
                      </div>
                  </row>
                  <div class="row">
                      <?php
                      // echo "<h2 style=>Orders for {$current_shift['shift_name']} shift:</h2>";

                      if(count($results) > 0) {

                          foreach ($results as $data) {
                               // echo "{$data['res_name']} - {$data['item_name']} - {$data['item_count']} orders\n";
                          ?> 
                            <div class="col-md-3 col-sm-4">
                              <div class="single-new-arrival">
                                <div class="single-new-arrival-bg">
                                  <img src="<?php echo '../'.$data['image']; ?>" alt="new-arrivals images" style="width:300px;height:150px;">
                                  <div class="single-new-arrival-bg-overlay"></div>
                                
                                </div>
                                <h3 style="font-family: 'Poppins', sans-serif;"><a><?php echo $data['item_name'] ?></a></h3>
                                <h4 style="font-family: 'Poppins', sans-serif;"><a><?php echo $data['res_name'] ?></a></h4>

                                   <form method="POST"> 
                                    <input readonly size="25" type="hidden"  id="nm" name="nm"  value="<?php echo $data["item_name"];?>" >   
                                    <input readonly type="hidden"  id="pr" name="pr" value=<?php echo $data["price"];?> > 
                                    <input readonly type="hidden"  id="rt" name="rt" value=<?php echo $data["res_id"];?> > 
                                    <button  onclick="window.location.href='#'" name="itemAddtoCart2" class="btn btn-sm btn-primary"> Add to Cart </button>
                                  </form>


                              </div>
                            </div>

                          <?php
                          
                          
                        }
                      }
                      else{

                        ?>
                              <div class="col-12 d-flex justify-content-center">
                                <h2 class="text-center" style="font-family: 'Poppins', sans-serif; margin-left:570%;margin-top:10px;">No items available</h2>
                              </div>
                        <?php 
                      }
                    
                        
                       
                  } else {
                      echo "No current shift found.\n";
                  }


          ?>

              </div>
          </div>



      </div>

    </section>

    <!-- Code by Shifa Ends  -->


		<!--new-arrivals start -->
		<section id="new-arrivals" class="new-arrivals">
			<div class="container">
				<div class="section-header">
					<h2 style="font-family: 'Poppins', sans-serif;">Restaurants</h2>
				</div>
				
				<div class="new-arrivals-content">
					

					<?php

					if ($result->num_rows > 0) {

						?>
								<div class="row">
				<?php
					// output data of each row
					while($row = $result->fetch_assoc()) {
					$pic="../";
					

        //  $Json_res = json_encode($row['restaurant_id']);
					?>



						<div class="col-md-3 col-sm-4">
							<div class="single-new-arrival">
								<div class="single-new-arrival-bg">
									<img src="<?php echo $pic.$row['img_dir']?>" width="50" height="60" alt="Images">
									<div class="single-new-arrival-bg-overlay"></div>
								
								</div>
                 
								<h4 style="font-family: 'Poppins', sans-serif;"><a href="menu.php?res_id=<?php echo $row['restaurant_id'] ?>&id=<?php echo $id ?>&user=<?php echo $user_type ?>"><?php echo $row['restaurant_name'] ?></a></h4>


                <h4 style="font-family: 'Poppins', sans-serif; color:green;" id="myHeading"> Free</h4>

                <?php
                $rn = $row['restaurant_name'];
                    require_once '../../db.php';
                    $conn = new mysqli('localhost', 'root', '', 'eatery');
                  
                    $sql = "SELECT restaurant_name, COUNT(*) as num_orders
        FROM orders
        WHERE order_status = 0 AND restaurant_name='" . mysqli_real_escape_string($conn, $rn) . "'
        GROUP BY restaurant_name";

                    $result5 = $conn->query($sql);
                    if($result5){
                      while($row5 = $result5->fetch_assoc()) {
                        if($row5['num_orders']<4){

                          ?>
                            <!-- <h4 style="font-family: 'Poppins', sans-serif; color:green;"> Free</h4> -->
                            <script>
                            document.getElementById("myHeading").innerHTML = "Free";
                            </script>
                          <?php

                        }
                        elseif(10 <= $row5['num_orders']  && $row5['num_orders']< 6){

                      ?>
                             <script>
                            document.getElementById("myHeading").innerHTML = "Moderate";                        
                            var heading = document.getElementById("myHeading");
                            heading.style.color = "orange";
                            </script>
                    <?php
                        }
                        else{
                        ?>
                          <script>
                            document.getElementById("myHeading").innerHTML = "Busy";                        
                            var heading = document.getElementById("myHeading");
                            heading.style.color = "red";
                            </script>
                        <?php
                        }
                       ?> 
                 

		<?php }}
           
    ?>
           




           <?php
                  require_once '../../db.php';
                  $conn = new mysqli('localhost', 'root', '', 'eatery');
                
                  $sql8 = "SELECT restaurant_id, AVG(rating) AS avg_rating
                  FROM rate
                  GROUP BY restaurant_id;";
                  $result8 = $conn->query($sql8);
                  if($result8){
                    while($row8 = $result8->fetch_assoc()) {

                     $rrr =   $row8['avg_rating'];
                      
                     $ri = $row8['restaurant_id'];

                     if ($ri == $row['restaurant_id']){
                ?>
                    <img src="ir.png" alt="Star" width="50" height="60">
                    <h4 style="font-family: 'Poppins', sans-serif; color:orange;" id="rt"><?php echo number_format($rrr, 1);?> </h4>

                    <?php }?>
              <?php }}?>








								
							</div>
						</div>

							<?php } ?>


						
							</div>
							
							<?php } ?>
										
						
						
							
						
						
						</div>
			</div><!--/.container-->
			
		</section><!--/.new-arrivals-->
		<!--new-arrivals end -->
		
		
<div class="col-12">
                  <?php 
                      require_once '../../db.php';


                      if(isset($_POST['itemAddtoCart'])){

                          // Get form data
                          $rt = $_POST['rt'];
                          $name = $_POST['nm'];
                          echo $name;
                          $price = $_POST['pr'];
                           $user_id = $_GET['id'];
                           $user = $_GET['user'];
                          $s = "SELECT * FROM cart WHERE item_name='$name' AND base_price = '$price'";
                          $rs = mysqli_query($db, $s);

                          if ($rs) {
                            if (mysqli_num_rows($rs) == 0) {

                          $sql =  "INSERT INTO cart (customer_id,user_type, restaurant_id, `item_name`, base_price ) VALUES ('$user_id','$user','$rt','$name','$price')";
                          $result = mysqli_query($db, $sql);

                          if($result){
                            // echo '<script>alert("Added to Cart")</script>';
                          }else{
                            // echo '<script>alert("Error adding to cart")</script>';
                          }
                            }
                          }else{
                            // echo '<script>alert("Already in Cart")</script>';
                          }
                              
                        }


                      if(isset($_POST['itemAddtoCart2'])){

                          // Get form data
                          $rt = $_POST['rt'];
                          $name = $_POST['nm'];
                          echo $name;
                          $price = $_POST['pr'];
                           $user_id = $_GET['id'];
                           $user = $_GET['user'];
                          $s = "SELECT * FROM cart WHERE item_name='$name' AND base_price = '$price'";
                          $rs = mysqli_query($db, $s);

                          if ($rs) {
                            if (mysqli_num_rows($rs) == 0) {

                          $sql =  "INSERT INTO cart (customer_id,user_type, restaurant_id, `item_name`, base_price ) VALUES ('$user_id','$user','$rt','$name','$price')";
                          $result = mysqli_query($db, $sql);

                          if($result){
                            // echo '<script>alert("Added to Cart")</script>';
                          }else{
                            // echo '<script>alert("Error adding to cart")</script>';
                          }
                            }
                          }else{
                            // echo '<script>alert("Already in Cart")</script>';
                          }
                              
                        }
                ?>
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

<script>
    $(document).ready(function() {
        $('#latestOrderModal').on('hidden.bs.modal', function() {
            location.reload();
        });
    });
</script>


<script type="text/javascript">

var ID = <?php echo $JsonID; ?>;
var USER_TYPE = <?php echo $Json_usertype; ?>;

  $(document).ready(function(){
    $("#search").keypress(function(){
      $.ajax({
        type:'POST',
        url:'search3.php',
        data:{
          name:$("#search").val(),
          id: ID,
          user_type: USER_TYPE,
  
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