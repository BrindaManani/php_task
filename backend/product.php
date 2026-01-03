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
        $stmt = $this->conn->prepare("SELECT * FROM products");
        $stmt->execute();
        // $row = $result->fetch_assoc();
        // print_r($row);
        return $stmt->fetchAll();
    }

    public function add($name, $price, $stock){
        $stmt = $this->conn->prepare("INSERT INTO users (name,price,stock) VALUES (?,?,?)");
        $stmt->bind_param("sss",$name, $price, $stock);
        $stmt->execute();
        $this->display();
    }
}
?>