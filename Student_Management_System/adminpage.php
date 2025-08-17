<?php
session_start();
if(!isset($_SESSION["username"]))
{
    header("location:login.php");
    exit();
}

// Check if 'password' key exists in the session or other relevant array
if (isset($_SESSION["password"])) {
    $password = $_SESSION["password"];
} else {
    $password = ''; // Or handle it appropriately
}

// Example usage
echo "Welcome, " . htmlspecialchars($_SESSION["username"]);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>
<body>
    <h2>THIS IS ADMIN HOMEPAGE</h2>

<a href="logout.php">log out</a>
</body>
</html>