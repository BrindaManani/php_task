<?php
include '../database.php';

class Order {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function display() {
        $stmt = $this->conn->prepare("SELECT id, total FROM orders WHERE user_id=?");
        $stmt->bind_param("i", $_SESSION['user_id']);
        $stmt->execute();
        $result = $stmt->get_result();

        $orders = [];

        while ($row = $result->fetch_assoc()) {
            $orders[] = $row;
        }

        return $orders;
    }

    public function addOrder($product_id, $qty) {

        $productStmt = $this->conn->prepare("SELECT price FROM products WHERE id=?");
        $productStmt->bind_param("i", $product_id);
        $productStmt->execute();
        $productResult = $productStmt->get_result();
        $product = $productResult->fetch_assoc();
        if(!$product) {
            return false;
        }

        $price = $product['price'];
        $total = $price * $qty;

        $stmt = $this->conn->prepare("INSERT INTO orders (p_id, user_id, total) VALUES (?, ?, ?)");
        $stmt->bind_param("iii",$product_id, $_SESSION['user_id'], $total);
        $stmt->execute();
        header("Location: payment.php");
    }
}
?>
