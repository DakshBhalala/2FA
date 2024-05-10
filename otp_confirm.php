<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>OTP confirmation</title>
</head>

<body>
    <div class="container">
        <h2>Confirm OTP</h2>
        <form method="post">
            <label for="otp">Enter OTP:</label>
            <input type="number" name="otp" required>
            <input type="hidden" name="action" value="otp">
            <button type="submit">Done</button>
        </form>
        <p>Don't have an account? <a href="signup.html">Sign up here</a>.</p>
        <?php
        if (isset($_POST['otp']) && isset($_SESSION['otp'])) {
            if ($_SESSION['otp'] == $_POST['otp']) {
                session_destroy();
                session_start();

                $_SESSION['Auth'] = 'True';

                header("Location: dashboard.php");
                exit;
            } else {
                echo "<h3 style='color:red;'><center>Enter Valid OTP</center></h3>";
            }
        }
        ?>
    </div>
</body>

</html>