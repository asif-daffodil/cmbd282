<?php  
    require_once './components/header.php';
    if(isset($_SESSION['iUserInfo'])){
        header("Location: ./");
        exit();
    }
    // set cookie tryCount = 0
    if(!isset($_COOKIE['tryCount'])){
        setcookie('tryCount', 0, time() + 60 * 15, "/");
    }
    if(isset($_POST['signin123'])){
        if($_COOKIE['tryCount'] >= 3){
            echo "<script>toastr.error('You have exceeded the maximum number of attempts. Please try again later.')</script>";
        }else{
            $email = sanitize($_POST['email']);
            $password = sanitize($_POST['password']);
    
            if(empty($email)){
                $errEmail = "Please write your email";
            }elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errEmail = "Invalid Email";
            }else{
                $crrEmail = $email;
            }
    
            if(empty($password)){
                $errPassword = "Please write your password";
            }else{
                $crrPassword = $password;
            }
    
            if(isset($crrEmail) && isset($crrPassword)){
                $sql = "SELECT * FROM `users` WHERE `email` = '$crrEmail'";
                $checkEmail = $conn->query($sql);
                if($checkEmail->num_rows != 1){
                    echo "<script>toastr.error('Email not found')</script>";
                    setcookie('tryCount', $_COOKIE['tryCount'] + 1, time() + 60 * 15, "/");
                }else{
                    $row = $checkEmail->fetch_object();
                    if(!password_verify($crrPassword, $row->password)){
                        echo "<script>toastr.error('Password does not match')</script>";
                        setcookie('tryCount', $_COOKIE['tryCount'] + 1, time() + 60 * 15, "/");
                    }else{
                        $_SESSION['iUserInfo'] = $row;
                        echo "
                            <script>
                            toastr.success('Sign in successfully');
                            setTimeout(() => {
                                window.location.href = './';
                            }, 2000);
                            </script>";
                    }
                }
            }
        }

    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5 border rounded p-4 shadow">
                <h2 class="mb-3">Sign In</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" id="password">
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" id="showPass" name="remember" class="form-check-input">
                        <label for="remember" class="form-check-label">Show Password</label>
                    </div>
                    <button type="submit" class="btn btn-primary" name="signin123">Sign In</button>
                    <p class="mt-3">Don't have an account? <a href="./sign-up.php">Sign Up</a></p>
                    <!-- forget password -->
                    <p class="mt-3"><a href="./forget-password.php">Forget Password?</a></p>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('showPass').addEventListener('click', function() {
            const passwordField = document.getElementById('password');
            if (this.checked) {
                passwordField.type = 'text';
            } else {
                passwordField.type = 'password';
            }
        });
    </script>
<?php  
    require_once './components/footer.php';
?>
    