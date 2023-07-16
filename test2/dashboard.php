<?php
session_start();

// Redirect the user to the login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}

$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
</head>
<body>
    <h2>Welcome, <?php echo $username; ?>, to your dashboard!</h2>
    <p>This is your secure dashboard page.</p>
    <a href="logout.php">Logout</a>
</body>
</html>
