<?php
include 'index.php';
include 'database.php';
?>
<?php

$action = $_GET['action'] ?? 'display';
$cart = new Cart();
// $content = "";
// $results = $cart->display();
if(method_exist($cart, $action)){
    $content = $cart->$action;
};

if(isset($_POST['submit'])){
    $results = $cart->delete($id);
}
class Cart{
    public function __construct() {
    }

    public function display(){
        // $select = $conn->prepare("SELECT * from carts");
        // $select->execute();
        // $results = $select->get_result();
        $results = [
            1 =>'iPhone',
            2 => 'laptop',
            3 => 'book'
        ];
        
        return $results;
        
    }

    public function delete(){
        $select = $conn->prepare("DELETE FROM carts where id=?");
        $select = bind_param("i",$id);
        $select->execute();
        $results = $select->get_result();
        
    }
}
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
