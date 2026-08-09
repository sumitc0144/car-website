<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "", "mydb");
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepared statement to prevent SQL injection
    $stmt = $conn->prepare("SELECT password FROM users WHERE username = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($db_password);
        $stmt->fetch();

        // If you stored plain text passwords (not recommended):
        // if ($password === $db_password) { ... }

        // If you stored hashed passwords (recommended):
        if (password_verify($password, $db_password)) {
            header("Location: car.html");  // redirect to another page
            exit();
        } else {
            echo "Invalid Username or Password! <a href='login.html'>Try Again</a>";
        }
    } else {
        echo "Invalid Username or Password! <a href='login.html'>Try Again</a>";
    }

    $stmt->close();
    $conn->close();
}
?>
