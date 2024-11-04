<?php
session_start();
session_unset(); // Unset all session variables
session_destroy(); // Destroy the session

// Clear the cookie
setcookie("username", "", time() - 3600, "/"); // Delete cookie

header("Location: login.php");
exit;

