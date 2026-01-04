<?php

interface PaymentInterface {
    public function pay($amount);
}

class CreditCardPayment implements PaymentInterface {
    public function pay($amount) {
        return "Paid using Credit Card.";
    }
}

class PayPalPayment implements PaymentInterface {
    public function pay($amount) {
        return "Paid using PayPal.";
    }
}

?>
