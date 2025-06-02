<?php
require_once("./header.php");
require_once("./sidebar.php");

if (isset($_POST['add_social_media'])) {
    $name = sanitize($_POST['name']);
    $url = sanitize($_POST['url']);
    $icon = sanitize($_POST['icon']);

    if (empty($name)) {
        $errName = "Please enter the social media name.";
    } elseif (!preg_match("/^[A-Za-z.\- ]*$/", $name)) {
        $errName = "Invalid Name";
    } else {
        $crrName = $name;
    }

    if (empty($url)) {
        $errUrl = "Please enter the social media URL.";
    } elseif (!filter_var($url, FILTER_VALIDATE_URL)) {
        $errUrl = "Invalid URL";
    } else {
        $crrUrl = $url;
    }

    if (empty($icon)) {
        $errIcon = "Please enter the social media icon class.";
    } else {
        $crrIcon = $icon;
    }

    if (isset($crrName) && isset($crrUrl) && isset($crrIcon)) {
        // Insert into database
        $sql = "INSERT INTO `social_media` (`name`, `url`, `icon`) VALUES ('$crrName', '$crrUrl', '$crrIcon')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('Social Media added successfully!');</script>";
        } else {
            echo "<script>toastr.error('Failed to add Social Media. Please try again later.');</script>";
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
                    <h1>Hero Section</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <!-- form field title, sub-title, fb_url, x_url, insta_url, in_url, tube_url, banner_img -->
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="mb-3">
                        <input type="text" placeholder="Title" class="form-control <?= isset($errName) ? "is-invalid":null ?>" name="title" value="<?= isset($title) ? $title : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errName) ? $errName : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Sub Title" class="form-control <?= isset($errUrl) ? "is-invalid":null ?>" name="sub_title" value="<?= isset($sub_title) ? $sub_title : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errUrl) ? $errUrl : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Facebook URL" class="form-control <?= isset($errIcon) ? "is-invalid":null ?>" name="fb_url" value="<?= isset($fb_url) ? $fb_url : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errIcon) ? $errIcon : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="X URL" class="form-control <?= isset($errIcon) ? "is-invalid":null ?>" name="x_url" value="<?= isset($x_url) ? $x_url : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errIcon) ? $errIcon : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Instagram URL" class="form-control <?= isset($errIcon) ? "is-invalid":null ?>" name="insta_url" value="<?= isset($insta_url) ? $insta_url : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errIcon) ? $errIcon : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="LinkedIn URL" class="form-control <?= isset($errIcon) ? "is-invalid":null ?>" name="in_url" value="<?= isset($in_url)
                            ? $in_url : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errIcon) ? $errIcon : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="YouTube URL" class="form-control <?= isset($errIcon) ? "is-invalid":null ?>" name="tube_url" value="<?= isset($tube_url) ? $tube_url : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errIcon) ? $errIcon : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="file" placeholder="Banner Image" class="form-control <?= isset($errImage) ? "is-invalid":null ?>" name="banner_img">
                        <div class="invalid-feedback">
                            <?= isset($errImage) ? $errImage : null ?>
                        </div>
                    </div>
                    <button type="submit" name="add_hero" class="btn btn-primary">Add Hero Section</button>
                </form>
                </div>
            </div>
        </div>
    </div>



<?php
require_once("./footer.php");
?>
