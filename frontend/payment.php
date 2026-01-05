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
    } elseif ($_GET['payment_method'] === 'cod_payment') {
        $paymentMethod = new CodPayment();
    }

    if (isset($paymentMethod)) {
        $message = $paymentMethod->pay($data['product'][0]['Price']);
        if($message){
            echo '<div id="success-alert" class="success-message text-center bg-green-200 text-green-800">';
            echo $message;
            echo '</div>';

            echo '<script type="text/javascript">';
            echo 'setTimeout(function() {';
            echo '  var alertDiv = document.getElementById("success-alert");';
            echo '  if (alertDiv) {';
            echo '    alertDiv.style.display = "none";';
            echo '    window.location.href = "products.php";'; 
            echo '  }';
            echo '}, 2000);';
            echo '</script>';
        }
    }

}
?>

<div class="container w-50 p-5">
    <div class="card mx-auto">
        
        <div class="card-body">
            <div class="form">
                    <h4 class="mb-3 text-center">Payment Details</h4>
                    <hr>
                    <p>Name: <?= htmlspecialchars($data['product'][0]['Name']) ?></p>
                    <p>Price: Rs.<?= $data['product'][0]['Price'] ?></p>
                    <p>Category: <?= htmlspecialchars($data['category'][0]['name']) ?></p>
                    <form method="post">
                        <label class="form-label">Address <span class="text-danger">*</span></label>
                        <input type="text" class="form-control mb-4" name="address">
                        <div class="flex justify-around">
                            <div class="mr-2">
                                <label class="form-label">Pincode <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="pin" required>
                            </div>
                            <div class="mr-2">
                                <label class="form-label">City <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="city" required>
                            </div>
                            <div>
                                <label class="form-label">State <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="state" required>
                            </div>
                        </div>
                        <div class="flex justify-around">
                            <a href="#" class="btn btn-primary">
                                <button class="btn btn-primary" id="cardPaymentBtn">Card payment</button>
                            </a>
                            <a href="?payment_method=paypal_payment" class="btn btn-primary">
                                <button class="btn btn-primary">Paypal payment</button>
                            </a>
                            <a href="?payment_method=cod_payment" class="btn btn-primary">
                                <button class="btn btn-primary">Cash On Delivery</button>
                            </a>
                        </div>
                    </form>
                    

                    <form id="myForm" style="display: none;" class="border border-rounded mt-5">
                        <h5 class="m-3 text-center">Bank Details</h5>
                        <div class="flex justify-around">
                            <div class="mr-2">
                                <label class="form-label">Card Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="card_number" required>
                            </div>
                            <div class="mr-2">
                                <label class="form-label">Expiry Date <span class="text-danger">*</span></label>
                                <input type="date" class="form-control mb-4" name="exp_date" required>
                            </div>
                            <div>
                                <label class="form-label">CVV Number <span class="text-danger">*</span></label>
                                <input type="text" class="form-control mb-4" name="cvv" required>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center mb-3">
                            <a href="?payment_method=paypal_payment" class="btn btn-primary">
                                <button class="btn btn-primary">pay</button>
                            </a>
                        </div>
                    </form>
            </div>
        </div>
    </div>
</div>
<script>
    const cardPaymentBtn = document.getElementById('cardPaymentBtn');
    const myForm = document.getElementById('myForm');

    cardPaymentBtn.addEventListener('click', function(event) {
        if (myForm.style.display === 'none') {
            myForm.style.display = 'block';
        } else {
            myForm.style.display = 'none';
        }
    });
</script>