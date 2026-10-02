<?php
class ShoppingCart {
    // Properties
    public $productName;
    public $basePrice;
    public $discountPercentage;
    public $taxPercentage;
    public $finalBill; // Yeh value constructor khud calculate karega

    //  Advanced Constructor: Isme hum mathematics logic daal rahe hain
    public function __construct($name, $price, $discount, $tax) {
        $this->productName = $name;
        $this->basePrice = $price;
        $this->discountPercentage = $discount;
        $this->taxPercentage = $tax;

        //  TOUGH LOGIC CALCULATIONS (Automatic execution on object creation)
        $discountAmount = $this->basePrice * ($this->discountPercentage / 100);
        $priceAfterDiscount = $this->basePrice - $discountAmount;
        $taxAmount = $priceAfterDiscount * ($this->taxPercentage / 100);
        
        // Final calculation saved into the property
        $this->finalBill = $priceAfterDiscount + $taxAmount;
    }

    // Professional Breakdown Method
    public function getInvoice() {
        return "
        === RECEIPT FOR: " . $this->productName . " ===<br>
        Base Price: Rs. " . $this->basePrice . "<br>
        Discount Given: " . $this->discountPercentage . "%<br>
        Tax Applied: " . $this->taxPercentage . "%<br>
        <strong>Total Amount to Pay: Rs. " . $this->finalBill . "</strong><br>
        =======================================<br><br>";
    }
}

//  Tough Executions: Hum ne srf data bheja, maths computer ne khud kiya!
$item1 = new ShoppingCart("iPhone 15 Pro", 120000, 10, 15); // 10% off, 15% tax
$item2 = new ShoppingCart("Dell XPS Laptop", 150000, 5, 10);   // 5% off, 10% tax

// Display Receipts
echo $item1->getInvoice();
echo $item2->getInvoice();
?>
