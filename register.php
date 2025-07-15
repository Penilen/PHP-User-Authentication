<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require_once 'db.php';

$message = "";  // This will hold feedback for the user
$enteredUsername = ""; // To keep the entered value in case of an error

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);
    $enteredUsername = htmlspecialchars($username); // Save to show again in form

    if (!empty($username) && !empty($password)) {
        // Check for duplicate
        $stmt = $pdo->prepare("SELECT COUNT(*) FROM users WHERE username = ?");
        $stmt->execute([$username]);
        if ($stmt->fetchColumn() > 0) {
            $message = "This username is already taken. Please choose another.";
        } else {
            // Register new user
            $salt = bin2hex(random_bytes(16));
            $saltedPassword = $salt . $password;
            $hashedPassword = password_hash($saltedPassword, PASSWORD_BCRYPT);

            $stmt = $pdo->prepare("INSERT INTO users (username, password, salt) VALUES (?, ?, ?)");
            $stmt->execute([$username, $hashedPassword, $salt]);

            $message = "Registration successful!";
            $enteredUsername = ""; // Clear input after success
        }
    } else {
        $message = "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head><title>Register</title></head>
<body>
    <h2>Register</h2>

    <?php if (!empty($message)) echo "<p>$message</p>"; ?>

    <form method="POST" action="register.php">
        Username: <input type="text" name="username" value="<?= $enteredUsername ?>" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Register">
    </form>
</body>
</html>
