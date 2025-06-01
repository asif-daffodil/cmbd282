<?php  
    $id = $_GET['id'] ?? header("Location: ./");
    if(empty($id)){
        header("Location: ./");
        exit();
    }
    require_once './components/header.php';
?>
<div class="container">
    <h2 class="text-center text-primary my-4">Category: <?= htmlspecialchars($id) ?></h2>
    <div class="row">
        <?php
            $sql = "SELECT products.*, product_categories.name AS category_name FROM products INNER JOIN product_categories ON products.category_id = product_categories.id WHERE product_categories.id = $id";
            $result = $conn->query($sql);
            if ($result->num_rows > 0):
                while ($product = $result->fetch_object()):
        ?>
        <div class="col-md-3 mb-4">
            <div class="card h-100">
                <img src="./assets/images/products/<?= $product->image ?>" alt="<?= htmlspecialchars($product->name) ?>" class="card-img-top img-thumbnail p-2" style="height: 200px; object-fit: contain;">
                <div class="card-body">
                    <h5 class="card-title text-truncate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= htmlspecialchars($product->name) ?></h5>
                    <p class="card-text">Category: <?= htmlspecialchars($product->category_name) ?></p>
                    <p class="card-text">Price: $<?= number_format($product->sale_price, 2) ?></p>
                    <a href="./single-product.php?id=<?= $product->id ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <?php
                endwhile;
            else:
        ?>
        <p class="text-center">No products found in this category.</p>
        <?php endif; ?>
    </div>
</div>

<?php  
    require_once './components/footer.php';
?>
    