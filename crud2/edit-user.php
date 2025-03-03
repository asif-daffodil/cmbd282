<?php  
require_once 'header.php';
isset($_GET['id']) ? $id = $_GET['id'] : header("location: ./");
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
mysqli_num_rows($result) > 0 ? $user = mysqli_fetch_assoc($result) : header("location: ./");

if(isset($_POST['updateUser'])){
    $name = $_POST['name'];

    if(empty($name)){
        $errName = "Please enter a name";
    }else{
        $crrName = senitize($name);
        $sql = "UPDATE users SET name = '$crrName' WHERE id = $id";
        if(mysqli_query($conn, $sql)){
            echo "<script>toastr.success('User updated successfully')</script>";
        }else{
            echo "<script>toastr.error('Failed to update user')</script>";
        }
    }
}

?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-5 mx-auto border rounded shadow p-5">
            <h2 class="mb-4">Update User</h2>
            <form action="" method="post">
                <div class="mb-3">
                    <input type="text" placeholder="User Name" name="name" class="form-control <?= isset($errName) ? "is-invalid":null ?> " value="<?= $name ?? $user['name'] ?? null ?>">
                    <div class="invalid-feedback"><?= $errName ?? null ?></div>
                </div>
                <button type="submit" class="btn btn-dark" name="updateUser">Update User</button>
            </form>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>