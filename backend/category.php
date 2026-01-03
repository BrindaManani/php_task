<?php
include '../index.php';
include '../database.php';

class Category {

    public $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getCategoryDetails($type) {
        $category = $this->conn->prepare("SELECT * FROM products WHERE type=$type");
        $category->execute();
        return $category->fetchAll();

    }

}
?>