<?php
include '../index.php';
include '../database.php';
include '../backend/user.php';

$user = new User($conn);

if(isset($_POST['register'])){
    $user->register($_POST['name'], $_POST['email'], $_POST['password']);
}
?>

<div class="d-flex p-5 justify-content-center align-items-center ">
    <div class="card w-50 mx-auto">
        <div class="card-header text-center">
            <h2>Register Form </h2>
        </div>
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