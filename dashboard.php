<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            padding: 20px;
            width: 400px;
            text-align: center;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        a {
            color: #007bff;
            text-decoration: none;
            margin: 0 10px;
            font-size: 16px;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Welcome to Your Dashboard</h2>
        <a href="track_activity.php">Log New Activity</a> | 
        <a href="history.php">View Activity History</a> | 
        <a href="logout.php">Logout</a>
    </div>
</body>
</html>
