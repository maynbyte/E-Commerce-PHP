<?php
include("functions/userFunctions.php");
include("includes/header.php");
include("authenticate.php")

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white text-uppercase">
            <a class="text-white text-uppercase title" href="./index.php">Home</a>
            / My Orders
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Tracking No.</th>
                                <th>Price</th>
                                <th>Date</th>
                                <th>View</th>
                            </tr>
                        <tbody>
                            <?php
                            $id_num = 1;
                            $orders = getOrders();

                            if (mysqli_num_rows($orders) > 0) {
                                foreach ($orders as $item) {
                            ?>
                                    <tr>
                                        <td><?= $id_num++; ?></td>
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
                                    <td colspan="5">No orders yet</td>
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


<?php include("includes/footer.php"); ?>