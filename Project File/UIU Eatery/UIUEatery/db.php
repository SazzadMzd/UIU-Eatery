<?php

 $dbhost = "localhost";
 $dbuser = "root";
 $dbpass = "";
 $db = "eatery";


 $conn = new mysqli($dbhost, $dbuser, $dbpass,$db) or die("Connect failed: %s\n". $conn -> error);

 
 return $conn;
 
 

 $conn -> close();
 
   
?>