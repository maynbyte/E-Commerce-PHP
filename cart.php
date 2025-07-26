<?php
include("functions/userFunctions.php");
include("includes/header.php");
include("authenticate.php")

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white text-uppercase">
            <a class="text-white text-uppercase title" href="./index.php">Home</a>
            / Cart
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="">
            <div class="row">
                <div class="col-md-12">
                    <div id="mycart">
                        <?php
                        $items = getCartItems();
                        if (mysqli_num_rows($items) > 0) {
                        ?>
                            <div class="row align-items-center">
                                <div class="col-md-5">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Quantity</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Remove</h6>
                                </div>
                            </div>
                            <div id="mycart">
                                <?php
                                foreach ($items as $cart_item) {
                                ?>
                                    <div class="card product_data shadow-sm mb-3">
                                        <div class="row align-items-center">
                                            <div class="col-md-2">
                                                <img src="uploads/<?= $cart_item['image']; ?>" alt="<?= $cart_item['name']; ?>" width="80px">
                                            </div>
                                            <div class="col-md-3">
                                                <h5><?= $cart_item['name']; ?></h5>
                                            </div>
                                            <div class="col-md-3">
                                                <h5>₱ <?= number_format($cart_item['selling_price']); ?></h5>
                                            </div>
                                            <div class="col-md-2">
                                                <input type="hidden" class="prodId" value="<?= $cart_item['prod_id'] ?>">
                                                <div class="input-group mb-3" style="width: 130px;">
                                                    <button class="input-group-text decrement-btn updateQty">-</button>
                                                    <input type="text" class="form-control bg-white text-center input-qty" value="<?= $cart_item['prod_qty']; ?>" disabled>
                                                    <button class="input-group-text increment-btn updateQty">+</button>
                                                </div>
                                            </div>
                                            <div class="col-md-2">
                                                <button class="btn btn-danger btn-sm deleteItem" value="<?= $cart_item['cid'] ?>">
                                                    <i class="fa fa-trash me-2"></i>
                                                    Remove</button>
                                            </div>
                                        </div>
                                    </div>
                                <?php
                                }
                                ?>
                            </div>
                            <div class="float-end">
                                <a href="checkout.php" class="btn btn-primary">
                                    Proceed to checkout <i class="fa fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        <?php
                        } else {
                        ?>
                            <div class="card card-body shadow text-center">
                                <h4 class="py-3">
                                    Your cart is empty!
                                </h4>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>