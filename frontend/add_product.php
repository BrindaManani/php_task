<?php
include '../index.php';
include '../database.php';
include '../header.php';
include '../backend/product.php';

$product = new Product($conn);
if(isset($_POST['add-product'])){
    $product->add($_POST['name'], $_POST['price'], $_POST['stock']);
}

?>
<div id="form-content" style="display:none">
    <form class="d-flex flex-column p-2 justify-content-center align-items-center" method="post" action="product.php">
        <div class="mb-3"> 
            <label class="form-label">Product Name</label>
            <input type="input" class="form-control" name="name">
        </div>
        <div class="mb-3"> 
            <label class="form-label">Price</label>
            <input type="input" class="form-control" name="price">
        </div>
        <div class="mb-3"> Stock</label>
            <input type="number" class="form-control" name="stock">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit" name="add-product">Submit</button>
        </div>
    </form>
</div>