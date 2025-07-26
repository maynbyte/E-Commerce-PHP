<?php
include("./functions/userFunctions.php");
include("includes/header.php");

if (isset($_GET['category'])) {
    $category_slug = $_GET['category'];
    $category_data = getSlugActive("categories", $category_slug);
    $category = mysqli_fetch_array($category_data);
    if ($category) {
        $category_id = $category['id'];
?>

        <div class="py-3 bg-primary">
            <div class="container">
                <h6 class="text-white text-uppercase">
                    <a class="text-white text-uppercase title" href="./index.php">Home</a> /
                    <a class="text-white text-uppercase title" href="./categories.php">Collections</a> /
                    <?= $category['name']; ?>
                </h6>
            </div>
        </div>

        <div class="py-3">
            <div class="contianer">
                <div class="row justify-content-center">
                    <div class="col-md-10">
                        <h4><?= $category['name']; ?></h4>
                        <hr>
                        <div class="row"> <?php
                                            $products = getProdByCategory($category_id);

                                            if (mysqli_num_rows($products) > 0) {
                                                foreach ($products as $item) {
                                            ?>
                                    <div class="col-md-3 mb-2">
                                        <a class="title" href="product-view.php?product=<?= $item['slug']; ?>">
                                            <div class="card shadow">
                                                <div class="card-body">
                                                    <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" height="230px" class="w-100 mb-2">
                                                    <h4 class="text-center"><?= $item['name']; ?></h4>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                            <?php
                                                }
                                            } else {
                                                echo "No products found!";
                                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>


<?php
    } else {
        echo "Uh-oh Something Went Wrong!";
    }
} else {
    echo "Uh-oh Something Went Wrong!";
}
include("includes/footer.php"); ?>