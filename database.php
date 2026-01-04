
<?php

// $host = '127.0.0.1';
// $db = 'test1';
// $user = 'test1';
// $pass = 'u6OHh6oYlAFnul2G5a2t';
// $charset = 'utf8mb4';

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
// $options = [
//     PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//     PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
//     PDO::ATTR_EMULATE_PREPARES => false,
// ];

// try {
//     $conn = new PDO($dsn, $user, $pass, $options);
//     echo $conn;
// } catch (\PDOException $e) {
//     throw new \PDOException($e->getMessage(), (int) $e->getCode());
// }

// $servername = "127.0.0.1";
// $username = "test1";
// $password = "u6OHh6oYlAFnul2G5a2t";
// $dbname = "test1";

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php_task";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
