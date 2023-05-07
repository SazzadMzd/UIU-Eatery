<?php
 require_once '../../db.php';

// Create connection
$conn = mysqli_connect("localhost", "root", "", "eatery");
$sql = "SELECT * FROM restaurant WHERE restaurant_name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
        
        $link = "menu.php?res_id=" . $row['restaurant_id'] . "&id=" . $_POST['id'] . "&user=" . $_POST['user_type'];

        $pic="../";	
     
		echo "	         
           <img src=".$pic.$row['img_dir']." width="."200"." height="."150"." alt='dekhi na'>
           <h4><a href='$link'>".$row['restaurant_name']."</a></h4>

        ";
		      
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>
