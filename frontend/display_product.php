<?php
include '../index.php';
include '../database.php';
include '../backend/product.php';

$product = new Product($conn);
$rows = $product->display();
echo $rows;

if($_GET['action'] == "type"){
    $product->getCategoryDetails($_GET['action']);
    
}
?>
<div class="d-flex justify-content-center align-items-center bg-blue-50">
    <ul class="nav border rounded-bottom">
        <li class="nav-item">
            <a class="nav-link" href="welcome.php">< Back</a>
        </li>
        <li class="nav-item">
            <a href="dashboard.php" name="display-product" class="nav-link">Dashboard</a>
        </li>
        <li class="nav-item">
            <a href="display_product.php" name="display-product" class="nav-link">All products</a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link">Add product</a>
        </li>
        <li class="nav-item">
            <a href="?action=type" class="nav-link">View type</a>
        </li>
    </ul>
</div>
<div class="container p-5">
    <div class="card w-50 mx-auto">
        <div class="card-body">
            <div id="table-content" style="display:block">
                <table class="table">
                    <tr class="text-center">
                        <th>Id</th>
                        <th>Name</th>
                    </tr>
                    <?php
                    foreach($rows as $row):
                    ?>
                        <tr class="text-center">
                            <td><?php echo $row['id'] ?></td>
                            <td>B</td>
                            <td><a href="#">Buy</a></td>
                        </tr>
                    <?php
                    endforeach
                    ?>
                    
                </table>
            </div>
        </div>
    </div>
</div>
