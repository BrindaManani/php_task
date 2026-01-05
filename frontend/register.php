<?php
include '../index.php';
include '../database.php';
include '../backend/user.php';

$user = new User($conn);
$errors = [];
$invalid = 0;
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = trim($_POST['name'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $password = trim($_POST['password'] ?? '');

    if (!$name) $errors['name'] = "Name is required";
    if (!$email) $errors['email'] = !$email ? "Email is required" : (!filter_var($email, FILTER_VALIDATE_EMAIL) ? "Invalid email format" : "");
    if (!$password) {
        $errors['password'] = "Password is required";
    } else {
        if (strlen($password) < 6) $errors['password'] = "Password must be at least 6 characters";
        if (!preg_match('/[A-Z]/', $password)) $errors['password'] = "Password must contain at least 1 uppercase letter";
        if (!preg_match('/[0-9]/', $password)) $errors['password'] = "Password must contain at least 1 number";
    }

    if (empty($errors)) {
        $check = $user->register($_POST['name'], $_POST['email'], $_POST['password']);
        if($check){
            $invalid = 1;
        }
    }
}
?>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-4 card shadow">
            <div class="card-header text-center bg-primary text-white">
                <h3 class="text-center mb-4">Register</h3>
            </div>
            <?php if ($invalid == 1): ?>
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        <?php echo "User already exist!"; ?>
                    </ul>
                </div>
            <?php endif; ?>
            <div class="card-body">
                <form class="d-flex flex-column p-2 justify-content-center align-items-center" method="post">
                    <div class="mb-3"> 
                        <label class="form-label">Name</label>
                        <input type="text" class="form-control" name="name">
                        <?php if (isset($errors['name'])): ?>
                            <span class="error text-danger"><?php echo $errors['name']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Email</label>
                        <input type="email" class="form-control" name="email">
                        <?php if (isset($errors['email'])): ?>
                            <span class="error text-danger"><?php echo $errors['email']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3"> 
                        <label class="form-label">Password</label>
                        <input type="password" class="form-control" name="password">
                        <?php if (isset($errors['password'])): ?>
                            <span class="error text-danger"><?php echo $errors['password']; ?></span>
                        <?php endif; ?>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary" type="submit" name="register">Register</button>
                    </div>
                    <div>
                        <p>Already have an account? <a href="login.php">Login</a></p>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>