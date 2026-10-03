<?php
// 1. PARENT CLASS (Maa-Baap) - Jo har payment gateway ke liye laazmi hai
class PaymentGateway {
    public $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function baseReceipt() {
        return "Base Order Amount: Rs. " . $this->amount;
    }
}

// 2. CHILD CLASS 1 - Stripe Payment (Card processing logic)
class StripePayment extends PaymentGateway {
    public $cardNumber;
    public $processingFee = 150; // Stripe apni fees leta hai

    public function __construct($amount, $card) {
        // Parent ke constructor ko amount bhej di
        parent::__construct($amount); 
        $this->cardNumber = $card;
    }

    //  Logic: Processing Fee ko final amount mein khud add karna
    public function processStripe() {
        $finalTotal = $this->amount + $this->processingFee;
        return "
        === 💳 STRIPE SECURE TRANSACTION ===<br>"
        . parent::baseReceipt() . "<br>
        Stripe Card Used: **** **** **** " . substr($this->cardNumber, -4) . "<br>
        Stripe Processing Fee: Rs. " . $this->processingFee . "<br>
        <strong>Total Charged to Card: Rs. " . $finalTotal . "</strong><br>
        =====================================<br><br>";
    }
}

// 3. CHILD CLASS 2 - Bank Transfer (Direct Bank logic)
class BankTransfer extends PaymentGateway {
    public $accountNumber;

    public function __construct($amount, $account) {
        parent::__construct($amount);
        $this->accountNumber = $account;
    }

    //  Logic: No fees, direct confirmation receipt
    public function processBank() {
        return "
        === 🏦 DIRECT BANK TRANSFER ===<br>" 
        . parent::baseReceipt() . "<br>
        Transfer Destination Account: " . $this->accountNumber . "<br>
        Processing Fee: Rs. 0 (Free)<br>
        <strong>Total to Pay via App: Rs. " . $this->amount . "</strong><br>
        ===================================<br><br>";
    }
}

// -------------------------------------------------------------
//  LIVE REAL-WORLD EXECUTION
// -------------------------------------------------------------

// Customer 1: Ali selects Stripe for a Rs. 5000 Salon Package
$aliPayment = new StripePayment(5000, "1234567890123456");
echo $aliPayment->processStripe();

// Customer 2: Sara selects Direct Bank Transfer for a Rs. 3000 Facial
$saraPayment = new BankTransfer(3000, "PK74UNIL0000123456");
echo $saraPayment->processBank();
?>
