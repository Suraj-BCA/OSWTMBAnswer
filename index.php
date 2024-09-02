<?php
// Redirect users to the dashboard if they are already logged in
session_start();
if (isset($_SESSION['user_id'])) {
    header('Location: dashboard.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitness Tracking Platform</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            max-width: 500px;
            width: 90%;
        }
        h1 {
            color: #007bff;
            margin-bottom: 20px;
        }
        p {
            color: #555;
            margin-bottom: 20px;
        }
        a {
            text-decoration: none;
            color: #007bff;
            margin: 0 10px;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
        .btn {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin: 5px;
        }
        .btn:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Welcome to the Fitness Tracking Platform</h1>
        <p>Your go-to place for tracking fitness activities, setting goals, and connecting with other fitness enthusiasts.</p>
        
        <a href="register.php" class="btn">Register</a>
        <a href="login.php" class="btn">Login</a>

        <p>Already have an account? <a href="login.php">Login here</a></p>
        <p>New user? <a href="register.php">Register here</a></p>
    </div>
</body>
</html>
