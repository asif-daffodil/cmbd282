<?php
require_once './components/header.php';

if (!isset($_SESSION['iUserInfo'])) {
    header("Location: ./sign-in.php");
    exit();
}

$userId = $_SESSION['iUserInfo']->id;

if (isset($_POST['changePassword'])) {
    $oldPassword = sanitize($_POST['oldPassword']);
    $newPassword = sanitize($_POST['newPassword']);
    $confirmPassword = sanitize($_POST['confirmPassword']);

    if (empty($oldPassword)) {
        $errOldPassword = "Old Password is required";
    } else {
        $crrOldPassword = $conn->real_escape_string($oldPassword);
    }

    if (empty($newPassword)) {
        $errNewPassword = "New Password is required";
    } elseif (!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $newPassword)) {
        $errNewPassword = "Invalid new password";
    } else {
        $crrNewPassword = $conn->real_escape_string($newPassword);
    }

    if (empty($confirmPassword)) {
        $errConfirmPassword = "Confirm Password is required";
    } elseif ($confirmPassword != $newPassword) {
        $errConfirmPassword = "Passwords do not match";
    } else {
        $crrConfirmPassword = $conn->real_escape_string($confirmPassword);
    }

    if (isset($crrOldPassword) && isset($crrNewPassword) && isset($crrConfirmPassword)) {
        // Check old password
        $userInfo = $conn->query("SELECT * FROM `users` WHERE `id` = $userId")->fetch_object();
        if (password_verify($oldPassword, $userInfo->password)) {
            // Update password
            $hashedNewPass = password_hash($crrNewPassword, PASSWORD_BCRYPT);
            if ($conn->query("UPDATE `users` SET `password`='$hashedNewPass' WHERE `id` = $userId")) {
                echo "<script>toastr.success('Password changed successfully');</script>";
            } else {
                echo "<script>toastr.error('Failed to change password');</script>";
            }
        } else {
            echo "<script>toastr.error('Old Password is incorrect');</script>";
        }
    }
}

?>
<div class="container">
    <div class="row">
        <div class="col-md-6 mx-auto my-5 border rounded shadow p-4">
            <h1 class="mb-4">Change Password</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="" class="form-label">Old Password</label>
                    <input type="password" class="form-control <?= isset($errOldPassword) ? "is-invalid" : null ?>"
                        name="oldPassword" value="<?= $oldPassword ?? null ?>">
                    <div class="invalid-feedback">
                        <?= isset($errOldPassword) ? $errOldPassword : null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">New Password</label>
                    <input type="password" class="form-control <?= isset($errNewPassword) ? "is-invalid" : null ?>"
                        name="newPassword" value="<?= $newPassword ?? null ?>">
                    <div class="invalid-feedback">
                        <?= isset($errNewPassword) ? $errNewPassword : null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input type="password" class="form-control <?= isset($errConfirmPassword) ? "is-invalid" : null ?>"
                        name="confirmPassword" value="<?= $confirmPassword ?? null ?>">
                    <div class="invalid-feedback">
                        <?= isset($errConfirmPassword) ? $errConfirmPassword : null ?>
                    </div>
                </div>
                <div class="mb-3">
                    <button type="submit" name="changePassword" class="btn btn-primary">Change Password</button>
                </div>
            </form>
        </div>
    </div>
</div>


<?php
require_once './components/footer.php';
?>