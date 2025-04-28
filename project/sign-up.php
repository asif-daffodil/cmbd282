<?php  
    require_once './components/header.php';
    if(isset($_SESSION['iUserInfo'])){
        header("Location: ./");
        exit();
    }

    if(isset($_POST['signup123'])) {
        $name = sanitize($_POST['name']);
        $email = sanitize($_POST['email']);
        $password = sanitize($_POST['password']);
        $confirm_password = sanitize($_POST['confirm_password']);

        if(empty($name)){
            $errName = "Please write your name";
        }elseif(!preg_match("/^[A-Za-z.\- ]*$/", $name)){
            $errName = "Invalid Name";
        }else{
            $crrName = $name;
        }

        if(empty($email)){
            $errEmail = "Please write your email";
        }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
            $errEmail = "Invalid Email";
        }else{
            $sql = "SELECT * FROM `users` WHERE `email` = '$email'";
            $checkEmail = $conn->query($sql);
            if($checkEmail->num_rows == 1){
                $errEmail = "Email already exists";
            }else{
                $crrEmail = $email;
            }
        }

        if(empty($password)){
            $errPassword = "Please write your password";
        }elseif(!preg_match('/(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$/', $password)){
            $errPassword = "Password must be at least 8 characters";
        }else{
            $crrPassword = $password;
        }

        if(empty($confirm_password)){
            $errConfirmPassword = "Please confirm your password";
        }elseif($confirm_password != $password){
            $errConfirmPassword = "Password does not match";
        }else{
            $crrConfirmPassword = $confirm_password;
        }

        if( isset($crrName) && isset($crrEmail) && isset($crrPassword) && isset($crrConfirmPassword)){
            $crrPassword = password_hash($crrPassword, PASSWORD_BCRYPT);
            $sql = "INSERT INTO users (`name`, `email`, `password`) VALUES ('$crrName', '$crrEmail', '$crrPassword')";
            if(mysqli_query($conn, $sql)){
                echo "
                        <script>
                        toastr.success('Sign up successfully');
                        setTimeout(() => {
                            window.location.href = './sign-in.php';
                        }, 2000);
                        </script>";
            }else{
                echo "<script>toastr.error('Sign up failed')</script>";
            }
        }


    }
?>
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5 border rounded p-4 shadow">
                <h2 class="mb-3">Sign Up</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control <?= isset($errName) ? "is-invalid":null ?>" id="name" name="name" value="<?= $name ?? null ?>">
                        <div class="invalid-feedback"><?= $errName ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="text" class="form-control <?= isset($errEmail) ? "is-invalid":null ?>" id="email" name="email" value="<?= $email ?? null ?>">
                        <div class="invalid-feedback"><?= $errEmail ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control <?= isset($errPassword) ? "is-invalid":null ?>" id="password" name="password" value="<?= $password ?? null ?>">
                        <div class="invalid-feedback"><?= $errPassword ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control <?= isset($errConfirmPassword) ? "is-invalid":null ?>" id="confirm_password" name="confirm_password" value="<?= $password ?? null ?>">
                        <div class="invalid-feedback"><?= $errConfirmPassword ?? null ?></div>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" class="form-check-input" id="showpass">
                        <label for="showpass" class="form-check-label">Show Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="signup123">Sign Up</button>
                    <p class="mt-3">
                        Already have an account? <a href="./sign-in.php">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
    <script>
        const showpass = document.getElementById('showpass');
        const password = document.getElementById('password');
        const confirm_password = document.getElementById('confirm_password');

        showpass.addEventListener('click', function() {
            if (showpass.checked) {
                password.setAttribute('type', 'text');
                confirm_password.setAttribute('type', 'text');
            } else {
                password.setAttribute('type', 'password');
                confirm_password.setAttribute('type', 'password');
            }
        });
    </script>
<?php  
    require_once './components/footer.php';
?>
    