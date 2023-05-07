<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>AuctionBits</title>
  <link rel="stylesheet" href="searchstyle.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
</head>
<body>
  <div class="wrapper">
    <nav>
      <input type="checkbox" id="show-search">
      <input type="checkbox" id="show-menu">
      <label for="show-menu" class="menu-icon"><i class="fas fa-bars"></i></label>
      <div class="content">
      <div class="logo"><a href="#">Eatery</a>
      
    </div>
        <ul class="links">
          <li><a href="index.php">Home</a></li>
          <!-- <li><a href="#">About</a></li>
          <li>
              
            <a href="#" class="desktop-link">Features</a>
            <input type="checkbox" id="show-features">
            <label for="show-features">Features</label>
            <ul>
              <li><a href="#">Drop Menu 1</a></li>
              <li><a href="#">Drop Menu 2</a></li>
              <li><a href="#">Drop Menu 3</a></li>
              <li><a href="#">Drop Menu 4</a></li>
            </ul>
          </li>
          <li>
            <a href="#" class="desktop-link">Services</a>
            <input type="checkbox" id="show-services">
            <label for="show-services">Services</label> -->
            <!-- <ul>
              <li><a href="#">Drop Menu 1</a></li>
              <li><a href="#">Drop Menu 2</a></li>
              <li><a href="#">Drop Menu 3</a></li>
              <li>
                <a href="#" class="desktop-link">More Items</a>
                <input type="checkbox" id="show-items">
                <label for="show-items">More Items</label>
                <ul>
                  <li><a href="#">Sub Menu 1</a></li>
                  <li><a href="#">Sub Menu 2</a></li>
                  <li><a href="#">Sub Menu 3</a></li>
                </ul>
              </li>
            </ul> -->
          <!-- </li>
          <li><a href="#">Feedback</a></li> -->
        </ul>
      </div>
      <label for="show-search" class="search-icon"><i class="fas fa-search"></i></label>
      <form action="#" class="search-box">
        <input type="text" placeholder="Type Something to Search..." required>
        <button type="submit" class="go-icon"><i class="fas fa-long-arrow-alt-right"></i></button>
      </form>
    </nav>
  </div>



<div class="hehe">
  <br><br><br><br><br>
</div>
<?php
            $kisu=$_POST['khoj'];
            $conn = new mysqli('localhost', 'root', '', 'eatery');
            $sql = "SELECT * FROM restaurant where restaurant_name LIKE '%$kisu%'  ";
            $result = $conn->query($sql);
            ?> <div class="books-container"> <?php
            if ($result->num_rows > 0) {
            // output data of each row
            while($row = $result->fetch_assoc()) {
              $pic="../";
                ?>
                    
                        <div class="product">
                           <div class="product-info">
                                <div class="picture"><img src="<?php echo $pic.$row['img_dir']?>" style="height: 250px; width: 350px;" alt=""></div>
                                <!-- <div class="product-name"><h5>Product ID : <?php echo $row['Id'] ?> </h5> </div> -->
                                <div class="product-name"><h5><?php echo $row['restaurant_name'] ?> </h5></div>
                                <!-- <div class="product-writer font-weight-bold"> <h5><?php echo $row['Description'] ?></h5> </div>
                                <div class="text-secondary text-uppercase"><strong> <?php echo $row['Category'] ?> </strong></div>

                                <img src="Images/star-rating.jpg"  width="30px" height="20px" alt="">
								<div class="text-secondary text-uppercase"><Strong><?php echo $row["rating"]; ?></Strong> </div> -->
                                              
	
				

                                
                               

                              
                                
                               
                                
								
                               
                            </div>
                        </div>
                    </a>
                <?php
            } ?> </div> <?php
            } else {
            echo "0 results";
            }
            $conn->close();
        ?>

    </body>
</html>