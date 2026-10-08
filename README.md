# PHP Learning

Remote developer learning advanced PHP object-oriented programming. This repository documents my progress through practical exercises, including a user management script.

I am a remote developer building a feature for 'Aura Beauty Salon'. In my local path, create a new PHP file named `constructor-service.php`. Write a clean PHP OOP class named `SalonService`. Inside the class, add a `__construct()` method that accepts `$serviceName` and `$price` so I can initialize a service in just one line. Add a method named `getInvoice()` that returns the formatted string of the service and price. Create two objects using the constructor (Hair Cut for 2500 and Facial for 3000) and echo them.

**constructor,Real world example practice (Part 2): Advanced Business & E-Commerce Logic**
 **Engineered an Automated Cart System:** Developed `cart-logic.php` utilizing PHP object constructors to handle complex, real-time fiscal computations seamlessly upon object instantiation.
 **Architected Dynamic Math Deductions:** Programmed backend logic inside the `__construct` method to automatically process multi-layered financial workflows, including base prices, dynamic discount deductions, and precise regional tax applications.
 **Clean Code & Documented Workflows:** Focused on industry-standard formatting, separating data extraction from rendering logic, and utilizing semantic formatting (`<strong>`) for critical user invoice anchors.

##  Object Inheritance & Backend Code Reusability
 **Mastered Structural Architecture:** Programmed dynamic parent-child class relationships (`BasicUser` and `VIPCustomer`) using the `extends` keyword to completely eliminate redundant code properties.
 **Implemented Modular Scalability:** Leveraged backend data injection to inherit core structures while dynamically introducing unique customer workflows (VIP Discounts) for platform customization.

##  Scalable E-Commerce Payment Gateway Engine Architecture
 **Engineered Polymorphic Checkouts:** Developed `payment-engine.php` using advanced class hierarchy to scale multiple automated transaction systems (`StripePayment` and `BankTransfer`) from a centralized monetary core.
 **Architected Secure Financial Workflows:** Utilized `parent::__construct()` to safely process baseline transaction totals while isolation functional variations, including string-masked credit card security and automated local fee calculations.

##  PHP Encapsulation & Data Security (secure-bank.php)
 **Secured Sensitive Structural States:** Developed the baseline financial module using the `private` access modifier to lock the core balance property, completely blocking direct external tampering or balance injections.
 **Implemented Controlled Mutations:** Engineered standard Getter and Setter workflows (`depositMoney`) backed by conditional validation checks to ensure only valid, non-zero monetary amounts are processed into the system.

##  Arithmetic Operators & Transaction Flow Logic (secure-bank2.php)
 **Engineered Real-World Withdrawal Workflows:** Programmed dynamic multi-layered fiscal logic, introducing robust backend business rules for automated debit processing.
 **Architected Insufficient Funds Prevention:** Leveraged comparison operators (`<=` and `>`) to validate withdrawals against live statement boundaries, instantly rejecting transactions with automatic error alerts if requested funds exceed active balances.

 ## 🔒 Project 1: Interactive Login Form & Security System (project-auth-system.php)

### What is this project?
I built a real, working Secure Login Form where users can type their email and password. Instead of just printing static text, the system checks the inputs in real-time and shows colored security alerts (Green for success, Red for errors).

### Key Concepts Cleared:
- **Data Locking (Encapsulation):** I locked the password and email inside the class using the `private` keyword. This stops hackers or external scripts from tampering with sensitive data directly.
- **Role-Based Access (Authorization):** The system checks if the logged-in user is an "Admin" or a "Customer". Admins get access to secure files, while regular Customers are safely restricted.
- **Live Form Handling (`$_POST`):** I mastered how data travels from HTML input boxes on the screen directly into PHP backend objects using the `POST` method.
- **Universal Backend Logic:** Learnt that this exact Form Processing and POST method concept works the same way across all backend systems globally (including Node.js and Python).

