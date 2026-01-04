<?php
include '../index.php';
include '../database.php';
include '../backend/user.php';

$user = new User($conn);
$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$name) $errors[] = "Name is required";
    if (!$email) $errors[] = !$email ? "Email is required" : (!filter_var($email, FILTER_VALIDATE_EMAIL) ? "Invalid email format" : "");
    if (!$password) {
        $errors[] = "Password is required";
    } else {
        if (strlen($password) < 6) $errors[] = "Password must be at least 6 characters";
        if (!preg_match('/[A-Z]/', $password)) $errors[] = "Password must contain at least 1 uppercase letter";
        if (!preg_match('/[0-9]/', $password)) $errors[] = "Password must contain at least 1 number";
    }

    if (empty($errors)) {
        $user->register($_POST['name'], $_POST['email'], $_POST['password']);
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h3 class="text-center mb-4">Register</h3>
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
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="register">Register</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>