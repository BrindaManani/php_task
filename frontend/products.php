<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/product.php';

$product = new Product($conn);
$products = $product->display();
if (isset($_GET['product_id'])) {
    $id = $_GET['product_id'];
    $singleProduct = $product->getProduct($id);
    $_SESSION['singleProduct'] = $singleProduct;
    header("Location: product_detail.php");
}
?>
<div class="container w-50 p-5">
    <div class="card mx-auto">

        <div class="container grid grid-cols-3 gap-4">
                <?php foreach ($products as $product): ?>
                    <div class="p-4 border rounded shadow text-center">
                        <h5 class="text-lg font-semibold">
                            <?= htmlspecialchars($product['name']) ?>
                        </h5>
                        <p>Rs. <?= $product['price'] ?></p>
                        <a href="?product_id=<?= $product['id'] ?>">View</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<!-- </div> -->