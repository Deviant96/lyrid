<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Success</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1>Login Successful</h1>
        <p>Welcome, <?= htmlspecialchars($_SESSION['user_username']) ?>!</p>
        <a href="logout.php" class="btn btn-primary">Logout</a>
    </div>
</body>
</html>
