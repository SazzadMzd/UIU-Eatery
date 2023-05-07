<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="panelstyle.css">


    <style>
      #customers {
        font-family: 'Poppins', sans-serif;
        border-collapse: collapse;
        width: 50%;
        margin-left: 500px;
        margin-top: 100px;
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
        text-align: center;
        background-color: #133475;;
        color: white;
      }
</style>















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
                <li><a href="../UIUEatery/restaurant/logout.php"><p>LogOut</p></a></li>
            </ul>

        </div>


        <h1 style="color:orange; font-size:40px; margin-left:300px; padding:5px;">Complaints</h1>
        <table width="1000" border="5" id="customers">
		
		<tr>
			<th>Customer</th>
			<th>Complaint</th>
			
		</tr>
<?php  
         require_once '../db.php';
		$sql = "SELECT * FROM complaint";
		$result = mysqli_query($db, $sql);
		
		while($row=mysqli_fetch_assoc($result)){		
    ?>
		<tr>
		<td><?php echo $row["user_id"]; ?></td>
		<td><?php echo $row["remarks"]; ?></td>
		
		</tr>
	<?php } ?>
	




</table>














    </div>
</body>
</html>