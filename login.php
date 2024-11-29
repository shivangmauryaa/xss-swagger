<?php
// Start session
session_start();

// Check if the user is already logged in, redirect to dashboard
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>

    <h2>Login</h2>

    <?php
    // Display error message if any
    if (isset($_GET['error'])) {
        echo "<p style='color:red;'>Invalid username or password</p>";
    }
    ?>

    <form action="login_process.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit">Login</button>
    </form>

</body>
</html>
