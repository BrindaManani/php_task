<?php
class Stock extends Info{

    public function totalProduct(){
        $stmt = $this->conn->prepare("SELECT COUNT(*) FROM products");
        $stmt->execute();
        $result = $stmt->get_result();
        return $result;
    }

}