<?php
require_once('header.php');






if (isset($_POST['addUser'])) {
    $name = ($_POST['name']);

    if (empty($name)) {
        $errorName = "Please Enter User Name";
    } else {
        $correctName = senitize($name);
        $sql = "INSERT INTO usercheck(userName) VALUES('$correctName')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('User Added Successfully')</script>";
        } else {
            echo "<script>toastr.error('User Added Failed')</script>";
        }
    }
}
?>


<div class="container">

    <div class="row">
        <div class="col-md-5 m-auto my-5 border shadow py-3">
            <h1 class="text-center mb-4 ">Add Users Form</h1>
            <form action="" method="post">
                <div class="mb-3">
                    <label for="name" class="form-label">User Name</label>
                    <input type="text" name="name" id="name"
                        class="form-control <?= isset($errorName) ? "is-invalid" : null ?>">
                    <div class="invalid-feedback">Please Enter User Name</div>
                </div>
                <button type="submit" class="btn btn-primary" name="addUser">Add User</button>
            </form>

        </div>
    </div>
</div>


<?php
require_once('footer.php');
?>