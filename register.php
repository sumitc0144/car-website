<?php
$username = $_GET['username'] ?? '';
$password = $_GET['password'] ?? '';

if (!empty($username) && !empty($password)) {
    $file = fopen("users.txt", "a");
    fwrite($file, $username . "|" . $password . "\n");
    fclose($file);
    echo "Registration successful! <a href='login.html'>Login Now</a>";
} else {
    echo "Please enter both username and password.";
}
?>