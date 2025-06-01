<?php
    require_once './components/header.php';
    // match the token and give access to change the password
    if(isset($_GET['token'])) {
        $token = $_GET['token'];
        $resetQuery = "SELECT * FROM password_resets WHERE token = '$token' AND expires > " . date("U");
        $resetResult = $conn->query($resetQuery);
        if($resetResult->num_rows > 0){
            // token is valid
            if(isset($_POST['submit'])) {
                $newPassword = $_POST['password'] ?? null;
                if($newPassword != null){
                    // update user password
                    $userEmail = $resetResult->fetch_object()->email;
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    $conn->query("UPDATE users SET password = '$hashedPassword' WHERE email = '$userEmail'");
                    // delete reset token
                    $conn->query("DELETE FROM password_resets WHERE token = '$token'");
                    echo "<script>alert('Password has been reset successfully.');</script>";
                }
            }
        }else{
            echo "<script>alert('Invalid or expired token.');</script>";
        }
    }
?>

<div class="container py-4">
    <h2 class="text-center text-primary my-4">Forget Password</h2>
    <form action="" method="POST">
       <div class="mb-3">
           <label for="password" class="form-label">New Password</label>
           <input type="password" class="form-control" id="password" name="password" required>
       </div>
       <button type="submit" class="btn btn-primary" name="submit">Reset Password</button>
    </form>
</div>

<?php
    require_once './components/footer.php';
?>
