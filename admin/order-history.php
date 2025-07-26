<?php

include("../middleware/adminMiddleware.php");
include("./includes/header.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4 class="text-white">Order History
                        <a href="orders.php" class="btn btn-dark float-end"><i class="fa fa-reply"></i> Back</a>
                    </h4>
                </div>
                <div class="card-body" id="">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th> User</th>
                                <th>Tracking No.</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        <tbody>
                            <?php
                            $id_num = 1;
                            $orders = getOrderHistory();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td><?= $id_num++; ?></td>
                                        <td><?= $item['name']; ?></td>
                                        <td><?= $item['tracking_no']; ?></td>
                                        <td>₱ <?= number_format($item['total_price']); ?></td>
                                        <td><?= $item['created_at']; ?></td>
                                        <td><a href="view-order.php?t=<?= $item['tracking_no']; ?>" class="btn btn-primary">View Details</a></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="6">No orders yet</td>
                                </tr>
                            <?php
                            }

                            ?>

                        </tbody>
                        </thead>

                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("./includes/footer.php"); ?>