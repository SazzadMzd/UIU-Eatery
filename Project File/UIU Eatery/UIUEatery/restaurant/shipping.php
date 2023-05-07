<?php

    $id = $_GET['id'];
    $user = $_GET['user'];
    $price = $_GET['price'];
    $rt =$_GET['res'];
    $res; 
    $max_id;
?>

<?php
     $conn = new mysqli('localhost', 'root', '', 'eatery');
     $sql = "SELECT * FROM restaurant WHERE restaurant_id='$rt'";
     $result = mysqli_query($conn, $sql);
     
     
     if ($result) {
        while($row=mysqli_fetch_assoc($result)){
            $res = $row['restaurant_name'];
        }

     }
?>


<?php

if (isset($_POST['submit'])) {
	
	$payment = $_POST['radio1'];
    $shipping = $_POST['radio2'];
	
                $conn = new mysqli('localhost', 'root', '', 'eatery');
                $sql = "INSERT INTO orders (customer_id, restaurant_name, user_type, payment_method, receiving_method)
                VALUES (\"$id\", \"$res\", \"$user\", \"$payment\", \"$shipping\")";
               
                $result = mysqli_query($conn, $sql);
                
				
				if ($result) {

					echo "<script>alert('Wow! Shipped.')</script>";
					//header("Location: checkout.php?price=$Total&username=$username");

                    $conn = new mysqli('localhost', 'root', '', 'eatery');
                    $sql = "DELETE FROM cart WHERE customer_id='$id'";
                   
                    mysqli_query($conn, $sql);
					
				} 
				else {
					echo "<script>alert('Woops! Something Wrong Went.')</script>";
				}
                
                // $conn = new mysqli('localhost', 'root', '', 'eatery');
                // $sql ="SELECT MAX(id) FROM orders";
                // $result = mysqli_query($conn, $sql);
                // if ($result) {
                //     while($row=mysqli_fetch_assoc($result)){
                //         $max_id = $row['id'];
                //     }
                // }

                // $conn = new mysqli('localhost', 'root', '', 'eatery');
                // $sql = "INSERT INTO order_details (order_id, restaurant_name, user_type, payment_method, receiving_method)
                // VALUES (\"$max_id\", \"$res\", \"$user\", \"$payment\", \"$shipping\")";
               
                // $result = mysqli_query($conn, $sql);
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="shippingstyle.css">
</head>
<body>
    <div class="header">
        <div class="side-nav">
            <a href="#" class="logo"> <img src="uiulogo.png" alt="give image" class="logo-img">
            </a>

            <ul class="nav-links">
                <li><a href="#"><p>Dashboard</p></a></li>
                <li><a href="#"> <p>Ongoing Orders</p></a></li>
                <li><a href="restaurant_approval_panel.php"><p>Restaurant Aprrovals</p></a></li>
                <li><a href="complaint_panel.php"><p>Complaints</p></a></li>
                <li><a href="#"><p>LogOut</p></a></li>
            </ul>

        </div>
 



        
    <div class="form-container">
        
            <div style="padding-top: 10px; padding-bottom: 10px;">
                <h2 style="color:orange; font-size:40px; margin-left:300px; padding:5px;">Shipping Form</h2>
                <p style="font-size:25px; margin-left:250px; padding:5px;">Place your Shipping Information</p>
            </div>
       
            <hr>

        <div>
            <form action="" method="POST" enctype="multipart/form-data" novalidate>
                <div >
                    <div style="padding-top: 10px; padding-bottom: 10px;" >
                        <label for="User" style="color:orange; font-size:25px; margin: 10px 0px 10px 50px; ">User</label>
                        <input style="padding:5px; margin: 10px 0px 10px 0px; font-size:20px; border: 2px solid #555; border-radius: 4px;" type="text" id="user" name="user" placeholder=<?php echo $id;?> required>  
                   
                        <label style="color:orange; font-size:25px; margin: 10px 0px 10px 0px;" for="Price" >Total Price</label>
                        <input style="padding:5px; margin: 10px 0px 10px 0px; font-size:20px; border: 2px solid #555; border-radius: 4px;" type="text" id="price" name="price" placeholder=<?php echo $price;?>  required>
            
                    </div>

                    <hr >

                    <div>

                        <h4 style="color:orange; font-size:25px; padding:20px;">Payment Method</h4>

                        <div style="padding:10px;">
                            <input style="height: 25px;  width: 25px;" value="Bkash" id="bkash" type="radio" name="radio1" checked required>
                            <label style="font-size:20px; " >Bkash</label>
                        </div>

                        <div style="padding:10px;">
                            <input style="height: 25px;  width: 25px;" value="Nagad" id="nagad" type="radio" name="radio1"  required>
                            <label style="font-size:20px;">Nagad</label>
                        </div>

                        <div style="padding:10px;">
                            <input style="height: 25px;  width: 25px;" value="Ucam" id="ucam" type="radio" name="radio1" required>
                            <label style="font-size:20px;" >Ucam</label>
                        </div>

                        <br>

                        <div style="padding:10px;">
                            <input style="height: 25px;  width: 25px;" value="COD" id="cod" type="radio" name="radio1" required>
                            <label style="font-size:20px;" >COD</label>
                        </div>

                    </div>

                    
                    <hr>

                    <div>

                        <h4 style="color:orange; font-size:25px; padding:20px;">Delivery/Pickup</h4>

                        <div style="padding:10px;">
                            <input style="height: 25px;  width: 25px;" value="Delivery" id="delivery" type="radio" name="radio2" checked required>
                            <label style="font-size:20px; " >Delivery</label>
                        </div>

                        <div style="padding:10px;">
                            <input style="height: 25px;  width: 25px;" value="Pickup" id="pickup" type="radio" name="radio2"required>
                            <label style="font-size:20px;" >Pickup</label>
                        </div>
                    
                    </div>
                    <div style="padding-left:380px; margin-bottom:50px;">
                        <a href="checkout.php?price=<?php echo $Total; ?>&username=<?php echo $username; ?>"><button style="   background-color: orange;  color: white; padding: 15px 32px; text-align: center;
                        text-decoration: none; display: inline-block; font-size: 16px; border-radius: 4px;"  name="submit" >Checkout</button></a>
                    </div>
                </div>
            </form>
        </div>
    </div>











    </div>
   
</body>
</html>