<?php  
    require_once './components/header.php';
?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5 border rounded p-4 shadow">
                <h2 class="mb-3">Sign In</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                    <p class="mt-3">Don't have an account? <a href="./sign-up.php">Sign Up</a></p>
                </form>
            </div>
        </div>
    </div>
<?php  
    require_once './components/footer.php';
?>
    