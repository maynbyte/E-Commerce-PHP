<?php
include("functions/userFunctions.php");
include("includes/header.php");
include("includes/slider.php");
?>

<div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h4>Trending Products</h4>
                <div class="underline mb-2"></div>
                <div class="owl-carousel">
                    <?php
                    $trendingProducts = getAllTrending();

                    if (mysqli_num_rows($trendingProducts) > 0) {
                        foreach ($trendingProducts as $item) {
                    ?>
                            <div class="item">
                                <a class="title" href="product-view.php?product=<?= $item['slug']; ?>">
                                    <div class="card shadow">
                                        <div class="card-body">
                                            <img src="uploads/<?= $item['image']; ?>" alt="<?= $item['name']; ?>" height="250px" class="w-100 mb-2">
                                            <h6 class="text-center"><?= $item['name']; ?></h6>
                                        </div>
                                    </div>
                                </a>
                            </div>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-f2f2f2">
    <div class="container">
        <div class="row">
            <div class="col-md-12" id="about-us">
                <h4>About Us</h4>
                <div class="underline mb-2"></div>
                <p>
                    Meet the maker behind <span class="text-danger fw-bold">O/WS</span>
                </p>
                <div class="row justify-content-center">
                    <div class="col-md-4 ">
                        <img class="w-100" src="./assets/images/416584384_24867052822893336_1801598909008772460_n.jpg" alt="Polinag, Arwill Joshua">
                    </div> <br>
                    From nothing to progressing day by day. As days of learning the industry of Web Development <br>
                    is getting hard, but things might go easy someday. Just make sure to stay positive and humble at all times.
                    <p class="text-center fw-bold"> <br> - Polinag, Arwill Joshua <br>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="py-5 bg-dark">
    <div class="container">
        <div class="row">
            <div class="col-md-3">
                <h4 class="text-white">O/WS</h4>
                <div class="underline mb-2"></div>
                <a href="index.php" class="text-white title"><i class="fa fa-angle-right"></i> Home</a><br>
                <a href="#about-us" class="text-white title"><i class="fa fa-angle-right"></i> About Us</a><br>
                <a href="cart.php" class="text-white title"><i class="fa fa-angle-right"></i> My Cart</a><br>
                <a href="categories.php" class="text-white title"><i class="fa fa-angle-right"></i> Our Collections</a>
            </div>
            <div class="col-md-3">
                <h4 class="text-white">Address</h4>
                <p class="text-white">STI Building, Tirona Hi-way (In front of SM City Bacoor),
                    Imus,
                    Philippines</p>
                <a class="text-white title" href="tel:+639123456789"><i class="fa fa-phone"></i> +639123456789</a> <br>
                <a class="text-white title" href="mailto:ows@mail.com"><i class="fa fa-envelope"></i> ows@mail.com</a>
            </div>
            <div class="col-md-6">
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d241.47993419409542!2d120.95226208724105!3d14.445656755324286!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397d279c39ea63b%3A0x37a9cade6e30b81f!2sSTI%20College%20Bacoor!5e0!3m2!1sen!2sph!4v1705019374804!5m2!1sen!2sph" class="w-100" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            </div>
        </div>
    </div>
</div>
<div class="py-2 bg-danger">
    <div class="text-center">
        <p class="mb-0 text-white">All rights reserved | Copyright @ R-Will | <?= date('Y') ?></p>
    </div>
</div>


<?php include("includes/footer.php"); ?>

<script>
    $(document).ready(function() {
        $('.owl-carousel').owlCarousel({
            loop: true,
            margin: 10,
            nav: true,
            responsive: {
                0: {
                    items: 1
                },
                600: {
                    items: 3
                },
                1000: {
                    items: 4
                }
            }
        })
    });
</script>