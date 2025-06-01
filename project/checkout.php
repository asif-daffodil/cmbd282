<?php  
    require_once './components/header.php';

    // check if user is logged in
    if(!isset($_SESSION['iUserInfo'])){
        echo "<script>toastr.error('Please login to checkout!'); setTimeout(() => { window.location =  './login.php' }, 2000);</script>";
        exit();
    }

    // products in cart
    $cart = $_SESSION['cart'] ?? [];
    $total = 0;
    foreach($cart as $id => $quantity){
        $productQuery = "SELECT * FROM products WHERE id = $id";
        $productResult = $conn->query($productQuery);
        if($productResult->num_rows > 0){
            $product = $productResult->fetch_object();
            $total += $product->sale_price * $quantity;
        }
    }

    if(isset($_POST['place_order'])){
        // get user id
        $userId = $_POST['user_id'] ?? null;
        $name = $_POST['name'] ?? '';
        $email = $_POST['email'] ?? '';
        $address = $_POST['address'] ?? '';
        $paymentMethod = $_POST['payment_method'] ?? 'cash_on_delivery';

        // insert order into database
        $orderQuery = "INSERT INTO orders (user_id, address, total, payment_method) VALUES ('$userId', '$address', $total, '$paymentMethod')";
        if($conn->query($orderQuery)){
            $orderId = $conn->insert_id;
            // insert order items into database
            foreach($cart as $id => $quantity){
                $productQuery = "SELECT * FROM products WHERE id = $id";
                $productResult = $conn->query($productQuery);
                if($productResult->num_rows > 0){
                    $product = $productResult->fetch_object();
                    $subtotal = $product->sale_price * $quantity;
                    $orderItemQuery = "INSERT INTO order_items (order_id, product_id, quantity, subtotal) VALUES ($orderId, $id, $quantity, $subtotal)";
                    $conn->query($orderItemQuery);
                }
            }
            // clear cart
            unset($_SESSION['cart']);
            echo "<script>toastr.success('Order placed successfully!'); setTimeout(() => { window.location =  './index.php' }, 2000);</script>";
        }else{
            echo "<script>toastr.error('Failed to place order!');</script>";
        }
    }
?>
<div class="container py-5">
    <h1 class="text-primary mb-4">Checkout</h1>
    <div class="row">
        <div class="col-md-6">
            <h4 class="mb-3">Billing Details</h4>
            <form action="" method="POST">
                <!-- login user id in hidden field -->
                <input type="hidden" name="user_id" value="<?= $_SESSION['iUserInfo']->id ?? '' ?>">
                <div class="mb-3">
                    <label for="name" class="form-label">Full Name</label>
                    <input type="text" class="form-control" id="name" name="name" required value="<?= $_SESSION['iUserInfo']->name ?? '' ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email Address</label>
                    <input type="email" class="form-control" id="email" name="email" required value="<?= $_SESSION['iUserInfo']->email ?? '' ?>" disabled>
                </div>
                <div class="mb-3">
                    <label for="address" class="form-label">Shipping Address</label>
                    <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                </div>
                <input type="hidden" name="payment_method" value="cash_on_delivery">
                <button type="submit" class="btn btn-primary" name="place_order">Place Order</button>
            </form>
        </div>
        <div class="col-md-6">
            <h4 class="mb-3">Order Summary</h4>
            <table class="table">
                <thead>
                    <tr>
                        <th>Item</th>
                        <th>Price</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                        <?php foreach($_SESSION['cart'] as $id => $quantity): ?>
                            <?php
                                $productQuery = "SELECT * FROM products WHERE id = $id";
                                $productResult = $conn->query($productQuery);
                                if($productResult->num_rows > 0){
                                    $product = $productResult->fetch_object();
                            ?>
                            <tr>
                                <td><?= $product->name ?></td>
                                <td>$<?= number_format($product->sale_price * $quantity) ?></td>
                            </tr>
                            <?php } ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td class="fw-bold">Total</td>
                        <td class="fw-bold">$<?= number_format($total) ?></td>
                    </tr>
                </tfoot>
            </table>

            <!-- cash on delivery -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked>
                <label class="form-check-label" for="cod">
                    Cash on Delivery
                </label>
                <div class="invalid-feedback">
                    Please select a payment method.
                </div>
            </div>
            <!-- pay now -->
            <div class="form-check">
                <input class="form-check-input" type="radio" name="payment_method" id="pay_now" value="pay_now" disabled>
                <label class="form-check-label" for="pay_now">
                    Pay Now
                </label>
                <div class="invalid-feedback">
                    Please select a payment method.
                </div>
            </div>
            <img src="./assets/images/payment_method.webp" alt="" class="img-fluid mt-3" id="payment_image" >
        </div>
    </div>
</div>

<?php  
    require_once './components/footer.php';
?>
