<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <h2>Login</h2>
        <form method="post" action="verify.php">
            <label for="username">Username:</label>
            <input type="text" name="username" required>
            <label for="password">Password:</label>
            <input type="password" name="password" required>
            <input type="hidden" name="action" value="login">
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up here</a>.</p>
        <?php
        if (isset($_SESSION['error'])) {
            echo "<h4 style='color:red;'><center>" . $_SESSION['error'] . "</center></h4>";
            unset($_SESSION['error']);
        }
        ?>
    </div>
</body>

</html>