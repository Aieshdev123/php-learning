<?php
class SalonService
{
    private string $serviceName;
    private float $price;

    public function __construct(string $serviceName, float $price)
    {
        $this->serviceName = $serviceName;
        $this->price = $price;
    }

    public function getInvoice(): string
    {
        return "Service: {$this->serviceName} | Price: Rs. {$this->price}";
    }
}

// -------------------------------------------------------------------
// ⚡ Jadoo: Ab hum sirf 1 line mein naya object bhi banayenge aur data bhi bhejenge!
// -------------------------------------------------------------------

// Object 1: Hair Cut
$hairCut = new SalonService("Hair Cut", 2500);

// Object 2: Facial
$facial = new SalonService("Facial", 3000);

// Screen par display karne ke liye
echo $hairCut->getInvoice();
echo "<br>";
echo $facial->getInvoice();
?>
