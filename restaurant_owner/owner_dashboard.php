<!DOCTYPE html>
<html>
<head>

</head>

<body>


<?php 
                                if(isset($_GET['login_msg'])) {
                                   
                                  
                                    if($_GET['login_msg'] == 'success') {
                                      echo '<div class="alert alert-success" role="alert">
                                      Login successful!
                                            </div>';
                                   }
                                }
                            ?>

<h1>Owner Dashboard page!!</h1>
     

</body>


</html>