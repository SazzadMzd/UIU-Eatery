<?php 

    $db = new mysqli('localhost', 'root','', 'eatery');
    $conn = mysqli_connect('localhost', 'root','', 'eatery');
	

    $pdo = new PDO('mysql:host=localhost;port=3306;dbname=eatery', 'root', '');
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>