<?php
$host = "localhost";
$user = "root";
$password = "";
$db = "smsdb";

// Start session
session_start();

// Create connection
$data = mysqli_connect($host, $user, $password, $db);
if ($data === false) {
    die("Connection error");
}

$username = '';
$password = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize inputs
    $username = isset($_POST["studentID"]) ? trim($_POST["studentID"]) : '';
    $password = isset($_POST["password"]) ? trim($_POST["password"]) : '';

    // Prepare SQL query
    $sql = "SELECT * FROM student WHERE studentid = ? AND password = ?";
    
    // Prepare and execute statement
    if ($stmt = mysqli_prepare($data, $sql)) {
        mysqli_stmt_bind_param($stmt, "ss", $username, $password);
        mysqli_stmt_execute($stmt);
        
        // Get result
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
        
        if ($row) {
            if ($row["userType"] == 'user') {
                $_SESSION["username"] = $username;
                header("Location: userpage.php");
                exit();
            } elseif ($row["userType"] == "admin") {
                $_SESSION["username"] = $username; // Changed from $password to $username
                header("Location: AdminPanel.php");
                exit();
            } else {
                echo "Invalid Student ID or Password";
            }
        } else {
            echo "Invalid Student ID or Password";
        }

        // Close statement
        mysqli_stmt_close($stmt);
    } else {
        echo "SQL query preparation failed.";
    }
}

// Close connection
mysqli_close($data);
?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOG IN</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body style="background-color:#00264d;">
    <div class="container" style="width: 400px; background-color:#00264d; color:white;" >
        <form action="login.php" method="post" class="row g-4">
        
            <div class="mx-auto" style="width: 150px;"><br><br><br>
                <img src="Untitlefgffd.png" alt="Logo" width="120px" height="120px">
            </div>
            <div class="col-mr-2">
                <label for="studentID">Student ID</label>
                <input type="number" name="studentID" id="studentID" class="form-control" required>  
            </div><br>

            <div class="col-mr-2">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" required>    
            </div><br><br><br>

            <div class="mx-auto" style="width: 110px;">
            <button type="submit" class="btn btn-primary">Login </button>
            </div>
            
            
        </form>
        <br>
        <div class="mx-auto" style="width: 90px;">
                <a href="index.php"><button class="btn btn-primary">Register</button></a>
            </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>