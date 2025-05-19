<?php  
    require_once './components/header.php';

    $id = $_GET['id'] ?? null;
    if($id == null){
        header('Location: ./index.php');
        exit();
    }
    $productQuery = "SELECT * FROM products WHERE id = $id";
    $productResult = $conn->query($productQuery);
    if($productResult->num_rows == 0){
        header('Location: ./index.php');
        exit();
    }
    $product = $productResult->fetch_object();
?>

<div class="container">
    <div class="row py-5">
        <div class="col-md-6">
            <img src="./assets/images/products/<?= $product->image ?>" alt="<?= $product->name ?>" class="img-fluid" style="height: 400px; object-fit: contain;">
        </div>
        <div class="col-md-6 d-flex flex-column justify-content-center">
            <h1 class="text-primary"><?= $product->name ?></h1>
            <p class="lead">Price: <span class="text-decoration-line-through text-muted small">$<?= $product->regular_price ?></span> $<?= $product->sale_price ?></p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, asperiores dolorem veritatis sint reiciendis harum quaerat magnam voluptatem. Enim quis omnis modi dignissimos culpa eaque dolorum officia aliquid! Sapiente, iste.
            </p>
            <div>
                <a href="#" class="btn btn-primary">Add to Cart</a>
            </div>
        </div>
    </div>
</div>

<?php  
    require_once './components/footer.php';
?>