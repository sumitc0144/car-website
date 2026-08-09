<?php
$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';

if (!empty($username) && !empty($password)) {
    // Connect to MySQL
    $conn = new mysqli("localhost", "root", "", "mydb");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Hash the password before storing (recommended)
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Use prepared statement to prevent SQL injection
    $stmt = $conn->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    $stmt->bind_param("ss", $username, $hashedPassword);

    if ($stmt->execute()) {
        echo "Registration successful! <a href='login.html'>Login Now</a>";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
    $conn->close();
} else {
    echo "Please enter both username and password.";
}
?>
