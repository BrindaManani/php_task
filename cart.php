<?php
include 'index.php';
include 'database.php';
?>

<div class="container p-5">
    <div class="card w-50 mx-auto">
        
        <div class="card-header">
            <ul class="nav">
                <li class="nav-item">
                    <a class="nav-link" href="welcome.php">< Back</a>
                </li>
                <li class="nav-item">
                    <a href="?action=display" class="nav-link">Cart items</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
            <?= content ?>
            <div id="table-content" style="display:block">
                <?php
                if($results){
                ?>
                    <table class="table">
                        <tr class="text-center">
                            <th>Id</th>
                            <th>Name</th>
                            <th>Price</th>
                        </tr>
                        <?php
                        foreach($results as $key=>$value){
                        ?>
                            <tr class="text-center">
                                <td><?php echo $key ?></td>
                                <td><?php echo $value ?></td>
                                <td><button>Cancle</button></td>
                            </tr>
                        <?php
                        }
                        ?>
                        
                    </table>

                <?php
                }
                ?>
            </div>
        </div>
    </div>
</div>
