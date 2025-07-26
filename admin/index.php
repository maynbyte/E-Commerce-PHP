<?php

include("../middleware/adminMiddleware.php");
include("./includes/header.php");

?>

<div class="container">
  <div class="row">
    <div class="col-md-12">
      <?php
      $lowQty = getAllLowQty();
      if (mysqli_num_rows($lowQty) > 0) {
      ?>
        <div class="card">
          <div class="card-body border border-danger ">
            <h5>Restock!</h5>
            <p>These following item/s need/s to be restocked:</p>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Product Name</th>
                  <th>Quantity</th>
                </tr>
              </thead>
              <?php foreach ($lowQty as $item) {
              ?>
                <tbody>
                  <tr>
                    <td><?= $item['name'] ?></td>
                    <td>X <?= $item['qty'] ?></td>
                  </tr>
                </tbody>
            <?php
              }
            }
            ?>
            </table>
          </div>
        </div>
    </div>

    <hr>
    <div class="row mt-4 justify-content-center">
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <a href="users.php" class="title">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-user opacity-10"></i>
              </div>
            </a>
            <?php
            $users = getAllUsers();
            if (mysqli_num_rows($users) > 0) {
              $user_data = mysqli_num_rows($users);
            ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Users</p>
                <h4 class="mb-0"><?= $user_data ?></h4>
              </div>
          </div>
        <?php
            }
        ?>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+3% </span>than last month</p>
        </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <a href="stocks.php" class="title">
              <div class="icon icon-lg icon-shape bg-gradient-warning shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-shopping-bag opacity-10"></i>
              </div>
            </a>
            <?php
            $products = getAllQty();
            if (mysqli_num_rows($products) > 0) {
              $total_qty = 0;
              foreach ($products as $product) {
                $total_qty += $product['qty'];
              }
            ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Stocks</p>
                <h4 class="mb-0"><?= $total_qty ?></h4>
              </div>
          </div>
        <?php
            }
        ?>
        <hr class="dark horizontal my-0">
        <div class="card-footer p-3">
          <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than last week</p>
        </div>
        </div>
      </div>
      <div class="col-xl-3 col-sm-6">
        <div class="card">
          <div class="card-header p-3 pt-2">
            <a href="order-history.php" class="title">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="fa fa-money opacity-10"></i>
              </div>
            </a>
            <?php
            $completed_orders = getAllCompletedOrders();
            if (mysqli_num_rows($completed_orders) > 0) {
              $total_price = 0;
              foreach ($completed_orders as $orders) {
                $total_price += $orders['total_price'];
              }
            ?>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Sales</p>
                <h4 class="mb-0">₱ <?= number_format($total_price) ?></h4>
              </div>
          </div>
          <hr class="dark horizontal my-0">
          <div class="card-footer p-3">
            <p class="mb-0"><span class="text-success text-sm font-weight-bolder">+5% </span>than yesterday</p>
          </div>
        </div>
      <?php
            } else {
      ?>
        <div class="text-end pt-1">
          <p class="text-sm mb-0 text-capitalize">Sales</p>
          <h4 class="mb-0">₱ <?= "0" ?></h4>
        </div>
      </div>
      <hr class="dark horizontal my-0">
      <div class="card-footer p-3">
      </div>
    </div>
  <?php
            }
  ?>
  </div>
</div>
</div>
</div>
</div>

<?php include("./includes/footer.php"); ?>