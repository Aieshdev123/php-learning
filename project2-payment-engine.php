<?php
/**
 * 🏆 PROJECT 1 (PART 2): INTERACTIVE E-COMMERCE PAYMENT ENGINE
 * Architecture: PHP OOP Core Basics + Dynamic UI Checkout Portal
 * Focus: Polymorphic Inheritance, $_POST Form State Routing, Input Validation
 */

// 1. PARENT CLASS (Maa-Baap Core Engine)
class PaymentGateway {
    public $amount;

    public function __construct($amount) {
        $this->amount = $amount;
    }

    public function baseReceipt() {
        return "Base Order Amount: Rs. " . $this->amount;
    }
}

// 2. CHILD CLASS 1 - Stripe Credit Card Processing
class StripePayment extends PaymentGateway {
    public $cardNumber;
    public $processingFee = 150; // Stripe fixed network fee

    public function __construct($amount, $card) {
        parent::__construct($amount); // Passes amount to parent vault
        $this->cardNumber = $card;
    }

    public function processStripe() {
        $finalTotal = $this->amount + $this->processingFee;
        // Masking card to show only last 4 digits for global fintech security standards
        $maskedCard = "**** **** **** " . substr($this->cardNumber, -4);
        
        return "
        <div class='receipt stripe-box'>
            <h3> STRIPE SECURE TRANSACTION SUCCESS</h3>
            <p>" . parent::baseReceipt() . "</p>
            <p><strong>Card Used:</strong> " . $maskedCard . "</p>
            <p><strong>Stripe Gateway Fee:</strong> Rs. " . $this->processingFee . "</p>
            <hr>
            <h2>Total Charged: Rs. " . $finalTotal . "</h2>
        </div>";
    }
}

// 3. CHILD CLASS 2 - Direct Bank Transfer Processing
class BankTransfer extends PaymentGateway {
    public $accountNumber;

    public function __construct($amount, $account) {
        parent::__construct($amount);
        $this->accountNumber = $account;
    }

    public function processBank() {
        return "
        <div class='receipt bank-box'>
            <h3>🏦 DIRECT BANK TRANSFER INSTRUCTIONS</h3>
            <p>" . parent::baseReceipt() . "</p>
            <p><strong>Transfer Destination Account:</strong> " . $this->accountNumber . "</p>
            <p><strong>Gateway Processing Fee:</strong> Rs. 0 (Free)</p>
            <hr>
            <h2>Total Outstanding: Rs. " . $this->amount . "</h2>
            <p style='font-size: 11px; color: #747d8c;'>Please send exact funds using your mobile banking app to confirm order.</p>
        </div>";
    }
}

// ===================================================================
// ⚡ RUNTIME CONTROLLER: Form Submission Handling
// ===================================================================
$receiptOutput = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submittedAmount = $_POST['amount'] ?? 0;
    $paymentMethod = $_POST['method'] ?? '';

    // Advanced Validation Check: Amount must be a valid positive number
    if ($submittedAmount <= 0) {
        $receiptOutput = "<div class='alert danger'>🚨 <strong>FINTECH SECURITY ERROR:</strong> Invalid transaction amount entered.</div>";
    } else {
        // Dynamic Class Routing based on what user selected on screen
        if ($paymentMethod === "stripe") {
            $submittedCard = $_POST['card_number'] ?? '';
            
            // Check for valid credit card length
            if (strlen($submittedCard) < 16) {
                $receiptOutput = "<div class='alert danger'>🚨 <strong>VALIDATION ERROR:</strong> Invalid Credit Card details. Must be 16 digits.</div>";
            } else {
                // Initialize the Stripe Object dynamically on runtime
                $stripeEngine = new StripePayment($submittedAmount, $submittedCard);
                $receiptOutput = $stripeEngine->processStripe();
            }
        } elseif ($paymentMethod === "bank") {
            // Direct initialization for Bank engine instance
            $bankEngine = new BankTransfer($submittedAmount, "PK74UNIL0000123456789");
            $receiptOutput = $bankEngine->processBank();
        } else {
            $receiptOutput = "<div class='alert danger'>🚨 <strong>SYSTEM ERROR:</strong> Unsupported payment gateway option selected.</div>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advanced Checkout Gateway Engine</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f2f6; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; margin: 0; padding: 20px; }
        .checkout-card { background: #ffffff; padding: 35px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); width: 100%; max-width: 450px; box-sizing: border-box; }
        h2 { margin-top: 0; color: #2f3542; text-align: center; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #57606f; font-size: 14px; font-weight: 500; }
        input[type="number"], input[type="text"], select { width: 100%; padding: 12px; border: 1px solid #ced6e0; border-radius: 6px; box-sizing: border-box; font-size: 15px; }
        button { width: 100%; padding: 14px; background: #2ed573; border: none; color: white; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #26af5f; }
        .alert-container, .receipt-container { width: 100%; max-width: 450px; margin-bottom: 20px; box-sizing: border-box; }
        .alert { padding: 15px; border-radius: 6px; font-size: 14px; }
        .danger { background: #ffebe6; color: #bf2600; border-left: 5px solid #de350b; }
        .receipt { padding: 20px; border-radius: 8px; color: #2f3542; line-height: 1.6; }
        .stripe-box { background: #e8f4fd; border-left: 5px solid #1e90ff; }
        .bank-box { background: #f0fdf4; border-left: 5px solid #2ed573; }
        .receipt h3 { margin-top: 0; font-size: 16px; }
        .receipt h2 { text-align: left; margin: 10px 0 0 0; color: #1e2229; font-size: 22px; }
    </style>
</head>
<body>

    <!-- Dynamic Output Area -->
    <?php if (!empty($receiptOutput)): ?>
        <div class="receipt-container">
            <?php echo $receiptOutput; ?>
        </div>
    <?php endif; ?>

    <div class="checkout-card">
        <h2>💳 Aura Salon Checkout</h2>
        <form action="" method="POST" id="paymentForm">
            <div class="form-group">
                <label>Order Amount (PKR)</label>
                <input type="number" name="amount" placeholder="e.g. 3000" required>
            </div>
            <div class="form-group">
                <label>Choose Payment Method</label>
                <select name="method" id="methodSelect" onchange="toggleCardField()" required>
                    <option value="stripe">Credit Card (Stripe Gateway)</option>
                    <option value="bank">Direct Bank Transfer</option>
                </select>
            </div>
            <div class="form-group" id="cardGroup">
                <label>16-Digit Card Number</label>
                <input type="text" name="card_number" id="cardInput" placeholder="4242 4242 4242 4242" maxlength="16">
            </div>
            <button type="submit">Complete Secure Payment</button>
        </form>
    </div>

    <script>
        // Simple UI script to hide card input field if bank transfer is selected
        function toggleCardField() {
            var method = document.getElementById("methodSelect").value;
            var cardGroup = document.getElementById("cardGroup");
            var cardInput = document.getElementById("cardInput");
            if (method === "bank") {
                cardGroup.style.display = "none";
                cardInput.required = false;
            } else {
                cardGroup.style.display = "block";
                cardInput.required = true;
            }
        }
        toggleCardField(); // Run on load
    </script>

</body>
</html>
