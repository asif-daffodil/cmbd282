<?php  
    require_once './components/header.php';

    if(isset($_POST['remove_from_cart'])) {
        $id = $_POST['id'] ?? null;
        if($id != null && isset($_SESSION['cart'][$id])){
            unset($_SESSION['cart'][$id]);
            echo "<script>toastr.success('Product removed from cart!'); setTimeout(() => { window.location =  window.location.href }, 2000);</script>";
        }
    }
?>

<div class="container py-5">
    <h1 class="text-primary mb-3">Shopping Cart</h1>
    <div class="row">
        <div class="col-md-12">
            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Item</th>
                            <th>Image</th>
                            <th>Product</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Total</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $total = 0;
                            $sn = 1;
                            foreach($_SESSION['cart'] as $id => $quantity):
                                $productQuery = "SELECT * FROM products WHERE id = $id";
                                $productResult = $conn->query($productQuery);
                                if($productResult->num_rows > 0):
                                    $product = $productResult->fetch_object();
                                    $subtotal = $product->sale_price * $quantity;
                                    $total += $subtotal;
                        ?>
                        <tr class="align-middle">
                            <td>
                                <?= $sn++ ?>
                            </td>
                            <td><img src="./assets/images/products/<?= $product->image ?>" alt="<?= $product->name ?>" style="height: 100px; width: 100px; object-fit: contain; object-position: center;"></td>
                            <td><?= $product->name ?></td>
                            <td>$<?= number_format($product->sale_price) ?></td>
                            <td><?= $quantity ?></td>
                            <td>$<?= number_format($subtotal) ?></td>
                            <td>
                                <form action="" method="POST">
                                    <input type="hidden" name="id" value="<?= $product->id ?>">
                                    <button type="submit" class="btn btn-danger btn-sm" name="remove_from_cart">Remove</button>
                                </form>
                            </td>
                        </tr>
                        <?php endif; endforeach; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="5" class="text-end">Total</td>
                            <td class="fw-bold">$<?= number_format($total) ?></td>
                        </tr>
                    </tfoot>
                </table>
            <?php else: ?>
                <p>Your cart is empty.</p>
            <?php endif; ?>
        </div>
        <!-- checkout -->
        <div class="col-md-12 mt-4 text-end">
            <?php if(isset($_SESSION['cart']) && count($_SESSION['cart']) > 0): ?>
                <a href="./checkout.php" class="btn btn-primary">Proceed to Checkout</a>
            <?php endif; ?>
        </div>
    </div>
</div>
<?php  
    require_once './components/footer.php';
?>