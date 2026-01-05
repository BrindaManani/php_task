<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/info.php';

$stock = new Stock($conn);
$totalProduct = $stock->info();

$orders = new TotalOrders($conn);
$totalOrders = $orders->info();

$users = new TotalUsers($conn);
$totalUsers = $users->info();
?>

<div class="container w-50 p-5">
    <div class="card mx-auto">
        
        <table class="w-full border-collapse">
            <thead>
                <tr class="bg-gray-200 text-center">
                    <th colspan="2" class="text-lg font-bold p-2">Summery</th>
                </tr>
            </thead>

            <tbody>
                    <tr class="p-4 border rounded shadow text-center">
                        <td>Total engagement</td>
                        <td><?= $totalProduct[0]['stock'] ?></td>
                    </tr>
                    <tr class="p-4 border rounded shadow text-center">
                        <td>Total products</td>
                        <td><?= $totalOrders[0]['totalOrders'] ?></td>
                    </tr>
                    <tr class="p-4 border rounded shadow text-center">
                        <td>Total orders</td>
                        <td><?= $totalUsers[0]['totalUsers'] ?></td>
                    </tr>
            </tbody>
        </table>
    </div>
</div>