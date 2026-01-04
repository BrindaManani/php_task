<?php
include '../index.php';
include '../database.php';

class Category {

    public $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }

    public function getCategory($id) {
        $category = $this->conn->prepare("SELECT name FROM categories WHERE id=$id");
        $category->execute();
        $result = $category->get_result();
        // $row = $result->fetch_all(MYSQLI_ASSOC);
        // print_r($row);
        return $result->fetch_all(MYSQLI_ASSOC);
    }

}
?>