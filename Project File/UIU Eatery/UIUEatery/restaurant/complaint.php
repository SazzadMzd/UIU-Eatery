<!doctype html>
<html lang="en">
  <head>
  	<title>Sidebar 01</title>
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
	              <a href="restaurant.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt ;?>">Home</a>
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
              <a href="complaint.php">Complaint</a>
	          </li>
	          <li>
              <a href="logout.php">LogOut</a>
	          </li>
	        </ul>

	     

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
                </li> -->
                <li class="nav-item">
                <form action="search.php" method="POST">
                    <input style=" padding:6px; margin-top: 8px; margin-right: 16px; font-size: 17px; " type="text" name="khoj"  placeholder="Search for Restaurants">
                    <!-- <input type="submit" value="Search" /> -->
                    </form>
                </li>
              
                <li class="nav-item">
                <button class="notifications-btn">
      <img src="https://www.svgrepo.com/show/133673/notification-bell.svg" alt="" class="notifications-icon">
    </button>
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

    
		<?php
            $conn = new mysqli('localhost', 'root', '', 'eatery');
           
            $sql = "SELECT * FROM restaurant";
            $result = $conn->query($sql);
            ?> 
				

				





        



		<!--new-arrivals start -->
		<section id="new-arrivals" class="new-arrivals">
			<div class="container">
				<div class="section-header">
					<h2 style="font-family: 'Poppins', sans-serif;">Complaint</h2>
				</div><!-- /.section-header -->
				
				<div class="new-arrivals-content">
                    <div class="row">
                     <!-- $_SESSION['id']  -->
                      <div class="col-12">
                        <form action="complaint_form_code.php" method="POST">
                            <div class="mb-3">
                              <label for="">Remarks</label>
                              <textarea name="remarks" class="form-control" cols="30" rows="10" placeholder="Let us know if you have anything to complaint about..."></textarea>
                            </div>
                            <div class="mb-3">
                              <input type="submit" name="Complaint_submit_button" value="Submit" class="btn btn-success">
                            </div>
                        </form>
                      </div>

                    </div>
                </div>

					
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