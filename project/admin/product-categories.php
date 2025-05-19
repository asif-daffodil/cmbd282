<?php
    require_once("./header.php");
    require_once("./sidebar.php");
    if(isset($_POST['addCat'])) {
        $name = sanitize($_POST['name']);

        // validation
        if(empty($name)) {
            $errUpName = "Please enter a category name";
        }else{
            $sql = "SELECT * FROM `product_categories` WHERE `name` = '$name'";
            if($conn->query($sql)->num_rows > 0) {
                $errUpName = "Category already exists";
            }else{
                $sql = "INSERT INTO `product_categories` (`name`) VALUES ('$name')";
                if($conn->query($sql) === TRUE) {
                    echo "<script>toastr.success('Category added successfully')</script>";
                }
            }
        }
    }

    if(isset($_POST['upCat'])){
        $upCatId = $_POST['upCatId'];
        $oldCatName = $_POST['oldCatName'];
        $name = sanitize($_POST['name']);

        // validation
        if(empty($name)) {
            $errName = "Please enter a category name";
        }else{
            if($oldCatName == $name) {
                echo "<script>toastr.info('No changes made')</script>";
            }else{
                $sql = "SELECT * FROM `product_categories` WHERE `name` = '$name'";
                if($conn->query($sql)->num_rows > 0) {
                    $errName = "Category already exists";
                }else{
                    $sql = "UPDATE `product_categories` SET `name` = '$name' WHERE `id` = '$upCatId'";
                    if($conn->query($sql) === TRUE) {
                        echo "<script>toastr.success('Category updated successfully');setTimeout(()=> location.href='./product-categories.php', 2000)</script>";
                    }
                }
            }
        }
    }

    if(isset($_POST['delCat'])) {
        $catId = $_POST['catId'];
        $sql = "DELETE FROM `product_categories` WHERE `id` = '$catId'";
        if($conn->query($sql) === TRUE) {
            echo "<script>toastr.success('Category deleted successfully');setTimeout(()=> location.href='./product-categories.php', 2000)</script>";
        }
    }

    $getCatQuery = "SELECT * FROM `product_categories` ORDER BY `id` DESC";
    $getCatResult = $conn->query($getCatQuery);
    if($getCatResult->num_rows > 0) {
        $categories = $getCatResult->fetch_object();
    }
?>

    <div id="right-panel" class="right-panel">

    <?php require_once('./topBar.php') ?>

        <div class="breadcrumbs">
            <div class="col-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Categories</h1>
                    </div>
                </div>
            </div>
        </div>

        <?php if(!isset($_GET['did'])){ ?>
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <?php if(!isset($categories)){ ?>
                        <h2 class="mb-3">No Categories Found</h2>
                    <?php }else{ ?>
                        <h2 class="mb-3">Categories</h2>
                        <table class="table table-striped" id="catList">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Category Name</th>
                                    <th scope="col">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    $i = 1;
                                    do {
                                ?>
                                        <tr>
                                            <th scope="row"><?= $i++ ?></th>
                                            <td><?= $categories->name ?></td>
                                            <td>
                                                <a href="./product-categories.php?eid=<?= $categories->id ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-pen-to-square"></i></a>
                                                <a href="./product-categories.php?did=<?= $categories->id ?>" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i></a>
                                            </td>
                                        </tr>
                                <?php
                                    } while($categories = $getCatResult->fetch_object());
                                ?>
                            </tbody>
                        </table>
                    <?php } ?>
                </div>
                <div class="col-md-6">
                    <h2 class="mb-3">Add New Category</h2>
                    <form action="" method="post">
                        <div class="mb-3">
                            <input type="text" placeholder="Category Name" class="form-control <?= isset($errName) ? "is-invalid":null ?>" name="name">
                            <div class="invalid-feedback">
                                <?= $errName ?? null ?>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary" name="addCat">Add Category</button>
                    </form>

                    <?php if(isset($_GET['eid'])){ ?>
                        <h2 class="my-3">Edit Category</h2>
                        <?php
                            $catId = $_GET['eid'];
                            $getCatQuery = "SELECT * FROM `product_categories` WHERE `id` = '$catId'";
                            $getCatResult = $conn->query($getCatQuery);
                            if($getCatResult->num_rows > 0) {
                                $category = $getCatResult->fetch_object();
                            }
                        ?>

                        <?php
                            if(isset($category)){
                        ?>
                        <form action="" method="post">
                            <input type="hidden" name="upCatId" value="<?= $category->id ?>">
                            <input type="hidden" name="oldCatName" value="<?= $category->name ?>">
                            <div class="mb-3">
                                <input type="text" placeholder="Category Name" class="form-control <?= isset($errUpName) ? "is-invalid":null ?>" name="name" value="<?= $category->name ?>">
                                <div class="invalid-feedback">
                                    <?= $errUpName ?? null ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary" name="upCat">Update Category</button>
                            <a href="./product-categories.php" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
                        </form>
                        <?php }else{ ?>
                            <h2 class="mb-3">No Category Found</h2>
                        <?php } ?>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php }else{ ?>
            <div class="container">
                <div class="row">
                    <div class="col-md-12 h1 text-danger">
                        Do you really want to delete the category?
                        <form action="" method="post">
                            <input type="hidden" name="catId" value="<?= $_GET['did'] ?>">
                            <button type="submit" class="btn btn-danger" name="delCat">Delete</button>
                            <a href="./product-categories.php" class="btn btn-success"><i class="fa-solid fa-arrow-left"></i> Cancel</a>
                        </form>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script>
        $("#catList").DataTable({
            "lengthMenu": [5, 10, 25, 50, 100],
            "pageLength": 5,
        });
    </script>

<?php
    require_once("./footer.php");
?>
