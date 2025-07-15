<?php
require_once 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        // Step 1: Look up the user in the DB
        $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user) {
            // Step 2: Get stored salt and password hash
            $storedSalt = $user["salt"];
            $storedHash = $user["password"];

            // Step 3: Combine stored salt with entered password
            $saltedInput = $storedSalt . $password;

            // Step 4: Verify
            if (password_verify($saltedInput, $storedHash)) {
                echo "Login successful!";
            } else {
                echo "Invalid username or password.";
            }
        } else {
            echo "User not found.";
        }
    } else {
        echo "Please enter both username and password.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="POST" action="login.php">
        Username: <input type="text" name="username" required><br><br>
        Password: <input type="password" name="password" required><br><br>
        <input type="submit" value="Login">
    </form>
</body>
</html>
