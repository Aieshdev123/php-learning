<?php
// 1. Blueprint (Class) tayar hai
class User {
    // Properties
    public $name;
    public $email;
    public $role;

    // Method (Function)
    public function getUserInfo() {
        return "Name: " . $this->name . " | Email: " . $this->email . " | Role: " . $this->role;
    }
}

$admin = new User();
$admin->name = "Ali";
$admin->email = "ali@example.com";
$admin->role = "Admin";

$customer = new User();
$customer->name = "Sara";
$customer->email = "sara@example.com";
$customer->role = "Customer";

echo $admin->getUserInfo();
echo "<br>";
echo $customer->getUserInfo();

// ---------------------------------------------------------
// AB ISS SE NEECHE KA CODE AAP NE LIKHNA HAI:
// ---------------------------------------------------------

// TODO 1: Ek naya object banayein '$admin' ke naam se
// TODO 2: Uska name, email aur role ("Admin") set karein
// TODO 3: Ek aur object banayein '$customer' ke naam se
// TODO 4: Uska name, email aur role ("Customer") set karein
// TODO 5: 'echo' ka istemaal karke dono ki 'getUserInfo()' ko screen par print karein

// Salon service details and a formatted invoice line.


?>