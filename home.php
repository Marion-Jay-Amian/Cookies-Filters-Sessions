<?php
session_start();

// Redirect to login page if not logged in
if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header("Location: login.php");
    exit;
}

// Check if there’s a cookie for the user
$username = isset($_COOKIE['username']) ? $_COOKIE['username'] : $_SESSION['username'];

date_default_timezone_set('Asia/Manila');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Home</title>
   <link rel="stylesheet" href="home.css">
</head>
<body>
    <div class="container">
        <h2>Welcome, <?php echo htmlspecialchars($username); ?>!</h2>
        <p>You have successfully logged in.</p>

        <div class="info-section">
            <p>Today is <?php echo date("l, F j, Y - g:i A"); ?>.</p>
            <p>We’re glad to have you back!</p>
        </div>

        <form method="post" action="logout.php" class="logout-form">
            <input type="submit" value="Logout">
        </form>
    </div>
</body>
</html>
