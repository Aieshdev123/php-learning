<?php
/**
 * 🏆 PROJECT 1: INTERACTIVE USER & ROLE AUTHENTICATION SYSTEM
 * Architecture: PHP OOP Core Basics + Interactive HTML5/CSS3 UI Portal
 * Focus: $_POST Global Context, Runtime State Form Handling & Secure Alert Injections
 */

class UserAuthentication {
    public $username;
    private $email;
    private $password; // 🔒 LOCKED
    public $role;

    public function __construct($name, $email, $pass, $role) {
        $this->username = $name;
        $this->email = $email;
        $this->password = $pass;
        $this->role = $role; 
    }

    public function attemptLogin($inputEmail, $inputPassword) {
        if ($this->email === $inputEmail && $this->password === $inputPassword) {
            return true;
        }
        return false;
    }

    public function accessSecureDashboard($inputEmail, $inputPassword) {
        if ($this->attemptLogin($inputEmail, $inputPassword) === true) {
            if ($this->role === "Admin") {
                return "<div class='alert success'>🔓 <strong>ACCESS GRANTED:</strong> Welcome, Admin [" . $this->username . "]! Loading Financial Audit Logs & Central Database Ecosystem.</div>";
            } else {
                return "<div class='alert warning'>❌ <strong>ACCESS DENIED:</strong> Welcome [" . $this->username . "]. Standard Customers are restricted from viewing Administrative dashboards.</div>";
            }
        } else {
            return "<div class='alert danger'>🚨 <strong>SECURITY ALERT:</strong> Authentication Failed! Invalid email or password structure detected.</div>";
        }
    }
}

// 🟩 SYSTEM BASE RECORDS (Registered Users)
$adminUser = new UserAuthentication("Ali Admin", "ali@fintech.com", "securePass123", "Admin");
$customerUser = new UserAuthentication("Sara Customer", "sara@client.com", "customerPass786", "Customer");

// ⚡ RUNTIME STATE CONTROLLER: Form Submission Handling
$alertResponse = "";
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $submittedEmail = $_POST['email'] ?? '';
    $submittedPassword = $_POST['password'] ?? '';

    // Route calculation logic dynamically inside backend boundaries
    if ($submittedEmail === "ali@fintech.com") {
        $alertResponse = $adminUser->accessSecureDashboard($submittedEmail, $submittedPassword);
    } elseif ($submittedEmail === "sara@client.com") {
        $alertResponse = $customerUser->accessSecureDashboard($submittedEmail, $submittedPassword);
    } else {
        $alertResponse = "<div class='alert danger'>🚨 <strong>SECURITY ALERT:</strong> User Entity does not exist in the centralized identity database.</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Secure Fintech Auth Portal</title>
    <style>
        body { font-family: 'Segoe UI', Arial, sans-serif; background: #f1f2f6; display: flex; flex-direction: column; align-items: center; justify-content: center; min-height: 100vh; margin: 0; }
        .login-card { background: #ffffff; padding: 40px; border-radius: 12px; box-shadow: 0 10px 25px rgba(0,0,0,0.05); width: 100%; max-width: 400px; box-sizing: border-box; }
        h2 { margin-top: 0; color: #2f3542; text-align: center; font-size: 24px; font-weight: 600; }
        .form-group { margin-bottom: 20px; }
        label { display: block; margin-bottom: 8px; color: #57606f; font-size: 14px; font-weight: 500; }
        input[type="email"], input[type="password"] { width: 100%; padding: 12px; border: 1px solid #ced6e0; border-radius: 6px; box-sizing: border-box; font-size: 15px; transition: border-color 0.2s; }
        input:focus { border-color: #1e90ff; outline: none; }
        button { width: 100%; padding: 12px; background: #1e90ff; border: none; color: white; border-radius: 6px; font-size: 16px; font-weight: 600; cursor: pointer; transition: background 0.2s; }
        button:hover { background: #3742fa; }
        .alert-container { width: 100%; max-width: 400px; margin-bottom: 20px; box-sizing: border-box; }
        .alert { padding: 15px; border-radius: 6px; font-size: 14px; line-height: 1.5; }
        .success { background: #e3fcef; color: #006644; border-left: 5px solid #00875a; }
        .warning { background: #fff0b3; color: #a54800; border-left: 5px solid #ffab00; }
        .danger { background: #ffebe6; color: #bf2600; border-left: 5px solid #de350b; }
        .credentials-box { background: #f8f9fa; padding: 15px; border-radius: 6px; border: 1px dashed #ced6e0; margin-top: 20px; width: 100%; max-width: 400px; box-sizing: border-box; font-size: 12px; color: #747d8c; }
    </style>
</head>
<body>

    <!-- Dynamic Response Delivery Container -->
    <?php if (!empty($alertResponse)): ?>
        <div class="alert-container">
            <?php echo $alertResponse; ?>
        </div>
    <?php endif; ?>

    <div class="login-card">
        <h2>🔒 Secure Identity Login</h2>
        <form action="" method="POST">
            <div class="form-group">
                <label>Email Address</label>
                <input type="email" name="email" placeholder="Enter your registered email" required>
            </div>
            <div class="form-group">
                <label>Password</label>
                <input type="password" name="password" placeholder="Enter security passphrase" required>
            </div>
            <button type="submit">Authenticate Session</button>
        </form>
    </div>

    <!-- Credentials Cheat-Sheet Container for Live Testing -->
    <div class="credentials-box">
        <strong>💡 Live Testing Credentials:</strong><br>
        • Admin Access: <u>ali@fintech.com</u> | Password: <u>securePass123</u><br>
        • Customer Access: <u>sara@client.com</u> | Password: <u>customerPass786</u>
    </div>

</body>
</html>
