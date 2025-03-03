<?php
require_once 'header.php';
isset($_GET['id']) ? $id = $_GET['id'] : header("location: ./");
$sql = "SELECT * FROM users WHERE id = $id";
$result = mysqli_query($conn, $sql);
mysqli_num_rows($result) > 0 ? $user = mysqli_fetch_assoc($result) : header("location: ./");

if (isset($_POST['deleteUser'])) {
    $id = $_POST['id'];

    if (empty($id)) {
        echo "<script>toastr.error('Failed to delete user')</script>";
        // redirect to home  after 2 seconds
        header("refresh:2;url=./");
    } else {
        $id = senitize($id);
        $sql = "DELETE FROM users WHERE id = $id";
        if (mysqli_query($conn, $sql)) {
            echo "<script>toastr.success('User deleted successfully');setTimeout(() => {window.history.back();}, 2000);
</script>";
        } else {
            echo "<script>toastr.error('Failed to delete user')</script>";
            // redirect to home  after 2 seconds
            header("refresh:2;url=./");
        }
    }
}

?>
<div class="container">
    <div class="row py-5">
        <div class="col-md-5 mx-auto border rounded shadow p-5">
            <h2 class="mb-4">Do you realy want to delete the user</h2>
            <form action="" method="post" class="d-inline me-2">
                <input type="hidden" name="id" value="<?= $user['id'] ?>">
                <button type="submit" class="btn btn-danger btn-sm" name="deleteUser">Yes</button>
            </form>
            <a href="./" class="btn btn-sm btn-success">No</a>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>