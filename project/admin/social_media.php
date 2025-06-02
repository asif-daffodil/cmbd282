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
                    <h1>Social Media</h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row py-5">
            <div class="col-md-6">
                <h1 class="my-4">Add Social Media</h1>
                <!-- form field name, url and icon -->
                <form action="" method="post">
                    <div class="mb-3">
                        <input type="text" placeholder="Social Media Name"
                            class="form-control <?= isset($errName) ? "is-invalid" : null ?>" name="name"
                            value="<?= isset($name) ? $name : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errName) ? $errName : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Social Media URL"
                            class="form-control <?= isset($errUrl) ? "is-invalid" : null ?>" name="url"
                            value="<?= isset($url) ? $url : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errUrl) ? $errUrl : null ?>
                        </div>
                    </div>
                    <div class="mb-3">
                        <input type="text" placeholder="Social Media Icon Class (e.g., fab fa-facebook-f)"
                            class="form-control <?= isset($errIcon) ? "is-invalid" : null ?>" name="icon"
                            value="<?= isset($icon) ? $icon : null ?>">
                        <div class="invalid-feedback">
                            <?= isset($errIcon) ? $errIcon : null ?>
                        </div>
                    </div>
                    <button type="submit" name="add_social_media" class="btn btn-primary">Add Social Media</button>
                </form>
            </div>
            <div class="col-md-6">

            </div>
        </div>

    </div>
</div>

<script>
    $(document).ready(function () {
        $('#contactTable').DataTable({
            "order": [[3, "desc"]]
        });
    });
</script>

<?php
require_once("./footer.php");
?>
