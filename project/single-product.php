<?php  
    require_once './components/header.php';

    if(isset($_POST['add_to_cart'])) {
        $id = $_POST['id'] ?? null;
        if($id != null){
            // add product to cart
            if(!isset($_SESSION['cart'])){
                $_SESSION['cart'] = [];
            }
            if(!isset($_SESSION['cart'][$id])){
                $_SESSION['cart'][$id] = 1;
            }else{
                $_SESSION['cart'][$id]++;
            }
            echo "<script>toastr.success('Product added to cart!'); setTimeout(() => { window.location =  window.location.href }, 2000);</script>";
        }
    }

    $id = $_GET['id'] ?? null;
    if($id == null){
        header('Location: ./index.php');
        exit();
    }
    $productQuery = "SELECT * FROM products WHERE id = $id";
    $productResult = $conn->query($productQuery);
    if($productResult->num_rows == 0){
        echo "<script>toastr.error('Product not found!'); setTimeout(() => { window.location =  './index.php' }, 2000);</script>";
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
            <p class="lead">Price: <span class="text-decoration-line-through text-muted small">$<?= number_format($product->regular_price) ?></span> $<?= number_format($product->sale_price) ?></p>
            <p>
                Lorem ipsum dolor sit amet consectetur adipisicing elit. Labore, asperiores dolorem veritatis sint reiciendis harum quaerat magnam voluptatem. Enim quis omnis modi dignissimos culpa eaque dolorum officia aliquid! Sapiente, iste.
            </p>
            <div>
                <form action="" method="POST">
                    <input type="hidden" name="id" value="<?= $product->id ?>">
                    <button type="submit" class="btn btn-primary" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    // change title to product name
    document.title = "<?= htmlspecialchars($product->name) ?> | Imran Shop";
</script>

<?php  
    require_once './components/footer.php';
?>