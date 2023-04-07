<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eatery</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

</head>
<body>

    <?php 
        require_once '../db.php';

        $sql = "SELECT customer_id, restaurant_name, order_date, order_status FROM orders";
        $result = mysqli_query($db, $sql);
        $order_data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $order_data[] = $row;
            }
        }
    ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-12 d-flex justify-content-center">
                    <img src="../images/logo.png" alt="Logo" style="max-width: 10%;">
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <h3>Orders</h3>
                   <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Customer Name</th>
                                <th>Restaurant</th>
                                <th>Order Date</th>
                                <th>Order Status<br>
                                    0-pending|1-completed</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($order_data) > 0): ?>
                                <?php foreach ($order_data as $key => $order): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        
                                        <td><?= $order['customer_id'] ?></td>
                                        <td><?= $order['restaurant_name'] ?></td>
                                        <td><?= $order['order_date'] ?></td>
                                        <td><?= $order['order_status'] ?></td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="6">No orders found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
   
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP
