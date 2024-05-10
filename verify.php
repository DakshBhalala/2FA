<?php
require ("login.php");
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mp";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$user = $_POST["username"];
$pass = $_POST["password"];
$flage = 0;


$query = "SELECT * FROM `users`";

if ($is_query_run = mysqli_query($conn, $query)) {
    while ($query_executed = $is_query_run->fetch_assoc()) {
        if ($query_executed['username'] == $user) {
            $flage = 1;
            if ($query_executed['password'] == $pass) {
                $temp = $query_executed['email'];
                $flage = 2;
                break;
            }
        }
    }
} else {
    echo "Error in execution!";
}

if ($flage == 2) {
    session_start();

    $_SESSION['user'] = $user;
    $_SESSION['email'] = $temp;

    header("Location: send_email.php");
    exit;
} elseif ($flage == 1) {
    $_SESSION['error'] = "Enter valid password";
    header("Location: login.php");
} elseif ($flage == 0) {
    $_SESSION['error'] = "User does not exicit please signup before login.";
    header("Location: login.php");
} else {
    header("Location: login.php");
}