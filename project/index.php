<?php
$title = "Home | Imran Shop";
require_once './components/header.php';
?>
<div class="container">
    <!-- hero section -->
    <div class="row">
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <div>
                <h1 class="text-primary">Welcome to Imran Shop</h1>
                <p class="lead">Your one-stop shop for all your needs.</p>
                <!-- social media bar -->
                <div class="social-media mb-3">
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fa-brands fa-facebook-f"></i></a>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fa-brands fa-twitter"></i></a>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fa-brands fa-instagram"></i></a>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fa-brands fa-linkedin-in"></i></a>
                    <a href="#" class="btn btn-outline-primary me-2"><i class="fa-brands fa-youtube"></i></a>
                </div>
                <a href="#" class="btn btn-primary">Shop Now</a>
            </div>
        </div>
        <div class="col-md-6">
            <img src="./assets/images/hero.jpg" alt="Hero Image" class="img-fluid">
        </div>
    </div>
    <!-- end hero section -->
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slider/slide2.jpg" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="./assets/images/slider/slide3.png" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions"
            data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
    <!-- end slider section -->

    <!-- Featured Products -->
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-primary my-4">Featured Products</h2>
            <div class="row">
                <?php
                // select random 4 products from the database
                $featuredProductsQuery = "SELECT * FROM products ORDER BY RAND() LIMIT 4";
                $featuredProductsResult = $conn->query($featuredProductsQuery);
                while ($product = $featuredProductsResult->fetch_object()):
                    ?>
                    <div class="col-md-3">
                        <div class="card mb-4 h-100">
                            <img src="./assets/images/products/<?= $product->image ?>" alt="<?= $product->name ?>"
                                class="card-img-top img-thumbnail p-2"
                                style="height: 100%; height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?= $product->name ?>
                                </h5>
                                <p class="card-text">Price: $<?= number_format($product->sale_price) ?></p>
                                <a href="./single-product.php?id=<?= $product->id ?>" class="btn btn-primary">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>

    <!-- New Arrival -->
    <div class="row mb-5">
        <div class="col-md-12">
            <h2 class="text-center text-primary my-4">New Arrival</h2>
            <div class="row">
                <?php
                // select latest 4 products from the database
                $newArrivalQuery = "SELECT * FROM products ORDER BY created_at DESC LIMIT 4";
                $newArrivalResult = $conn->query($newArrivalQuery);
                while ($product = $newArrivalResult->fetch_object()):
                    ?>
                    <div class="col-md-3">
                        <div class="card mb-4 h-100">
                            <img src="./assets/images/products/<?= $product->image ?>" alt="<?= $product->name ?>"
                                class="card-img-top img-thumbnail p-2"
                                style="height: 100%; height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate"
                                    style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;">
                                    <?= $product->name ?>
                                </h5>
                                <p class="card-text">Price: $<?= number_format($product->sale_price) ?></p>
                                <a href="./single-product.php?id=<?= $product->id ?>" class="btn btn-primary">View
                                    Details</a>
                            </div>
                        </div>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>

<?php
require_once './components/footer.php';
?>