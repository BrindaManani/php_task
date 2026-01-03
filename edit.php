<?php
include('index.php');
?>
<div id="form-content" style="display:none">
    <form class="d-flex flex-column p-2 justify-content-center align-items-center" method="post" action="product.php">
        <div class="mb-3"> 
            <label class="form-label">Product Name</label>
            <input type="input" class="form-control" name="email">
        </div>
        <div class="mb-3"> 
            <label class="form-label">Price</label>
            <input type="input" class="form-control" name="password">
        </div>
        <div class="mb-3">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div>
    </form>
</div>