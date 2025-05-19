<?php
    require_once("./header.php");
    require_once("./sidebar.php");

    $sql = "SELECT * FROM `products` ORDER BY `id` DESC";
    $result = $conn->query($sql);
?>

    <div id="right-panel" class="right-panel">

        <?php require_once('./topBar.php') ?>

        <div class="breadcrumbs">
            <div class="col-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>All products</h1>
                        <?php if(!isset($_GET['eid']) && !isset($_GET['did'])) {?>
                        <table class="table table-striped" id="productList">
                            <thead>
                                <tr>
                                    <th>SN</th>
                                    <th>Name</th>
                                    <th>Regular Price</th>
                                    <th>Sale Price</th>
                                    <th>Category</th>
                                    <th>Image</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $sn = 1;
                                while($product = $result->fetch_object()): ?>
                                    <tr>
                                        <td>
                                            <?= $sn++ ?>
                                        </td>
                                        <td><?= $product->name ?></td>
                                        <td><?= $product->regular_price ?></td>
                                        <td><?= $product->sale_price ?></td>
                                        <td><?= $product->category_id ?></td>
                                        <td><img src="../assets/images/products/<?= $product->image ?>" alt="<?= $product->name ?>" width="100"></td>
                                        <td>
                                            <a href="./allProducts.php?eid=<?= $product->id ?>" class="btn btn-warning">Edit</a>
                                            <a href="./allProducts.php?did=<?= $product->id ?>" class="btn btn-danger">Delete</a>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            </tbody>
                        </table>
                        <?php } ?>
                        <?php
                        if(isset($_GET['eid'])) {
                            $id = $_GET['eid'];
                            $getProductQuery = "SELECT * FROM `products` WHERE `id` = $id";
                            $getProductResult = $conn->query($getProductQuery);
                            $product = $getProductResult->fetch_object();
                            if(isset($_POST['updateProduct'])) {
                                $name = $_POST['name'];
                                $regular_price = $_POST['regular_price'];
                                $sale_price = $_POST['sale_price'];
                                $category_id = $_POST['category_id'];

                                if(empty($name)) {
                                    $errName = "Please enter product name";
                                }
                                if(empty($regular_price)) {
                                    $errRegular_price = "Please enter regular price";
                                }
                                if(empty($sale_price)) {
                                    $errSale_price = "Please enter sale price";
                                }
                                if(empty($category_id)) {
                                    $errCategory_id = "Please select category";
                                }

                                if(!isset($errName) && !isset($errRegular_price) && !isset($errSale_price) && !isset($errCategory_id)) {
                                    // update product if image not set
                                    if($_FILES['image']['name'] != "") {
                                        $image = $_FILES['image']['name'];
                                        $target_dir = "../assets/images/products/";
                                        $target_file = $target_dir . basename($image);
                                        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
                                        $updateProductQuery = "UPDATE `products` SET `name`='$name', `regular_price`='$regular_price', `sale_price`='$sale_price', `category_id`='$category_id', `image`='$image' WHERE `id`='$id'";
                                    } else {
                                        // update product without image
                                        $image = $product->image;
                                    }
                                    $updateProductQuery = "UPDATE `products` SET `name`='$name', `regular_price`='$regular_price', `sale_price`='$sale_price', `category_id`='$category_id', `image`='$image' WHERE `id`='$id'";
                                    if($conn->query($updateProductQuery)) {
                                        echo "<div class='alert alert-success'>Product updated successfully</div>";
                                        echo "<script>setTimeout(()=> location.href='./allProducts.php', 2000)</script>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error updating product</div>";
                                    }
                                }
                            }
                        ?>
                            <h2 class="mb-3">Edit Product</h2>
                            <form action="" method="post" enctype="multipart/form-data">
                                <div class="mb-3">
                                    <input type="text" placeholder="Product Name" class="form-control <?= isset($errName) ? "is-invalid":null ?>" name="name" value="<?= $name ?? $product->name ?? null ?>">
                                    <div class="invalid-feedback">
                                        <?= isset($errName) ? $errName : null ?>
                                    </div>
                                </div>
                                <!-- regular_price -->
                                <div class="mb-3">
                                    <input type="text" placeholder="Regular Price" class="form-control <?= isset($errRegular_price) ? "is-invalid":null ?>" name="regular_price" value="<?= $regular_price ?? $product->regular_price ?? null ?>">
                                    <div class="invalid-feedback">
                                        <?= isset($errRegular_price) ? $errRegular_price : null ?>
                                    </div>
                                </div>
                                <!-- sale_price -->
                                <div class="mb-3">
                                    <input type="text" placeholder="Sale Price" class="form-control <?= isset($errSale_price) ? "is-invalid":null ?>" name="sale_price" value="<?= $sale_price ?? $product->sale_price ?? null ?>">
                                    <div class="invalid-feedback">
                                        <?= isset($errSale_price) ? $errSale_price : null ?>
                                    </div>
                                </div>
                                <!-- images -->
                                <div class="mb-3">
                                    <label for="image" class="text-center">
                                        <img src="../assets/images/products/<?= $product->image ?>" alt="<?= $product->name ?>" width="100">
                                        <p>Current Image <br><small class="text-muted">Click to change image</small></p>
                                        <input type="file" class="d-none <?= isset($errImage) ? "is-invalid":null ?>" name="image" id="image">
                                        <div class="invalid-feedback" >
                                            <?= isset($errImage) ? $errImage : null ?>
                                        </div>
                                    </label>
                                </div>
                                <!-- category_id  -->
                                <div class="mb-3">
                                    <select name="category_id" class="form-control <?= isset($errCategory_id) ? "is-invalid":null ?>">
                                        <option value="">Select Category</option>
                                        <?php
                                            $getCatResult = $conn->query("SELECT * FROM product_categories");
                                            while($categories = $getCatResult->fetch_object()){
                                        ?>
                                            <option value="<?= $categories->id ?>" <?= isset($category_id) && $category_id == $categories->id ? "selected" : ($product->category_id == $categories->id ? "selected" : null) ?>><?= $categories->name ?></option>
                                        <?php } ?>
                                    </select>
                                    <div class="invalid-feedback">
                                        <?= isset($errCategory_id) ? $errCategory_id : null ?>
                                    </div>
                                </div>
                                <!-- submit button -->
                                <button type="submit" class="btn btn-primary" name="updateProduct">Update Product</button>
                                <a href="./allProducts.php" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
                            </form>
                        <?php } ?>
                        <?php if(isset($_GET['did'])){ ?>
                            <h2 class="mb-3">Delete Product</h2>
                            <?php
                                $id = $_GET['did'];
                                $getProductQuery = "SELECT * FROM `products` WHERE `id` = $id";
                                $getProductResult = $conn->query($getProductQuery);
                                $product = $getProductResult->fetch_object();
                            ?>
                            <form action="" method="post">
                                <input type="hidden" name="deleteId" value="<?= $product->id ?>">
                                <p>Are you sure you want to delete this product?</p>
                                <button type="submit" class="btn btn-danger" name="deleteProduct">Delete</button>
                                <a href="./allProducts.php" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
                            </form>
                            <?php
                                if(isset($_POST['deleteProduct'])) {
                                    $deleteId = $_POST['deleteId'];
                                    $deleteProductQuery = "DELETE FROM `products` WHERE `id` = $deleteId";
                                    if($conn->query($deleteProductQuery)) {
                                        echo "<div class='alert alert-success'>Product deleted successfully</div>";
                                        echo "<script>setTimeout(()=> location.href='./allProducts.php', 2000)</script>";
                                    } else {
                                        echo "<div class='alert alert-danger'>Error deleting product</div>";
                                    }
                                }
                            ?></div>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script>
        $(document).ready(function() {
            $('#productList').DataTable({
                "lengthMenu": [ 5, 10, 25, 50, 100 ],
            });
        });
    </script>

<?php
    require_once("./footer.php");
?>
