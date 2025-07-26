<?php
include("./functions/userFunctions.php");
include("includes/header.php");

if (isset($_GET['product'])) {
    $product_slug = $_GET['product'];
    $product_data = getSlugActive("products", $product_slug);
    $product = mysqli_fetch_array($product_data);

    if ($product) {

?>
        <div class="py-3 bg-primary">
            <div class="container">
                <h6 class="text-white text-uppercase">
                    <a class="text-white text-uppercase title" href="./index.php">Home</a> /
                    <a class="text-white text-uppercase title" href="./categories.php">Collections</a> /
                    <?= $product['name'] ?>
                </h6>
            </div>
        </div>

        <div class="bg-light py-4">
            <div class="container product_data mt-3">
                <div class="row">
                    <div class="col-md-4">
                        <div class="shadow">
                            <img src="./uploads/<?= $product['image'] ?>" alt="<?= $product['name'] ?>" class="w-100">
                        </div>
                    </div>
                    <div class="col-md-8">
                        <h4 class="fw-bold"><?= $product['name'] ?>
                            <small class="float-end text-danger"><?php if ($product['trending'])
                                                                    ?><i class="fa fa-fire"></i>
                                <?php
                                ?></small>
                        </h4>
                        <hr>
                        <p><?= $product['small_description'] ?></p>
                        <div class="row">
                            <div class="col-md-6">
                                <h5>₱ <span class="text-success fw-bold"><?= number_format($product['selling_price']) ?></span></h5>
                            </div>
                            <div class="col-md-6">
                                <h6>₱ <s class="text-danger"><?= number_format($product['original_price']) ?></s></h6>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-4">
                                <div class="input-group mb-3" style="width: 130px;">
                                    <button class="input-group-text decrement-btn">-</button>
                                    <input type="text" class="form-control bg-white text-center input-qty" value="1" disabled>
                                    <button class="input-group-text increment-btn">+</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-6 px-4">
                                <button class="btn btn-primary addToCartBtn" value="<?= $product['id'] ?>"><i class="fa fa-cart-plus me-2"></i>Add to Cart</button>
                            </div>
                            <div class="col-md-6 px-4">
                                <button class="btn btn-danger"><i class="fa fa-heart me-2"></i> Add to Wishlist</button>
                            </div>
                        </div>
                        <hr>
                        <h6>Product Description:</h6>
                        <p><?= $product['description'] ?></p>
                    </div>
                </div>
            </div>
        </div>
<?php
    } else {
        echo "Product Not Found!";
    }
} else {
    echo "Uh-oh Something Went Wrong!";
}
include("includes/footer.php");
?>