<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/product.php';
include '../backend/cart.php';
include '../backend/order.php';

$cart = new Cart($conn);
$carts = $cart->display();

if(isset($_SESSION['singleProduct'])){
    $data = $_SESSION['singleProduct'];
}
$order = new Order($conn);

if(isset($_GET['buy_now'])){
    $productId = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;
    $order->addOrder($data['product'][0]['Id'], $quantity);
}

if(isset($_GET['delete_product'])){
    $productId = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;
    $cart->delete_product($data['product'][0]['Id'], $quantity);
    if($cart){
        echo '<div id="success-alert" class="success-message text-center bg-red-200 text-red-800">';
        echo 'Product deleted from cart succefully!';
        echo '</div>';

        echo '<script type="text/javascript">';
        echo 'setTimeout(function() {';
        echo '  var alertDiv = document.getElementById("success-alert");';
        echo '  if (alertDiv) {';
        echo '    alertDiv.style.display = "none";';
        echo '  }';
        echo '}, 2000);';
        echo '</script>';
    }
}

?>
<div class="container w-50 p-5">
    <div class="card mx-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th colspan="4" class="text-lg font-bold p-2">Cart</th>
                </tr>
                <tr class="bg-gray-100 text-center">
                    <th class="p-2">Product Name</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Price</th>
                    <th class="p-2">Action</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($carts as $cart): ?>
                    <tr class="p-4 border rounded shadow text-center">
                        <td class="text-lg font-semibold"><?= htmlspecialchars($cart['name']) ?></td>
                        <td><?= $cart['qty'] ?></td>
                        <td>Rs. <?= $cart['price'] ?></td>
                        <td>
                            <a href="?buy_now=1&product_id=<?= $data['product'][0]['Id']; ?>">Buy Now</a>
                            <a href="?delete_product=1&product_id=<?= $data['product'][0]['Id']; ?>" class="ml-3 text-red-500">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>