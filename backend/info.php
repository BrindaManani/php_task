<?php
include '../database.php';

abstract class Info{
    abstract public function info();

    public $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }
}

class Stock extends Info{

    public function __construct($conn) {
        parent::__construct($conn);
    }

    public function info(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) as stock FROM products");
        $stmt->execute();
        $stock = $stmt->get_result();
        $row = $stock->fetch_all(MYSQLI_ASSOC);
        return $row;
    }

}

class TotalOrders extends Info{

    public function __construct($conn) {
        parent::__construct($conn);
    }
    public function info(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) as totalOrders FROM orders");
        $stmt->execute();
        $orders = $stmt->get_result();
        $row = $orders->fetch_all(MYSQLI_ASSOC);
        return $row;    
    }

}

class TotalUsers extends Info{

    public function __construct($conn) {
        parent::__construct($conn);
    }
    public function info(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) as totalUsers FROM products");
        $stmt->execute();
        $users = $stmt->get_result();
        $row = $users->fetch_all(MYSQLI_ASSOC);
        return $row;    
    }

}