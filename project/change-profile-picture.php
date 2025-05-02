<?php
require_once './components/header.php';

if (!isset($_SESSION['iUserInfo'])) {
    header("Location: ./sign-in.php");
    exit();
}

$userId = $_SESSION['iUserInfo']->id;

if(isset($_POST['changeProfilePicture'])) {
    $profilePicture = $_FILES['profile_picture'];

    if(empty($profilePicture['name'])) {
        $errProfilePicture = "Please select a profile picture.";
    }else if ($profilePicture['size'] > 2000000) {
        $errProfilePicture = "File size should be less than 2MB.";
    }else if (!in_array($profilePicture['type'], ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'])) {
        $errProfilePicture = "Invalid file type. Only JPG, JPEG, PNG and GIF are allowed.";
    }else {
        $imageExt = pathinfo($profilePicture['name'], PATHINFO_EXTENSION);
        $newFileName = uniqid() . date("hmsmdy"). rand(1000, 9999). '.' . $imageExt;
        $targetDir = "./assets/images/profilePictures/";
        $targetFile = $targetDir . "/".$newFileName;
        $tempImage = $_FILES['profile_picture']['tmp_name'];

        if (move_uploaded_file($tempImage, $targetFile)) {
            unlink($targetDir . $_SESSION['iUserInfo']->picture);
            $query = "UPDATE users SET picture = '$newFileName' WHERE id = '$userId'";
            $result = mysqli_query($conn, $query);
            if ($result) {
                $_SESSION['iUserInfo']->picture = $newFileName;
                echo "<script>toastr.success('Image upload successfully'); setTimeout(()=>location.href = './change-profile-picture.php', 2000)</script>";
            } else {
                $errProfilePicture = "Failed to update profile picture.";
            }
        } else {
            $errProfilePicture = "Failed to upload image.";
        }

    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto my-5 border rounded shadow p-4">
            <h1 class="mb-4 text-center">Change Profile Picture</h1>
            <form action="" method="post" enctype="multipart/form-data" class="text-center">
                <div class="mb-3">
                    <label for="profile_picture" class="form-label">
                        <img src="<?= isset($_SESSION['iUserInfo']->picture) ? "./assets/images/profilePictures/".$_SESSION['iUserInfo']->picture : "./assets/images/profilePictures/pp.jpg" ?>"
                            alt="" class="img-fluid rounded-circle" style="width: 200px; height: 200px; object-fit: cover;" id="ppimg">
                            <br>
                            <small>Click on the image to change it</small>
                        <input type="file" class="d-none form-control <?= isset($errProfilePicture) ? "is-invalid" : null ?>"
                            name="profile_picture" id="profile_picture" accept="image/*">
                            <div class="invalid-feedback">
                                <?= isset($errProfilePicture) ? $errProfilePicture : null ?>
                            </div>
                    </label>
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