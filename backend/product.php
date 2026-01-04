<?php
include '../index.php';
include '../database.php';
include 'category.php';

class Product extends Category{

    public $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function display(){
        $stmt = $this->conn->prepare("SELECT id,name,price FROM products");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function getProduct($id){
        $stmt = $this->conn->prepare("SELECT * FROM products WHERE id=$id");
        $stmt->execute();
        $result = $stmt->get_result();
        $product = $result->fetch_all(MYSQLI_ASSOC);
        $c_id = $product[0]['c_id'];
        $category = parent::getCategory($c_id);
        return [
            'product' => $product,
            'category' => $category
        ];
    }
}
?>