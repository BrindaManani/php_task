<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/product.php';
include '../backend/cart.php';
include '../backend/order.php';

$order = new Order($conn);
$orders = $order->display();
?>
<div class="container w-50 p-5">
    <div class="card mx-auto">
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th colspan="3" class="text-lg font-bold p-2">Orders</th>
                </tr>
                <tr class="bg-gray-100 text-center">
                    <th class="p-2">Order Id</th>
                    <th class="p-2">Total</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($orders as $order): ?>
                    <tr class="p-4 border rounded shadow text-center">
                        <td><?= $order['id'] ?></td>
                        <td>Rs. <?= $order['total'] ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </div>
</div>