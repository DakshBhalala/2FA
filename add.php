<?php
require ("login.php");
session_start();

$servername = "localhost";
$username = "root";
$dbname = "mp";

$conn = new mysqli(
    $servername,
    $username,
    "",
    $dbname
);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["username"];
$email = $_POST["email"];
$pass = $_POST["password"];
$flage = 0;

if (!preg_match("/^([a-z0-9+-]+)(. [a-z0-9+_-]+)*@([a-z0-9-]+.)+[ a-z]{2,6}$/ix", $email)) {
    $flage = 1;
    $_SESSION['error'] = "Invalid email.";
    header("Location: signup.php");
} elseif ($pass != $_POST["confirm_password"]) {
    $flage = 1;
    $_SESSION['error'] = "Write same password in password and confirm_password.";
    header("Location: signup.php");
}

if ($flage == 0) {
    $sqlquery = "INSERT INTO users (username, email, password) values('$user', '$email', '$pass')";

    if ($conn->query($sqlquery) === TRUE) {
        header("Location: login.php");
        exit;
    }
}
header("Location: signup.php");