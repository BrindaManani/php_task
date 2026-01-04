<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/product.php';
include '../backend/cart.php';

$cart = new Cart($conn);
$carts = $cart->display();


?>
<div class="container w-50 p-5">
    <div class="card mx-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th colspan="3" class="text-lg font-bold p-2">Cart</th>
                </tr>
                <tr class="bg-gray-100 text-center">
                    <th class="p-2">Product Name</th>
                    <th class="p-2">Quantity</th>
                    <th class="p-2">Price</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($carts as $cart): ?>
                    <tr class="p-4 border rounded shadow text-center">
                        <td class="text-lg font-semibold"><?= htmlspecialchars($cart['name']) ?></td>
                        <td><?= $cart['qty'] ?></td>
                        <td>$<?= $cart['price'] ?></td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>