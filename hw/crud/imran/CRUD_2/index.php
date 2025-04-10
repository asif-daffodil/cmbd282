<?php
require_once('header.php');
$sql = "SELECT * FROM usercheck";
$result = mysqli_query($conn, $sql);
// $SerialNumber = 1;
// $userData = $result->fetch_all(MYSQLI_ASSOC);

// if (isset($_GET['page'])) {
//     $page = $_GET['page'];
// } else {
//     header("Location: index.php?page=1");
// }
// or
isset($_GET['page']) ? $page = $_GET['page'] : header("location: index.php?page=1");
$totalUserList = mysqli_num_rows($result);
$limit = 5;
$totalPage = ceil($totalUserList / $limit);
$SerialNumber = ($page - 1) * $limit;
$sql = "SELECT * FROM usercheck ORDER BY `id` DESC LIMIT $SerialNumber,$limit";
$result = mysqli_query($conn, $sql);
$userData = mysqli_fetch_all($result, MYSQLI_ASSOC);
$SerialNumber = $SerialNumber + 1;

?>


<div class="container" style="min-height: 90vh; ">
    <?php
    if (count($userData) > 0) {
    ?>

    <h1 class="mt-5 text-center text-white py-3 bg-secondary display-3 text-decoration-underline ">All
        User Input Data</h1>



    <div class="row">
        <div class="col-md-12  border border-dark shadow py-3">


            <table class="table table-striped table-hover table-bordered">

                <tr>
                    <td class="bg-dark text-white h4">S.Number</td>
                    <td class="bg-dark text-white h4">Name</td>
                    <td class="bg-dark text-white h4">Details</td>
                </tr>

                <?php
                    foreach ($userData as $data) {
                    ?>
                <tr class="align-middle">
                    <td><?= $SerialNumber++ ?></td>
                    <td><?= $data['userName'] ?></td>

                    <td>

                        <a href="editUser.php?id=<?= $data['id'] ?>" class="btn btn-success btn-sm">Edit</a>
                        <a href="delete.php?id=<?= $data['id'] ?>" class="btn btn-danger btn-sm">Delete</a>
                    </td>
                </tr>
                <?php
                    }
                    ?>

            </table>

            <!-- pagination  -->
            <nav aria-label="...">
                <ul class="pagination">
                    <li class="page-item <?php echo $page == 1 ? 'disabled' : null ?>">
                        <a class="page-link" href="./?page=<?= $page - 1 ?>">Previous</a>
                    </li>
                    <?php for ($i = 1; $i <= $totalPage; $i++) { ?>
                    <li class="page-item <?php echo $page == $i ? 'active' : null ?> "><a class="page-link"
                            href="./?page=<?= $i ?>"><?php echo $i ?></a></li>
                    <?php } ?>
                    <li class="page-item <?php echo $page == $totalPage ? 'disabled' : null ?>">
                        <a class="page-link" href="./?page=<?= $page + 1 ?>">Next</a>
                    </li>
                </ul>
            </nav>


        </div>


    </div>

    <?php } else { ?>
    <div class="row d-flex justify-content-center align-items-center" style="min-height: 90vh;">
        <h1 class="text-center text-white p-5 bg-danger inline-block "
            style="width: max-content; border-top-right-radius: 40px; border-bottom-left-radius: 40px;">
            No Data Found
        </h1>
    </div>
    <?php } ?>
</div>

<?php
require_once('footer.php');
?>