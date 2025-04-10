<?php
require_once('header.php');

isset($_GET['id']) ? $id = $_GET['id'] : header("location: ./");
$sql = "SELECT * FROM usercheck WHERE id=$id";
$result = mysqli_query($conn, $sql);
mysqli_num_rows($result) > 0 ? $userData = mysqli_fetch_assoc($result) : header("location: ./");

if (isset($_POST['updateUser'])) {
    $name = ($_POST['name']);
    if (empty($name)) {
        $errorName = "Please Enter User Name";
    } else {
        $correctName = senitize($name);
        $sql = "UPDATE usercheck SET userName='$correctName' WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('User Updated Successfully')</script>";
        } else {
            echo "<script>toastr.error('User Updated Failed')</script>";
        }
    }
}







?>


<div class="container py-3">

    <div class="row py-3">
        <div class="col-md-5 m-auto my-5 border shadow py-3">
            <h2 class="text-center text-decoration-underline text-primary">Update Your New User</h2>
            <form action="" method="post">
                <div class="mb-2">
                    <input type="text" placeholder="Enter Your New User Name" name="name" class="form-control mt-5
                        <?= isset($errorName) ? "is-invalid" : null ?>"
                        value="<?= $name ?? $userData['userName'] ?? null ?>">
                    <div class="invalid-feedback"><?= $errorName ?? null ?></div>

                </div>
                <button type="submit" class="btn btn-primary mb-3" name="updateUser">Update User</button>
            </form>
        </div>


    </div>
</div>

<?php
require_once('footer.php');
?>