<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate user input (you should perform more extensive validation)
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    // You should add more robust validation and error handling here.
    // Ensure the username is unique, and perform password strength validation.

    // Hash the password (use a strong hashing algorithm like password_hash)
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT);

    // Create a database connection (update with your database details)
    $host = "AKKUABHIJITH";
    $dbname = "hostial_management";
    $username = "root@localhost";
    $password = "Abhijith@20";

    try {
        $pdo = new PDO("mysql:host=AKKUABHIJITH;dbname=$hostial_management", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        // Insert user data into the database
        $query = "INSERT INTO Users (username, password, email) VALUES (:username, :password, :email)";
        $stmt = $pdo->prepare($query);
        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":password", $hashedPassword);
        $stmt->bindParam(":email", $email);
        $stmt->execute();

        // Redirect to a success page or login page
        header("Location: login.php");
        exit();
    } catch (PDOException $e) {
        // Handle database connection or query errors
        echo "Error: " . $e->getMessage();
    }
}
?>
