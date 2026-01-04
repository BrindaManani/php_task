<?php
session_start();
include '../index.php';
include '../database.php';
include '../backend/user.php';

$user = new User($conn);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$email) $errors[] = !$email ? "Email is required" : (!filter_var($email, FILTER_VALIDATE_EMAIL) ? "Invalid email format" : "");
    if (!$password) {
        $errors[] = "Password is required";
    }

    if (empty($errors)) {
        $loginResult = $user->login($_POST['email'], $_POST['password']);
        if($loginResult === false) {
            $errors[] = "Invalid email or password.";
        }
        else{
            header("Location: dashboard.php");
            exit;
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h3 class="text-center mb-4">Login</h3>
            </div>
            <?php if (!empty($errors)): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php foreach ($errors as $error) echo "<li>$error</li>"; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <form class="d-flex flex-column p-2 justify-content-center align-items-center" method="post">
                    <div class="mb-3"> 
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="register">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>