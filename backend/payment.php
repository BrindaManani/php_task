<?php
include '../index.php';
include '../database.php';

interface PaymentInterface {
    public function pay($amount);
}

class CreditCardPayment implements PaymentInterface {
    public function pay($amount) {
        return "Paid Rs.$amount using Credit Card.";
    }
}

class PayPalPayment implements PaymentInterface {
    public function pay($amount) {
        return "Paid $amount using PayPal.";
    }
}

class CodPayment implements PaymentInterface {
    public function pay($amount) {
        return "Pay $amount on delivery.";
    }
}

?>
