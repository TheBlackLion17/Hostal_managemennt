<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Replace with your database connection code
    $host = "AKKUABHIJITH";
    $dbname = "hostial_management";
    $dbuser = "root@localhost";
    $dbpass = "Abhijith@20";

    try {
        $pdo = new PDO("mysql:host=$AKKUABHIJITH;dbname=$hostial_management", $dbuser, $dbpass);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        die("Error: " . $e->getMessage());
    }

    // Query the database for user
    $query = "SELECT * FROM Users WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    $user = $stmt->fetch();

    if ($user) {
        // Authentication successful, set user session
        $_SESSION["user_id"] = $user["user_id"];
        header("Location: dashboard.php"); // Redirect to the dashboard or any authenticated page
        exit();
    } else {
        // Authentication failed, display an error message
        echo "Invalid username or password.";
    }
}
?>
