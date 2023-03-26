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

        $sql = "SELECT * FROM `owner` JOIN `restaurant` ON owner.restaurant_id = restaurant.restaurant_id WHERE status LIKE 'pending'";
        $result = mysqli_query($db, $sql);
        $restaurant_pending_data = array();

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                $restaurant_pending_data[] = $row;
            }
        }


        $sql2 = "SELECT * FROM `owner` JOIN `restaurant` ON owner.restaurant_id = restaurant.restaurant_id WHERE status LIKE 'accepted'";
        $result2 = mysqli_query($db, $sql2);
        $restaurant_accepted_data = array();

        if (mysqli_num_rows($result2) > 0) {
            while ($row2 = mysqli_fetch_assoc($result2)) {
                $restaurant_accepted_data[] = $row2;
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
                    <h3>Pending Restaurants</h3>
                   <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Restaurant</th>
                                <th>Owner Email</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($restaurant_pending_data) > 0): ?>
                                <?php foreach ($restaurant_pending_data as $key => $restaurant): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $restaurant['restaurant_name'] ?></td>
                                        <td><?= $restaurant['email'] ?></td>
                                        <td><img src="<?= $restaurant['img_dir'] ?>" alt="<?= $restaurant['restaurant_name'] ?>" style="width:100px;"></td>
                                        <td>
                                            <a href="approve-restaurant.php?id=<?= $restaurant['restaurant_id'] ?>" class="btn btn-sm btn-success">Approve</a>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No pending restaurants found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
                <div class="col-md-12">
                    <h3>Approved Restaurants</h3>
                   <table class="table table-dark">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Restaurant</th>
                                <th>Owner Email</th>
                                <th>Image</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (count($restaurant_accepted_data) > 0): ?>
                                <?php foreach ($restaurant_accepted_data as $key => $restaurant): ?>
                                    <tr>
                                        <td><?= $key+1 ?></td>
                                        <td><?= $restaurant['restaurant_name'] ?></td>
                                        <td><?= $restaurant['email'] ?></td>
                                        <td><img src="<?= $restaurant['img_dir'] ?>" alt="<?= $restaurant['restaurant_name'] ?>" style="width:100px;"></td>
                                        
                                    </tr>
                                <?php endforeach; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5">No accepted restaurants found.</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </section>
   


    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>