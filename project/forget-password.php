<?php
    require_once './components/header.php';

    if(isset($_POST['submit'])) {
        $email = $_POST['email'] ?? null;
        if($email != null){
            // check if email exists
            $userQuery = "SELECT * FROM users WHERE email = '$email'";
            $userResult = $conn->query($userQuery);
            if($userResult->num_rows > 0){
                // generate reset token
                $token = bin2hex(random_bytes(50));
                $expires = date("U") + 1800; // 30 minutes
                $conn->query("INSERT INTO password_resets (email, token, expires) VALUES ('$email', '$token', '$expires')");
                // send email
                $resetLink = "http://yourwebsite.com/reset-password.php?token=$token";
                mail($email, "Password Reset", "Click here to reset your password: $resetLink");
                echo "<script>alert('Password reset link has been sent to your email.');</script>";
            }else{
                echo "<script>alert('Email not found.');</script>";
            }
        }
    }
?>

<div class="container py-5">
    <div class="row">
        <div class="col-md-6 mx-auto border rounded shadow p-4">
            <h2 class="text-primary my-4">Forget Password</h2>
    <form action="" method="POST">
        <div class="mb-3">
            <label for="email" class="form-label">Email address</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Send Reset Link</button>
    </form>
        </div>
    </div>
</div>

<?php
    require_once './components/footer.php';
?>