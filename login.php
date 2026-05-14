<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $valid = false;

    // Check users.txt for credentials
    $file = fopen("users.txt", "r");
    while (!feof($file)) {
        $line = fgets($file);
        $user = explode("|", trim($line));
        if (count($user) == 2 && $user[0] == $username && $user[1] == $password) {
            $valid = true;
            break;
        }
    }
    fclose($file);

    if ($valid==true) {
        header("Location: car.html");  // redirect to another HTML page
        exit();
    } else {
        echo "Invalid Username or Password! <a href='login.html'>Try Again</a>";
    }
}
?>