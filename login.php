<?php
session_start();

// Check if the user is already logged in (optional)
if (isset($_SESSION["user_id"])) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Validate credentials and authenticate the user (check the database)
    // If authentication is successful, set up a session
    if ($username == "example" && $password == "password") {
        $_SESSION["user_id"] = 1; // You can store the user's ID in the session
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Invalid credentials"; // Handle authentication failure
    }
}
