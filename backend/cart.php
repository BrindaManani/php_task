<?php
include '../index.php';
include '../database.php';  


class Cart{
    public $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function display(){
        $stmt = $this->conn->prepare("SELECT p_id,qty FROM carts WHERE user_id=?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        $productIds = [];
        $qty = [];
        while ($row = $result->fetch_assoc()) {
            $productIds[] = $row['p_id'];
            $qty[$row['p_id']] = $row['qty'];
        }

        $productStmt = $this->conn->prepare("SELECT name, price FROM products WHERE id=?");

        $cartItems = [];

        foreach ($productIds as $id) {
            $productStmt->bind_param("i", $id);
            $productStmt->execute();
            $productResult = $productStmt->get_result();
            $item = $productResult->fetch_assoc();

            if($item) {
                $item['qty'] = $qty[$id];
                $cartItems[] = $item;
            }
        }

        return $cartItems;
    }

    public function addToCart($product_id, $qty){
        $stmt = $this->conn->prepare("INSERT INTO carts (p_id, qty, user_id) VALUES (?, ?, ?)");
        $stmt->bind_param("iii", $product_id, $qty, $_SESSION['user_id']);
        $stmt->execute();
    }
}
?>