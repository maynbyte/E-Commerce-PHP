<?php

include("../middleware/adminMiddleware.php");
include("./includes/header.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4 class="text-white">Stocks
                        <a href="index.php" class="btn btn-dark float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>Product Name</th>
                                <th>Quantity</th>
                            </tr>
                        <tbody>
                            <?php
                            $id_num = 1;
                            $products = getAllQty();

                            if (mysqli_num_rows($products) > 0) {
                                foreach ($products as $product) {
                            ?>
                                    <tr>
                                        <td><?= $product['name']; ?></td>
                                        <td>x <?= $product['qty']; ?></td>
                                    </tr>
                                <?php
                                }
                            } else {
                                ?>
                                <tr>
                                    <td colspan="5">No users yet</td>
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