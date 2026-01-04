<?php
include '../index.php';
include '../header.php';
?>
<div class="container w-50 p-5">
    <div class="card mx-auto">
        
        <div class="card-body">
            <h5 class="card-title">Welcome, <?php print_r( $_SESSION['user']); ?> 👋</h5>
            <p class="card-text">Your dashboard gives you everything you need to enjoy a smooth and personalized shopping experience. Here’s what you can do:
            </p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">🛒 Browse multiple products across categories.</li>
                <li class="list-group-item">➕ Add items to your cart and manage them easily.</li>
                <li class="list-group-item">💳 Complete purchases using card, cash, or online payment.</li>
                <li class="list-group-item">📦 Track your orders and view your purchase history.</li>
                <li class="list-group-item">✨ Enjoy a seamless and personalized shopping experience.</li>
            </ul>
        </div>
    </div>
</div>
