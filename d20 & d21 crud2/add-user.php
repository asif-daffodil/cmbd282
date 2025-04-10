<?php  
    require_once 'header.php';

    if(isset($_POST['addUser'])){
        $name = $_POST['name'];

        if(empty($name)){
            $errName = "Please enter a name";
        }else{
            $crrName = senitize($name);
            $sql = "INSERT INTO users(name) VALUES('$crrName')";
            if(mysqli_query($conn, $sql)){
                echo "<script>toastr.success('User added successfully')</script>";
            }else{
                echo "<script>toastr.error('Failed to add user')</script>";
            }
        }
    }
?>
    <div class="container">
        <div class="row">
            <div class="col-md-5 m-auto my-5 border shadow p-4">
                <h2 class="mb-4">Add User</h2>
                <form action="" method="post">
                    <div class="mb-3">
                        <label for="name" class="form-label">User naame</label>
                        <input type="text" name="name" id="name" class="form-control <?= isset($errName) ? "is-invalid":null ?>">
                        <div class="invalid-feedback"><?= $errName ?? null ?></div>
                    </div>
                    <button type="submit" class="btn btn-dark" name="addUser">Add user</button>
                </form>
            </div>
        </div>
    </div>
<?php 
    require_once 'footer.php';
?>
    