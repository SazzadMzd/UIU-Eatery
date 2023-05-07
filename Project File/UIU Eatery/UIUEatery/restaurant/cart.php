
<!-- Variables -->

<?php
    $id = $_GET['id']; 
    $user = $_GET['user'];
    $rt = $_GET['res'];
    $res;
    $max_id;
    
    $JsonID = json_encode($id);
    $JsonUSER = json_encode($user);
    $JsonRESNUM = json_encode($rt); 
  ?>

<!-- Return Restaurant Name -->

<?php
    $c = new mysqli('localhost', 'root', '', 'eatery');
    $sqlc = "SELECT * FROM restaurant WHERE restaurant_id='$rt'";
    $rc = mysqli_query($c, $sqlc);
       
    if ($rc) {
      while($r=mysqli_fetch_assoc($rc)){
          $res = $r['restaurant_name'];
      }
    }
    $JsonRES = json_encode($res);
  ?>

<?php

if (isset($_POST['submit'])) {

  $c = $_POST['i'];
  $uu = $_POST['u'];
  $ii = $_POST['nm'];
  $pr = $_POST['pr'];

  session_start();
     $_SESSION['ii'] =  $c;
     $_SESSION['uu'] =  $uu;
     $_SESSION['rr'] =  $rt;
	
                $conn = new mysqli('localhost', 'root', '', 'eatery');
                $sql = "DELETE * FROM cart WHERE customer_id='$c' AND user_type='$uu' AND item_name='$ii' AND base_price='$pr' ";
               
                $result = mysqli_query($conn, $sql);

                if($result){
                  header("Location: cart.php?id={$_SESSION['ii']}&user={$_SESSION['uu']}&res={$_SESSION['rr']}");
                }
              
}

?>

<!doctype html>

  <html lang="en">
    <head>
  	  <title>Cart</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">
		
		  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		  <link rel="stylesheet" href="css/style.css">

      <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
      <link rel="stylesheet" href="shippingstyle.css">
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
        form {
          width: 300px;
          margin: 0 auto;
          text-align: center;
          padding-top: 50px;
        }
        .value-button {
          display: inline-block;
          border: 1px solid #ddd;
          margin: 0px;
          width: 40px;
          height: 20px;
          text-align: center;
          vertical-align: middle;
          padding: 11px 0;
          background: #eee;
          -webkit-touch-callout: none;
          -webkit-user-select: none;
          -khtml-user-select: none;
          -moz-user-select: none;
          -ms-user-select: none;
          user-select: none;
        }
        .value-button:hover {
          cursor: pointer;
        }
        form #decrease {
          margin-right: -4px;
          border-radius: 8px 0 0 8px;
        }
        form #increase {
          margin-left: -4px;
          border-radius: 0 8px 8px 0;
        }
        form #input-wrap {
          margin: 0px;
          padding: 0px;
        }
        input#number {
          text-align: center;
          border: none;
          border-top: 1px solid #ddd;
          border-bottom: 1px solid #ddd;
          margin: 0px;
          width: 40px;
          height: 40px;
        }
        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
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
	          <li><a href="../../landing_page/">Home</a></li>
	          <li><a href="logout.php">LogOut</a></li>
	        </ul>
	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <!-- <li class="nav-item active">
                    <a class="nav-link" href="#">Home</a>
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

        <h1 style="font-size:40px; font-family: 'Poppins', sans-serif; margin: 0px 0px 0px 500px;">Cart</h1>

        <?php $sum=0;?> 

        <table class="table"  id="customers">

		        <thead class="text-center">
              <tr >
                <th>Item Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th style="column-width: 50px;">Remove</th>
		          </tr>
            </thead>

            <tbody class="text-center">
		
    <?php  
        $id = $_GET['id'];
        $user = $_GET['user'];
        
        $conn = new mysqli('localhost', 'root', '', 'eatery');
		    $sql = "SELECT * FROM cart WHERE customer_id = '$id' AND user_type='$user'";
		    $result = mysqli_query($conn, $sql);
		    
        $key = 0;
   
		    while($row=mysqli_fetch_assoc($result)){ 
                $key = $key+1;
    ?>
	
      <tr id="row-<?= $key?>">

        <td><?php echo $row["item_name"]; ?><input id="itemname-<?= $key ?>" type="hidden" class="iname" value=<?php echo $row["item_name"];?>></td>
        <td><?php echo  $row["base_price"]; ?><input id="baseprice-<?= $key ?>" type="hidden" class="iprice" value=<?php echo $row["base_price"];?>></td>     
        <td> 
<div>
    <button type="button" onclick="decrementValue(<?= $key ?>, <?= $row["base_price"]?>)" >-</button>                 
    <input type="number" class="text-center iq"  id="inputField-<?= $key ?>" name="quantity" min="1" max="100" value="<?php echo $row["quantity"];?>">
    <button type="button" onclick="incrementValue(<?= $key ?>, <?= $row["base_price"]?>)" >+</button>
</div> 
          </td>
    <td>  
            <input id="totalprice-<?= $key ?>" type="number" class="itotal" min="0" value=<?php echo $row["base_price"];?> onkeydown="handleKeyDown(event)" />
            <?php $sum = $sum + $row["base_price"];?>
    </td>

    <td style="column-width: 50px;">
        <button id="delete-btn-<?= $key ?>" data-cart-id="<?php echo $row["item_name"]; ?>" onclick="f(<?= $key ?>)" style="font-size:20px"> <i class="fa">&#xf00d;</i></button>
      </td>

	</tr>
		
	<?php
      
} ?>
    </tbody>
</table>
  
    <div style="padding-left: 900px; color:black; ">Total :  
      <input id="sumTotal" type="number" class="total" value=<?php echo $sum;?> />
    </div>

    <div class="form-container" style="margin-left: auto;">
      <div style="">
        <form action="" method="POST" enctype="multipart/form-data" novalidate>
            <div >
                <div style="">
                    <h2 style="color:orange; font-size:20px;">Payment Method</h2>

                    <div style=" padding:10px; font-size:15px;">
                        <input style="height: 15px;  width: 25px;" value="Bkash" id="bkash" type="radio" name="radio1" checked required>
                        <label> Bkash</label>

                        <input style="height: 15px;  width: 25px;" value="Nagad" id="nagad" type="radio" name="radio1"  required>
                        <label> Nagad</label>

                        <input style="height: 15px;  width: 25px;" value="Ucam" id="ucam" type="radio" name="radio1" required>
                        <label> Ucam</label>

                        <br>

                        <input style="height: 15px;  width: 25px;" value="COD" id="cod" type="radio" name="radio1" required>
                        <label> COD</label>
                    </div>
                </div>

                <div>

                    <h2 style="color:orange; font-size:20px; padding:20px;">Delivery/Pickup</h2>

                    <div style="padding:10px; font-size:15px;">
                        <input style="height: 15px;  width: 25px;" value="Delivery" id="delivery" type="radio" name="radio2" checked required>
                        <label>Delivery</label>

                        <input style="height: 15px;  width: 25px;" value="Pickup" id="pickup" type="radio" name="radio2"required>
                        <label>Pickup</label>
                    </div>   
                </div>
                <div style="margin-bottom:50px;">
                <button style="   background-color: orange;  color: white; padding: 15px 32px; text-align: center;
                    text-decoration: none; display: inline-block; font-size: 16px; border-radius: 4px;"  type="button" onclick="checkout()" >Checkout</button>
                </div>
            </div>
        </form>
    </div>
</div>



				

	
      </div>
		</div>


    <script>
      function f(obj){

        var deleteBtn = document.getElementById('delete-btn-'+obj);

// Add an event listener to the button
deleteBtn.addEventListener('click', function() {
  
 
    // Get the cart row ID from the data attribute of the button
    var cartId = deleteBtn.getAttribute('data-cart-id');

    // Redirect to the PHP script that will delete the row from the database
    window.location.href = 'delete_cart_row.php?id=<?php echo $id;?>&user=<?php echo $user;?>&res=<?php echo $rt;?>&item_name=' + cartId;
  
});

      }
    


    </script>

    <!-- Cart Functions And Orders Table Insertion -->
    <script>

        function checkout(){

          const tableData = [];
          const item_to_del = [];

          // Order Table Insertion Function
          
          var ID = <?php echo $JsonID; ?>;
          var USER = <?php echo $JsonUSER; ?>;
          var RES = <?php echo $JsonRES; ?>;
          var RESNUM = <?php echo $JsonRESNUM; ?>;

          const PYMNT = document.querySelector('input[name="radio1"]:checked').value;
          const DLVRY = document.querySelector('input[name="radio2"]:checked').value;

          let data = {
            id: ID,
            user: USER,
            restaurant: RES,
            pmt: PYMNT,
            dly: DLVRY
        };

          $.ajax({
            type: "POST",
            url: "insert.php",
            data: data,
            success: function(response) {
              console.log(response);
            }
        });


          // Order Details Table Insertion Function

          const table = document.querySelector('table');

          const rows = table.querySelectorAll('tr');

          // loop through each row
          rows.forEach((row, index) => {
            // skip the header row
            if (index === 0) return;

            // get all the cells in the row
            const cells = row.querySelectorAll('td');

            // extract the cell values
            const item = cells[0].textContent;
            const price = cells[1].textContent;
            const quantity = cells[2].querySelector('input') ? cells[2].querySelector('input').value : cells[2].textContent;
            const total = cells[3].querySelector('input') ? cells[3].querySelector('input').value : cells[3].textContent;

            // create an object representing the row data
            const rowData = { item, price, quantity, total };

            const dta = {RESNUM, item, quantity};

            // add the row data to the tableData array
            tableData.push(rowData);
            item_to_del.push(dta);

          });

          const jsonData = JSON.stringify(tableData);

          $.ajax({
            type: "POST",
            url: "tmp.php",
            data: {json: jsonData},
            success: function(data) {
              console.log("Response from server: " + data);
            }
          });
          
         
          let dt = {
            id: ID,
            user: USER,
            restaurant: RESNUM
        };


          $.ajax({
            type: "POST",
            url: "del.php",
            data: dt,
            success: function(response) {
              console.log(3);
            }
        });

        const for_delete = JSON.stringify(item_to_del);

        $.ajax({
            type: "POST",
            url: "stock_delete.php",
            data: {json: for_delete},
            success: function(data) {
              console.log("Response from server: " + data);
            },
            error: function(xhr, textStatus, errorThrown) {
              console.error("Error: " + errorThrown);
            }
          });
          alert("order placed");
        window.location.href = "menu.php?id=<?php echo $id; ?>&user=<?php echo $user;?>&res_id=<?php echo $rt; ?>";
      }

    </script>

    <!-- Function For Quantity and Total Subtotal Adjustment -->

    <script>
          function handleKeyDown(e) {
            if (e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57)) {
              e.preventDefault();
              return false;
            }
          }


        function incrementValue(inputFieldId, basePrice) {

          var inputField = document.getElementById("inputField-"+inputFieldId);
          if (inputField.value < Number(inputField.max)) {
            inputField.value++;
            document.getElementById("sumTotal").value = Number(document.getElementById("sumTotal").value)+basePrice;
            document.getElementById("totalprice-"+inputFieldId).value = basePrice*inputField.value;
          }
          
        }

        function decrementValue(inputFieldId, basePrice) {
          var inputField = document.getElementById("inputField-"+inputFieldId);
          if (inputField.value > inputField.min) {
            inputField.value--;
            document.getElementById("sumTotal").value = Number(document.getElementById("sumTotal").value)-basePrice;
            document.getElementById("totalprice-"+inputFieldId).value = basePrice*inputField.value;
          }
          
        }
      </script>
      <!--------- END--------- -->

      <script src="js/jquery.min.js"></script>
      <script src="js/popper.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/main.js"></script>
      <script src="qn.js"></script>

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