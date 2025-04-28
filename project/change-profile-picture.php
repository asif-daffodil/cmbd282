<?php
require_once './components/header.php';

if (!isset($_SESSION['iUserInfo'])) {
    header("Location: ./sign-in.php");
    exit();
}

$userId = $_SESSION['iUserInfo']->id;

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto my-5 border rounded shadow p-4">
            <h1 class="mb-4 text-center">Change Profile Picture</h1>
            <form action="" method="post" enctype="multipart/form-data" class="text-center">
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">
                        <img src="<?= $_SESSION['iUserInfo']->picture ?? "./assets/images/profilePictures/pp.jpg" ?>"
                            alt="" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" id="ppimg">
                            <br>
                            <small>Click on the image to change it</small>
                        <input type="file" class="d-none form-control <?= isset($errProfilePicture) ? "is-invalid" : null ?>"
                            name="profile_picture" id="profile_picture" accept="image/*">
                    </label>
                    <div class="invalid-feedback">
                        <?= isset($errProfilePicture) ? $errProfilePicture : null ?>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" name="changeProfilePicture">Change Profile
                    Picture</button>
            </form>
        </div>
    </div>
</div>

<script>
    $("#profile_picture").on("change", () => {
        const file = $("#profile_picture")[0].files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function (e) {
                $("#ppimg").attr("src", e.target.result);
            }
            reader.readAsDataURL(file);
        }
    })
</script>


<?php
require_once './components/footer.php';
?>