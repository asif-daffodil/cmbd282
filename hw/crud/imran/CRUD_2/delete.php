<?php
require_once('header.php');

isset($_GET['id']) ? $id = $_GET['id'] : header("location: ./");
$sql = "SELECT * FROM usercheck WHERE id=$id";
$result = mysqli_query($conn, $sql);
mysqli_num_rows($result) > 0 ? $userData = mysqli_fetch_assoc($result) : header("location: ./");

if (isset($_POST['deleteUser'])) {
    $name = ($_POST['id']);
    if (empty($id)) {
        echo "<script>toastr.error('User Deleted Failed')</script>";

        // redirect to index(home) page after 2 seconds
        header("refresh:2;url=./");
    } else {
        $id = senitize($id);
        $sql = "DELETE FROM usercheck WHERE id=$id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('User Deleted Successfully')</script>";
            // redirect to index(home) page after 2 seconds
            header("refresh:2;url=./");
        } else {
            echo "<script>toastr.error('User Deleted Failed')</script>";
            // redirect to index(home) page after 2 seconds
            header("refresh:2;url=./");
        }
    }
}

?>


<div class="container py-3">

    <div class="row py-3">
        <div class="col-md-5 m-auto my-5  shadow py-3 "
            style="border: 2px double purple ; border-top-left-radius: 40px; border-bottom-right-radius: 40px">
            <h2 class="text-center text-primary mb-5">Do You Want to Delete This User</h2>
            <form action="" method="post" class="d-inline me-3">
                <input type="hidden" name="id" value="<?= $userData['id'] ?>">
                <button type="submit" class="btn btn-danger btn-sm" name="deleteUser">Yes</button>
            </form>
            <a href="./" class="btn btn-success btn-sm">No</a>
        </div>
    </div>
</div>

<?php
require_once('footer.php');
?>