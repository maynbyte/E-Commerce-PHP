<?php
include("functions/userFunctions.php");
include("includes/header.php");
include("authenticate.php")

?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white text-uppercase">
            <a class="text-white text-uppercase title" href="./index.php">Home</a>
            / Checkout
        </h6>
    </div>
</div>

<div class="py-5">
    <div class="container">
        <div class="card">
            <div class="card-body shadow">
                <form action="functions/placeOrder.php" method="POST">
                    <div class="row">
                        <div class="col-md-7">
                            <h5>Basic Details</h5>
                            <hr>
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Name</label>
                                    <input type="text" name="name" id="name" required placeholder="Enter your full name" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">E-mail</label>
                                    <input type="email" name="email" id="email" required placeholder="Enter your email" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Phone</label>
                                    <input type="text" name="phone" id="phone" required placeholder="Enter your phone number" class="form-control">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label class="fw-bold">Zip Code</label>
                                    <input type="text" name="pincode" id="pincode" required placeholder="Enter your zip code" class="form-control">
                                </div>
                                <div class="col-md-12 mb-3">
                                    <label class="fw-bold">Address</label>
                                    <textarea name="address" id="name" required class="form-control" rows="5"></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <h5>Order Details</h5>
                            <hr>
                            <div class="row align-items-center">
                                <div class="col-md-7">
                                    <h6>Product</h6>
                                </div>
                                <div class="col-md-2">
                                    <h6>Price</h6>
                                </div>
                                <div class="col-md-3">
                                    <h6>Quantity</h6>
                                </div>
                            </div>
                            <?php $items = getCartItems();
                            $totalPrice = 0;
                            foreach ($items as $cart_item) {
                            ?>
                                <div class="mb-1 border">
                                    <div class="row align-items-center">
                                        <div class="col-md-2">
                                            <img src="uploads/<?= $cart_item['image'] ?>" alt="<?= $cart_item['name'] ?>" width="60px">
                                        </div>
                                        <div class="col-md-5">
                                            <label><?= $cart_item['name'] ?></label>
                                        </div>
                                        <div class="col-md-3">
                                            <label>₱ <?= number_format($cart_item['selling_price']) ?></label>
                                        </div>
                                        <div class="col-md-2">
                                            <label>x <?= $cart_item['prod_qty'] ?></label>
                                        </div>
                                    </div>
                                </div>
                            <?php
                                $totalPrice += $cart_item['selling_price'] * $cart_item['prod_qty'];
                            }
                            ?>
                            <hr>
                            <h5>Total Price: <span class="float-end fw-bold">₱ <?= number_format($totalPrice) ?></span></h5>
                            <div class="">
                                <input type="hidden" name="payment_mode" value="COD">
                                <button type="submit" name="placeOrderBtn" class="btn btn-primary w-100">Confirm and place order | COD</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>