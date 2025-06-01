<?php  
    require_once './components/header.php';
    $orderId = $_GET['id'] ?? null;
?>
<div class="container">
    <h1 class="text-primary mb-4">Order Details</h1>
    <div class="row">
        <div class="col-md-12">
            <?php
                // check if user is logged in
                if(!isset($_SESSION['iUserInfo'])){
                    echo "<script>toastr.error('Please login to view your orders!'); setTimeout(() => { window.location =  './sign-in.php' }, 2000);</script>";
                    exit();
                }

                // fetch orders for the logged-in user
                $userId = $_SESSION['iUserInfo']->id;
                $ordersQuery = "SELECT * FROM order_items
                               JOIN orders ON order_items.order_id = orders.id 
                               JOIN products ON order_items.product_id = products.id
                               WHERE order_items.order_id = $orderId 
                               ORDER BY order_items.id DESC";
                $ordersResult = $conn->query($ordersQuery);

                if($ordersResult->num_rows > 0){
                    echo "<div class='row'>";
                    $sn = 1;
                    while($order = $ordersResult->fetch_object()){
                ?>
                        <div class="card mb-4 col-md-12">
                            <div class="row">
                                <div class="col-md-4 d-flex justify-content-center align-items-center">
                                    <img src="./assets/images/products/<?= $order->image ?>" alt="" class="img-thumbnail p-2" style="height: 200px; object-fit: contain;">
                                </div>
                                <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?= $sn++ ?>. Product: <?= $order->name ?></h5>
                                        <p class="card-text">Quantity: <?= $order->quantity ?></p>
                                        <p class="card-text">Subtotal: $<?= number_format($order->subtotal, 2) ?></p>
                                        <p class="card-text">Order Date: <?= date("F j, Y, g:i a", strtotime($order->created_at)) ?></p>
                                        <p class="card-text">Status: <?= $order->status ?></p>
                                        <p class="card-text">Shipping Address: <?= htmlspecialchars($order->address) ?></p>
                                        <p class="card-text">Payment Method: <?= htmlspecialchars($order->payment_method) ?></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                <?php
                    }
                    echo "</div>";
                } else {
                    echo "<p>No orders found.</p>";
                }
            ?>
        </div>
    </div>
</div>

<?php  
    require_once './components/footer.php';
?>
    