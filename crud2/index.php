<?php
require_once 'header.php';
$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);
isset($_GET['page']) ? $page = $_GET['page'] : header("location: ./?page=1");
$totalData = mysqli_num_rows($result);
$limit = 5;
$totalPage = ceil($totalData / $limit);
$offset = ($page - 1) * $limit;
$sql = "SELECT * FROM users LIMIT $offset, $limit";
$result = mysqli_query($conn, $sql);
$userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
$sn = $offset + 1;
?>
<div class="container">
    <div class="row">
        <div class="col-md-12 my-5">
            <?php
            if (count($userData) > 0) {
                ?>
                <table class="table table-striped table-dark table-hover">
                    <tr>
                        <td>S.N</td>
                        <td>Name</td>
                        <td>Action</td>
                    </tr>
                    <?php
                    foreach ($userData as $user) {
                        ?>
                        <tr>
                            <td><?= $sn++ ?></td>
                            <td><?= $user['name'] ?></td>
                            <td>
                                <a href="edit-user.php?id=<?= $user['id'] ?>" class="btn btn-primary btn-sm">Edit</a>
                                <a href="delete-user.php?id=<?= $user['id'] ?>" class="btn btn-success btn-sm">Delete</a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>
                </table>
                <nav aria-label="...">
                    <ul class="pagination">
                        <li class="page-item <?= $page == 1 ? "disabled":null ?>">
                            <a class="page-link" href="./?page=<?= $page - 1 ?>">Previous</a>
                        </li>
                        <?php for($i = 1; $i <= $totalPage; $i++ ){ ?>
                        <li class="page-item <?= $i == $page ? "active":null ?>"><a class="page-link" href="./?page=<?= $i; ?>"><?= $i ?></a></li>
                        <?php } ?>
                        <li class="page-item <?= $page == $totalPage ? "disabled":null ?>">
                            <a class="page-link" href="./?page=<?= $page + 1 ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            <?php } else { ?>
                <div class="alert alert-danger">No data found</div>
            <?php } ?>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>