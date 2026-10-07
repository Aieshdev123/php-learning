<?php
class BankAccount {
    // Properties
    public $accountHolder;
    private $balance; // 🔒 PRIVATE LOCK: Baahir se koi direct badal nahi sakta

    public function __construct($name, $initialDeposit) {
        $this->accountHolder = $name;
        $this->balance = $initialDeposit;
    }

    // 🔓 GETTER: Balance dekhne ka safe zariya
    public function getBalance() {
        return "Rs. " . $this->balance;
    }

    // 🔒 SETTER: Balance badalne (Deposit) ka secure zariya with checks
    public function depositMoney($amount) {
        // Fintech Security Check: Amount zero se badi honi chahiye
        if($amount > 0) {
            $this->balance += $amount;
            return "Successfully deposited: Rs. " . $amount;
        } else {
            return "❌ Security Alert: Invalid Deposit Amount!";
        }
    }
}

// ⚡ LIVE FINTECH EXECUTION
$myAccount = new BankAccount("Ayesha", 50000);

// ❌ HACKER TRYING TO CHANGE BALANCE DIRECTLY:
// $myAccount->balance = 1000000; // Agar aap yeh line un-comment karengi, toh PHP Fatal Error de dega!

// ✅ SECURE WAY (Using Getter and Setter)
echo "<h3>Initial Status:</h3>";
echo "Account Holder: " . $myAccount->accountHolder . "<br>";
echo "Current Balance: " . $myAccount->getBalance() . "<br>";

echo "<h3>Transaction Processing:</h3>";
echo $myAccount->depositMoney(15000) . "<br>"; // Safe Deposit

echo "<h3>Final Status:</h3>";
echo "Updated Balance: " . $myAccount->getBalance() . "<br>";
?>
