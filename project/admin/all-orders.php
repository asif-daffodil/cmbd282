<?php
    require_once("./header.php");
    require_once("./sidebar.php");

    if(isset($_POST['update_status'])) {
        $order_item_id = $_POST['order_item_id'];
        $status = $_POST['status'];

        // Update order status
        $updateQuery = "UPDATE `order_items` SET `status` = '$status' WHERE `id` = $order_item_id";
        if($conn->query($updateQuery) === TRUE) {
            echo "<script>toastr.success('Order status updated successfully');</script>";
        } else {
            echo "<script>toastr.error('Failed to update order status');</script>";
        }
    }

    // select all from orders item where status is pending
    $query = "SELECT order_items.*, order_items.id AS order_item_id, orders.*, products.*, products.name AS ProductName, users.* FROM `order_items` INNER JOIN `orders` ON order_items.order_id = orders.id INNER JOIN `products` ON order_items.product_id = products.id INNER JOIN `users` ON orders.user_id = users.id WHERE order_items.status != 'pending'";
    $result = $conn->query($query);
?>

    <div id="right-panel" class="right-panel">

    <?php require_once('./topBar.php') ?>

        <div class="breadcrumbs">
            <div class="col-12">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>Pending Orders</h1>
                        <?php
                            if($result->num_rows > 0){
                        ?>
                            <table class="table" id="pendingOrdersTable">
                                <thead>
                                    <tr>
                                        <th>Order ID</th>
                                        <th>User name</th>
                                        <th>Product Name</th>
                                        <th>Product Image</th>
                                        <th>Quantity</th>
                                        <th>Subtotal</th>
                                        <th>Order Date</th>
                                        <th>Status</th>
                                        <th>Shipping Address</th>
                                        <th>Payment Method</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                            <?php
                                while($row = $result->fetch_object()){
                            ?>
                            <tr>
                                <td><?= $row->order_id ?></td>
                                <td><?= $row->name ?></td>
                                <td><?= $row->ProductName ?></td>
                                <td><img src="../assets/images/products/<?= $row->image ?>" alt="" class="img-thumbnail" style="height: 100px; object-fit: contain;"></td>
                                <td><?= $row->quantity ?></td>
                                <td>$<?= number_format($row->subtotal, 2) ?></td>
                                <td><?= date("F j, Y, g:i a", strtotime($row->created_at)) ?></td>
                                <td><?= $row->status ?></td>
                                <td><?= htmlspecialchars_decode($row->address) ?></td>
                                <td><?= htmlspecialchars($row->payment_method) ?></td>
                                <td>
                                    <form action="" method="post">
                                        <!-- slect option 'pending','cancel','shifted','success','refunded' -->
                                        <select name="status" class="form-select mb-2">
                                            <option value="pending" <?= $row->status == 'pending' ? 'selected' : '' ?>>Pending</option>
                                            <option value="cancel" <?= $row->status == 'cancel' ? 'selected' : '' ?>>Cancel</option>
                                            <option value="shifted" <?= $row->status == 'shifted' ? 'selected' : '' ?>>Shifted</option>
                                            <option value="success" <?= $row->status == 'success' ? 'selected' : '' ?>>Success</option>
                                            <option value="refunded" <?= $row->status == 'refunded' ? 'selected' : '' ?>>Refunded</option>
                                        </select>
                                        <input type="hidden" name="order_item_id" value="<?= $row->order_item_id ?>">
                                        <button type="submit" class="btn btn-primary btn-sm" name="update_status">Update Status</button>
                                    </form>
                                </td>
                            </tr>
                                </tbody>
                            <?php
                                }
                            ?>
                            </table>
                            <?php
                            } else {
                                echo "<p class='text-danger'>No pending orders found.</p>";
                            }
                            ?>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- /#right-panel -->

    <!-- Right Panel -->

    <script>
        $("#pendingOrdersTable").DataTable({
            "lengthMenu": [5, 10, 25, 50, 100],
            "pageLength": 5,
        });
    </script>

<?php
    require_once("./footer.php");
?>
