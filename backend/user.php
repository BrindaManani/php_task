<?php
include '../index.php';
include '../database.php';

class User{

    public $conn;
    public function __construct($conn){
        $this->conn = $conn;
    }
    
    public function register($name, $email, $password){

        $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $stmt = $this->conn->prepare("INSERT INTO users (name,email,password) VALUES (?,?,?)");
        $stmt->bind_param("sss",$_POST['name'], $_POST['email'], $passwordHash);
        $stmt->execute();
        header("Location: login.php");
    }

    public function login($email, $password){

        $stmt = $this->conn->prepare("SELECT id,name,password FROM users WHERE email = ?");
        $stmt->bind_param("s", $email); 
        $stmt->execute();
        $result = $stmt->get_result();

        if ($user = $result->fetch_assoc()) {
            if (password_verify($password, $user['password'])) {
                $_SESSION['user'] = $user['name'];
                $_SESSION['user_id'] = $user['id'];
                // header("Location: dashboard.php");
                return true;
            } else {
                return false;
            }
        } else {
            echo "Invalid email or password.";
        }
    }
}
?>