<?php
session_start(); // Start the session

// Define a mock user (in a real app, retrieve these from a database)
$Username = "Admin";
$Password = "password"; // Note: in a real app, use hashed passwords

// Check if the user is already logged in
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
    header("Location: home.php");
    exit;
}

// Process the login form submission
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $username = filter_input(INPUT_POST, 'username', FILTER_SANITIZE_STRING);
    $password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
    $remember = filter_input(INPUT_POST, 'remember', FILTER_SANITIZE_STRING);

    // Validate the input against mock data
    if ($username === $Username && $password === $Password) {
        // Set session variable
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;

        // Set a cookie if 'Remember me' is checked
        if ($remember === "on") {
            setcookie("username", $username, time() + (86400 * 30), "/"); // 30 days
        }
        header("Location: home.php");
        exit;
    } else {
        $error = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="outer-div">
        <div class="first-layer-div">
            <h2>Login</h2>
        </div>
        <div class="second-layer-div">
            <?php if (!empty($error)) echo "<p style='color:red;'>$error</p>"; ?>
            <form method="post" action="">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required><br>

            <label for="password">Password:</label>
            <input type="password" id="password" name="password" required><br>

            <label for="remember">Remember me:</label>
            <input type="checkbox" id="remember" name="remember"><br>

            <input type="submit" value="Login">
            </form>
        </div>
    </div>
    
</body>
</html>
