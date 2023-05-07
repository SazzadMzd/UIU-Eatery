<?php 
     $id = $_GET['id'];
     $user_type = $_GET['user'];
     $res = $_GET['res'];
     session_start();
     $_SESSION['id'] =  $id;
     $_SESSION['user_type'] =  $user_type;
     $_SESSION['res'] =  $res;
?>
<html>
<head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.0/css/bootstrap.min.css" integrity="sha384-SI27wrMjH3ZZ89r4o+fGIJtnzkAnFs3E4qz9DIYioCQ5l9Rd/7UAa8DHcaL8jkWt" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.css">
    <link rel="stylesheet" href="ratestyle.css">
</head>
<body style="background: #e2e9f7;">

<div class="header">


    
<div class="container">


        <div class="side-nav" style=" background-color: #2B333F; ">
            <a href="#" class="logo"> <img src="uiulogo.png" alt="give image" class="logo-img">
            </a>

            <ul class="nav-links">
                <li><a href="#"><p>Dashboard</p></a></li>
                
                <li><a href="#"><p>Settings</p></a></li>
            </ul>

        </div>





        <div class="row" style=" background-color: #2B333F; padding: 30px 30px 30px 30px; margin-left:400px; margin-top: 200px; margin-right:200px; border:5px solid; color:orange; ">

                <form action="" method="post">

                    <div>
                        <h3 style="padding: 0px 0px 10px 60px;">Describe your Experience...</h3>
                    </div>

                        <div style="margin-left: 150px; padding-bottom:10px;" class="rateyo" id= "rating"
                        data-rateyo-rating="4"
                        data-rateyo-num-stars="5"
                        data-rateyo-score="3">
                        </div>
                    <div style="font-size: 25px; margin-left: 140px; "> <span  class='result'></span></div>
                   
                    <input type="hidden" name="rating"><br>


                    <div>
                      
                        <input id="myInput" style="  background-color: #909090; font-size: 20px; margin-left:40px; height: 80px; width:350px;" placeholder="Describe your experience..." type="text" name="review">
                    </div>



                    <input style=" margin-left: 140px; margin-top: 20px;  background-color: orange;  color: white; padding: 15px 32px; text-align: center;
                    text-decoration: none; display: inline-block; font-size: 16px; border-radius: 4px;" type="submit" name="add"> 
                    </div>

                    

                </form>
        </div>
</div>














</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/rateYo/2.3.2/jquery.rateyo.min.js"></script>

<script>


    $(function () {
        $(".rateyo").rateYo().on("rateyo.change", function (e, data) {
            var rating = data.rating;
            $(this).parent().find('.score').text('score :'+ $(this).attr('data-rateyo-score'));
            $(this).parent().find('.result').text('Rating : '+ rating);
            $(this).parent().find('input[name=rating]').val(rating); //add rating value to input field
        });
    });

</script>


<script>
    var input = document.getElementById("myInput");
input.addEventListener("focus", function(){
    this.placeholder = "";
});
input.addEventListener("blur", function(){
    this.placeholder = "Describe your experience...";
    
});

</script>
</body>

</html>
<?php
    require_once '../../db.php';
    $conn = new mysqli('localhost', 'root', '', 'eatery');
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    $rv = $_POST["review"];
    $rating = $_POST["rating"];

    $sql = "INSERT INTO rate (customer_id, user_type, restaurant_id, review, rating) VALUES ('$id','$user_type', '$res', '$rv', '$rating')";
    if (mysqli_query($conn, $sql))
    {
        echo "New Rate addedddd successfully";
        header("Location: menu.php?id={$_SESSION['id']}&user={$_SESSION['user_type']}&res_id={$_SESSION['res']}");
    }
    else
    {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>