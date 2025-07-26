<?php

include("../middleware/adminMiddleware.php");
include("./includes/header.php");

?>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-gradient-primary">
                    <h4 class="text-white">Users
                        <a href="index.php" class="btn btn-dark float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Date</th>
                            </tr>
                        <tbody>
                            <?php
                            $id_num = 1;
                            $users = getAllUsers();

                            if (mysqli_num_rows($users) > 0) {
                                foreach ($users as $user) {
                            ?>
                                    <tr>
                                        <td><?= $id_num++; ?></td>
                                        <td><?= $user['name']; ?></td>
                                        <td><?= $user['email']; ?></td>
                                        <td>+63<?= $user['phone']; ?></td>
                                        <td><?= $user['created_at']; ?></td>
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