<?php
include("./functions/userFunctions.php");
include("includes/header.php");
?>

<div class="py-3 bg-primary">
    <div class="container">
        <h6 class="text-white text-uppercase">
            <a class="text-white text-uppercase title" href="./index.php">Home</a>
            / Collections
        </h6>
    </div>
</div>

<div class="py-3">
    <div class="contianer">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h4>Our Collections</h4>
                <hr>
                <div class="row"> <?php
                                    $categories = getAllActive("categories");

                                    if (mysqli_num_rows($categories) > 0) {
                                        foreach ($categories as $item) {
                                    ?>
                            <div class="col-md-4 mb-2">
                                <a class="title" href="products.php?category=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" height="175px" alt="<?= $item['name']; ?>" class="w-100 mb-2">
                                            <h4 class="text-center"><?= $item['name']; ?></h4>
                                        </div>
                                    </div>
                                </a>
                            </div>

                    <?php
                                        }
                                    } else {
                                        echo "No categories found!";
                                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php include("includes/footer.php"); ?>