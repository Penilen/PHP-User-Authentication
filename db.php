<?php
$host = 'localhost';
$dbname = 'auth_project'; 
$user = 'root';
$pass = ''; // XAMPP default root password is empty

try {
    // Include port 3307 here
    $pdo = new PDO("mysql:host=$host;port=3307;dbname=$dbname;charset=utf8", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
