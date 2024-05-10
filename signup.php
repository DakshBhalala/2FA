<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Sign Up</title>
</head>

<body>
    <div class="container">
        <h2>Sign Up</h2>
        <form method="POST" action="add.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="email">Email:</label>
            <input type="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" name="confirm_password" required>
            <input type="hidden" name="action" value="signup">
            <button type="submit" onclick="validatePassword()">Sign Up</button>
        </form>

        <p>Already have an account? <a href="login.php">Login here</a>.</p>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<h4 style='color:red;'><center>" . $_SESSION['error'] . "</center></h4>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
</body>

</html>