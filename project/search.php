<?php  
    $query = $_GET['query'] ?? header("Location: ./");
    empty($query) && header("Location: ./");
    require_once './components/header.php';

    $sql = "SELECT products.*, product_categories.name AS category_name FROM products INNER JOIN product_categories ON products.category_id = product_categories.id WHERE products.name LIKE '%$query%' OR products.description LIKE '%$query%' OR product_categories.name LIKE '%$query%' ORDER BY products.created_at DESC";

    $result = $conn->query($sql);
?>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h2 class="text-center text-primary my-4">Search Results for: <?= htmlspecialchars($query) ?></h2>
            <?php if ($result->num_rows > 0): ?>
                <div class="row">
                    <?php while ($product = $result->fetch_object()): ?>
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
                    <?php endwhile; ?>
                </div>
            <?php else: ?>
                <p class="text-center">No results found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>

<?php  
    require_once './components/footer.php';
?>
    