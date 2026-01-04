<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/product.php';
include '../backend/cart.php';
include '../backend/order.php';

if(isset($_SESSION['singleProduct'])){
    $data = $_SESSION['singleProduct'];
}
if(isset($_GET['add_to_cart'])){
    $productId = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;
    $cart = new Cart($conn);
    $cart->addToCart($data['product'][0]['Id'], $quantity);
}
if(isset($_GET['buy_now'])){
    $productId = $_GET['product_id'];
    $quantity = isset($_GET['quantity']) ? (int)$_GET['quantity'] : 1;
    if ($quantity < 1) $quantity = 1;
    $order = new Order($conn);
    $order->addOrder($data['product'][0]['Id'], $quantity);
}

?>
<div class="container w-50 p-5">
    <div class="card mx-auto">
        
        <div class="card-body">
            <div class="flex justify-around align-items-center mb-4">
                <div class="">
                    <h4 class="mb-3">Product Details</h4>
                    <p>Name: <?= htmlspecialchars($data['product'][0]['Name']) ?></p>
                    <p>Price: $<?= $data['product'][0]['Name'] ?></p>
                    <p>Category: <?= htmlspecialchars($data['category'][0]['name']) ?></p>
                </div>
                <div class="flex flex-col gap-2">
                    <div class="mb-2">
                        <label for="quantity-<?= $data['product'][0]['Id']; ?>" class="form-label">Quantity</label>
                        <input type="number" id="quantity-<?= $data['product'][0]['Id']; ?>" 
                            name="quantity" value="1" min="1" class="form-control">
                    </div>

                    <a href="?add_to_cart=1&product_id=<?= $data['product'][0]['Id']; ?>" class="btn btn-primary">
                            <button class="btn btn-primary">Add to Cart</button>
                    </a>

                    <a href="?buy_now=1&product_id=<?= $data['product'][0]['Id']; ?>" class="btn btn-primary">
                            <button class="btn btn-primary">Buy Now</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

