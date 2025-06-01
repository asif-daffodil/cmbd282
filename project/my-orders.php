<?php  
    require_once './components/header.php';
?>
<div class="container">
    <h2 class="text-center text-primary my-4">My Orders</h2>
    <div class="row">
        <?php
            // Fetch user's orders from the database
            $userId = $_SESSION['iUserInfo']->id;
            $ordersQuery = "SELECT * FROM orders WHERE user_id = $userId ORDER BY created_at DESC";
            $ordersResult = $conn->query($ordersQuery);
            while($order = $ordersResult->fetch_object()):
        ?>
        <div class="col-md-4">
            <div class="card mb-4">
                <div class="card-body">
                    <h5 class="card-title">Order #<?= $order->id ?></h5>
                    <p class="card-text">Total: $<?= number_format($order->total) ?></p>
                    <a href="./order-details.php?id=<?= $order->id ?>" class="btn btn-primary">View Details</a>
                </div>
            </div>
        </div>
        <?php endwhile; ?>
    </div>
</div>

<?php  
    require_once './components/footer.php';
?>
    