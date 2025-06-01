<?php
    require_once("./header.php");
    require_once("./sidebar.php");

    if (isset($_POST['addProduct'])) {
        $name = sanitize($_POST['name']);
        $regular_price = sanitize($_POST['regular_price']);
        $sale_price = sanitize($_POST['sale_price']);
        $category_id = sanitize($_POST['category_id']);
        $image = $_FILES['image'];
        $imageName = $image['name'];
        $imageTmpName = $image['tmp_name'];
        $imageSize = $image['size'];
        $imageError = $image['error'];
        $imageType = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif', 'webp'];
        $uploadDir = '../assets/images/products/';
        $uploadFile = $uploadDir . basename($imageName);
        $uploadFileName = uniqid('', true) . '.' . $imageType;
        $uploadFilePath = $uploadDir . $uploadFileName;
        $description = isset($_POST['description']) ? sanitize($_POST['description']) : '';

        // validation
        if (empty($name)) {
            $errName = "Please enter a product name";
        }else{
            $crrName = $conn->real_escape_string($name);
        }

        if (empty($regular_price)) {
            $errRegular_price = "Please enter a regular price";
        }else{
            $crrRegular_price = $conn->real_escape_string($regular_price);
        }

        if (empty($sale_price)) {
            $errSale_price = "Please enter a sale price";
        }else{
            $crrSale_price = $conn->real_escape_string($sale_price);
        }

        if (empty($category_id)) {
            $errCategory_id = "Please select a category";
        }else{
            $crrCategory_id = $conn->real_escape_string($category_id);
        }

        if (empty($imageName)) {
            $errImage = "Please upload an image";
        } elseif (!in_array($imageType, $allowedTypes)) {
            $errImage = "Invalid image type. Only JPG, JPEG, PNG, and GIF are allowed.";
        } elseif ($imageError !== 0) {
            $errImage = "Error uploading the image.";
        } elseif ($imageSize > 2000000) { // 2MB
            $errImage = "Image size exceeds 2MB.";
        }else{
            $crrImage = $conn->real_escape_string($uploadFileName);
            if (move_uploaded_file($imageTmpName, $uploadFilePath)) {
                // Insert product into database
                $sql = "INSERT INTO `products` (`name`, `regular_price`, `sale_price`, `category_id`, `image`, `description`) VALUES ('$crrName', '$crrRegular_price', '$crrSale_price', '$crrCategory_id', '$crrImage', '$description')";
                if ($conn->query($sql) === TRUE) {
                    echo "<script>toastr.success('Product added successfully');setTimeout(()=> location.href='./addNewProduct.php', 2000)</script>";
                } else {
                    echo "<script>toastr.error('Error adding product');</script>";
                }
            } else {
                $errImage = "Error moving the uploaded file.";
            }

        }
    }
?>

    <div id="right-panel" class="right-panel">

        <?php require_once('./topBar.php') ?>

        <div class="breadcrumbs">
            <div class="col-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Add new product</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="mb-3">
                            <input type="text" placeholder="Product Name" class="form-control <?= isset($errName) ? "is-invalid":null ?>" name="name" value="<?= isset($name) ? $name : null ?>">
                            <div class="invalid-feedback">
                                <?= isset($errName) ? $errName : null ?>
                            </div>
                        </div>
                        <!-- regular_price -->
                        <div class="mb-3">
                            <input type="text" placeholder="Regular Price" class="form-control <?= isset($errRegular_price) ? "is-invalid":null ?>" name="regular_price" value="<?= isset($regular_price) ? $regular_price : null ?>">
                            <div class="invalid-feedback">
                                <?= isset($errRegular_price) ? $errRegular_price : null ?>
                            </div>
                        </div>
                        <!-- sale_price -->
                        <div class="mb-3">
                            <input type="text" placeholder="Sale Price" class="form-control <?= isset($errSale_price) ? "is-invalid":null ?>" name="sale_price" value="<?= isset($sale_price) ? $sale_price : null ?>">
                            <div class="invalid-feedback">
                                <?= isset($errSale_price) ? $errSale_price : null ?>
                            </div>
                        </div>
                        <!-- images -->
                        <div class="mb-3">
                            <input type="file" placeholder="Product Image" class="form-control <?= isset($errImage) ? "is-invalid":null ?>" name="image">
                            <div class="invalid-feedback">
                                <?= isset($errImage) ? $errImage : null ?>
                            </div>
                        </div>
                        <!-- category_id  -->
                        <div class="mb-3">
                            <select name="category_id" class="form-control <?= isset($errCategory_id) ? "is-invalid":null ?>">
                                <option value="">Select Category</option>
                                <?php
                                    $getCatResult = $conn->query("SELECT * FROM product_categories");
                                    while($categories = $getCatResult->fetch_object()){
                                ?>
                                    <option value="<?= $categories->id ?>" <?= isset($category_id) && $category_id == $categories->id ? "selected" : null ?>><?= $categories->name ?></option>
                                <?php } ?>
                            </select>
                            <div class="invalid-feedback">
                                <?= isset($errCategory_id) ? $errCategory_id : null ?>
                            </div>
                        </div>

                        <!-- description -->
                        <div class="mb-3">
                            <textarea name="description" class="form-control <?= isset($errDescription) ? "is-invalid":null ?>" placeholder="Product Description"><?= isset($description) ? $description : null ?></textarea>
                            <div class="invalid-feedback">
                                <?= isset($errDescription) ? $errDescription : null ?>
                            </div>
                        </div>
                        <!-- submit button -->
                        <button type="submit" class="btn btn-primary" name="addProduct">Add Product</button>
                    </form>
                </div>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

<?php
    require_once("./footer.php");
?>
