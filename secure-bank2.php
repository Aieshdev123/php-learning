<?php
class BankAccount {
    // Properties
    public $accountHolder;
    private $balance; // 🔒 PRIVATE LOCK: Tijori locked hai

    // Constructor: Account khulte hi khud chalta hai
    public function __construct($name, $initialDeposit) {
        $this->accountHolder = $name;
        $this->balance = $initialDeposit;
    }

    // 🔓 GETTER: Tijori ka balance dekhne ki secure window
    public function getBalance() {
        return "Rs. " . $this->balance;
    }

    // 🔒 SETTER 1: Paise Jama Karne (Deposit) Ka Secure Tareeqa
    public function depositMoney($amount) {
        if($amount > 0) {
            $this->balance += $amount;
            return "Successfully deposited: Rs. " . $amount;
        } else {
            return "❌ Security Alert: Invalid Deposit Amount!";
        }
    }

    // 🔒 SETTER 2: New Logic - Paise Nikalne (Withdraw) Ka Secure Tareeqa
    public function withdrawMoney($amount) {
        // Fintech Rule 1: Amount positive honi chahiye
        if($amount <= 0) {
            return "❌ Error: Invalid Withdrawal Amount!";
        }
        
        // Fintech Rule 2: Check karein ke balance kaafi hai ya nahi
        if($amount > $this->balance) {
            return "❌ Transaction Rejected: Insufficient Funds! (Aap ke paas itne paise nahi hain)";
        }

        // Agar dono checks paas ho gaye, toh paise nikal lo
        $this->balance -= $amount;
        return "Successfully withdrawn: Rs. " . $amount . " (Paise nikal liye gaye)";
    }
}

// ===================================================================
// 🟢 OBJECT ENGINE SHURU (Yahan se asli data memory mein banta hai)
// ===================================================================
$myAccount = new BankAccount("Ayesha", 50000); // Initial 50,000 se account khula

echo "<h3>Initial Balance:</h3>";
echo $myAccount->getBalance() . "<br>"; // Output: Rs. 50000

echo "<h3>Processing Transactions:</h3>";
echo $myAccount->depositMoney(15000) . "<br>";  // Rs. 15,000 jama kiye (Total: 65,000)
echo $myAccount->withdrawMoney(20000) . "<br>"; // Rs. 20,000 nikal liye (Total: 45,000)

echo "<h3>Testing Hacker / Error Check:</h3>";
echo $myAccount->withdrawMoney(90000) . "<br>"; // Rs. 90,000 nikalne ki koshish (Rejected!)

echo "<h3>Final Balance:</h3>";
echo "<strong>Current Statement Balance: " . $myAccount->getBalance() . "</strong><br>";
?>
