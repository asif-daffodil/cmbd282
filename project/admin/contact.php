<?php
    require_once("./header.php");
    require_once("./sidebar.php");

    $sql = "SELECT * FROM `contact`";
    $result = $conn->query($sql);
    if ($result->num_rows == 0) {
        echo "<script>toastr.info('No contact messages found.');</script>";
    }
?>

    <div id="right-panel" class="right-panel">

        <?php require_once('./topBar.php') ?>

        <div class="breadcrumbs">
            <div class="col-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Contact Message</h1>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <table class="table table-striped table-bordered" id="contactTable">
                        <caption>Contact Messages</caption>
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                if ($result->num_rows > 0) {
                                    while ($row = $result->fetch_object()) {
                                        echo "<tr>
                                                <td>{$row->name}</td>
                                                <td>{$row->email}</td>
                                                <td>{$row->message}</td>
                                                <td>" . date("F j, Y, g:i a", strtotime($row->created_at)) . "</td>
                                              </tr>";
                                    }
                                } else {
                                    echo "<tr><td colspan='4' class='text-center'>No messages found</td></tr>";
                                }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

        <script>
            $(document).ready(function() {
                $('#contactTable').DataTable({
                    "order": [[3, "desc"]]
                });
            });
        </script>

<?php
    require_once("./footer.php");
?>
