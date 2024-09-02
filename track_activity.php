<?php
session_start();
include 'db.php';

if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $activity_type = $_POST['activity_type'];
    $duration = $_POST['duration'];
    $distance = $_POST['distance'];
    $calories_burned = $_POST['calories_burned'];
    $activity_date = $_POST['activity_date'];
    $user_id = $_SESSION['user_id'];

    $sql = "INSERT INTO fitness_activities (user_id, activity_type, duration, distance, calories_burned, activity_date)
            VALUES ('$user_id', '$activity_type', '$duration', '$distance', '$calories_burned', '$activity_date')";
    
    if ($conn->query($sql) === TRUE) {
        echo "<script>alert('Activity logged successfully.');</script>";
    } else {
        echo "<script>alert('Error: " . $conn->error . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Track Activity</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .form-container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            width: 90%;
            max-width: 500px;
            text-align: center;
        }

        h2 {
            color: #333;
            margin-bottom: 20px;
        }

        label {
            display: block;
            text-align: left;
            color: #555;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #28a745;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            transition: background-color 0.3s ease;
        }

        input[type="submit"]:hover {
            background-color: #218838;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Track Your Activity</h2>
        <form method="POST">
            <label>Activity Type:</label>
            <input type="text" name="activity_type" required>
            <label>Duration (minutes):</label>
            <input type="number" name="duration" required>
            <label>Distance (km):</label>
            <input type="number" step="0.01" name="distance" required>
            <label>Calories Burned:</label>
            <input type="number" step="0.01" name="calories_burned" required>
            <label>Date:</label>
            <input type="date" name="activity_date" required>
            <input type="submit" value="Log Activity">
        </form>
    </div>
</body>
</html>
