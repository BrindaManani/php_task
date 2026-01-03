<?php
include '../index.php';
?>
<div class="container p-5">
    <div class="card w-50 mx-auto">
        <div class="card-header text-center">
            <h2>Dashboard</h2>
        </div>
        <div class="card-body">
            <table class="table">
                <tr class="text-center">
                    <th>Entity</th>
                    <th>Action</th>
                </tr>
                <tr class="text-center">
                    <td >Categories</td>
                    <td><a href="category.php">View inside</a><td>
                </tr>
                <tr class="text-center">
                    <td >Product</td>
                    <td><a href="display_product.php">View inside</a><td>
                </tr>
                <tr class="text-center">
                    <td >Cart</td>
                    <td><a href="cart.php">View inside</a><td>
                </tr>
                <tr class="text-center">
                    <td>Payment</td>
                    <td><a href="payment.php">View inside</a><td>
                </tr>
            </table>
        </div>
    </div>
</div>
