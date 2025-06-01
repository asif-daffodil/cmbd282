<?php  
    require_once './components/header.php';
    // select all categories from product_categories
    $categoriesQuery = "SELECT * FROM product_categories";
    $categoriesResult = $conn->query($categoriesQuery);

    // select all from products
    $productsQuery = "SELECT *, products.id AS product_id, product_categories.name AS category_name FROM products INNER JOIN product_categories ON products.category_id = product_categories.id";
    $productsResult = $conn->query($productsQuery);
?>
<div class="container">
    <div class="row">
        <div class="col-md-2">
            <div class="list-group">
                <h4 class="text-primary">Categories</h4>
                <?php while($category = $categoriesResult->fetch_object()): ?>
                    <a href="./category.php?id=<?= $category->id ?>" class="list-group-item list-group-item-action <?= isset($_GET['id']) && $_GET['id'] == $category->id ? 'active' : '' ?>">
                        <?= htmlspecialchars($category->name) ?>
                    </a>
                <?php endwhile; ?>
            </div>
        </div>
        <div class="col-md-10">
            <div class="row">
                <?php while($product = $productsResult->fetch_object()): ?>
                    <div class="col-md-3 mb-4">
                        <div class="card h-100">
                            <img src="./assets/images/products/<?= $product->image ?>" alt="<?= htmlspecialchars($product->name) ?>" class="card-img-top img-thumbnail p-2" style="height: 200px; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title text-truncate" style="white-space: nowrap; overflow: hidden; text-overflow: ellipsis;"><?= htmlspecialchars($product->name) ?></h5>
                                <p class="card-text">Category: <?= htmlspecialchars($product->category_name) ?></p>
                                <p class="card-text">Price: $<?= number_format($product->sale_price, 2) ?></p>
                                <a href="./single-product.php?id=<?= $product->product_id ?>" class="btn btn-primary">View Details</a>
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
    