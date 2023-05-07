<?php

$id=$_POST['id'];

var_dump($id);
// Create connection
$conn = mysqli_connect("localhost", "root", "", "eatery");
$sql = "SELECT * FROM item WHERE item_name LIKE '%".$_POST['name']."%'";
$result = mysqli_query($conn, $sql);
if(mysqli_num_rows($result)>0){
	while ($row=mysqli_fetch_assoc($result)) {
        $pic="../";	
		echo "	<tr>
		         
                  <td><img src=".$pic.$row['image']." alt='dekhi na'></td>
		          <td>".$row['item_name']."</td>
		          <td>".$row['stock']." Pieces/Servings</td>
		          <td>Tk.".$row['price']."</td>
		        </tr>";
	}
}
else{
	echo "<tr><td>0 result's found</td></tr>";
}

?>
<!-- 
<td>".$pic.$row['image']."</td> -->