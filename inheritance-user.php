<?php
// 1. PARENT CLASS (Maa-Baap) - Sab ke liye common cheezein
class BasicUser {
    public $name;
    public $email;

    public function __construct($name, $email) {
        $this->name = $name;
        $this->email = $email;
    }

    public function getDetails() {
        return "Name: " . $this->name . " | Email: " . $this->email;
    }
}

// 2. CHILD CLASS (Bacha) - Jo parent se sab kuch le rahi hai aur apni nayi property add kar rahi hai
class VIPCustomer extends BasicUser {
    // Parent wale $name aur $email isse muft mein mil gaye hain!
    public $discountAccess; 

    // Naya Constructor jo parent ka data bhi lega aur apna bhi
    public function __construct($name, $email, $discount) {
        // 'super' ya parent ke constructor ko call karne ke liye parent::__construct use hota hai
        parent::__construct($name, $email); 
        $this->discountAccess = $discount;
    }

    // Naya advanced method jo parent ka data bhi dikhaye aur apna bhi
    public function getVIPDetails() {
        // parent::getDetails() se hum ne parent ka function use kar liya
        return parent::getDetails() . " | 🔥 Special VIP Discount: " . $this->discountAccess . "% OFF!";
    }
}

// ⚡ Executions
$regularUser = new BasicUser("Kiran", "kiran@example.com");
$vipUser = new VIPCustomer("Ayesha VIP", "ayesha@example.com", 20); // 20% discount

// Display on Screen
echo "<h3>Regular Customer:</h3>";
echo $regularUser->getDetails();

echo "<br><br>";

echo "<h3>VIP Customer:</h3>";
echo $vipUser->getVIPDetails();
?>
