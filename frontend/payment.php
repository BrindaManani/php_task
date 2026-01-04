<?php
include '../index.php';
include '../header.php';
include '../database.php';
include '../backend/payment.php';

if(isset($_SESSION['singleProduct'])){
    $data = $_SESSION['singleProduct'];
}

if (isset($_GET['payment_method'])) {
    if ($_GET['payment_method'] === 'card_payment') {
        $paymentMethod = new CreditCardPayment();
    } elseif ($_GET['payment_method'] === 'paypal_payment') {
        $paymentMethod = new PayPalPayment();
    }

    if (isset($paymentMethod)) {
        $message = $paymentMethod->pay();
        echo $message;
    }
}
?>

<div class="container w-50 p-5">
    <div class="card mx-auto">
        
        <div class="card-body">
            <div class="flex justify-around align-items-center mb-4">
                <div class="">
                    <h4 class="mb-3">Payment Details</h4>
                    <p>Name: <?= htmlspecialchars($data['product'][0]['Name']) ?></p>
                    <p>Price: $<?= $data['product'][0]['Name'] ?></p>
                    <p>Category: <?= htmlspecialchars($data['category'][0]['name']) ?></p>
                </div>
                <div class="flex flex-col gap-2">
                    <a href="?payment_method=card_payment; ?>" class="btn btn-primary">
                            <button class="btn btn-primary">Card Payment</button>
                    </a>

                    <a href="?payment_method=paypal_payment; ?>" class="btn btn-primary">
                            <button class="btn btn-primary">Paypal payment</button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>