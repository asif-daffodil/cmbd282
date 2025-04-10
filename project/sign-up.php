<?php  
    require_once './components/header.php';
?>
<div class="container">
        <div class="row">
            <div class="col-md-5 mx-auto my-5 border rounded p-4 shadow">
                <h2 class="mb-3">Sign Up</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">Full Name</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email address</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign Up</button>
                    <p class="mt-3">
                        Already have an account? <a href="./sign-in.php">Sign In</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
<?php  
    require_once './components/footer.php';
?>
    