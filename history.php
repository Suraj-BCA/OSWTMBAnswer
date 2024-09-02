<?php
session_start();
include 'db.php';

// Check if user is logged in
if (!isset($_SESSION['user_id'])) {
    header('Location: login.php');
    exit();
}

// Handle deletion request
if (isset($_GET['delete'])) {
    $activity_id = $_GET['delete'];
    $sql = "DELETE FROM fitness_activities WHERE activity_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $activity_id);

    if ($stmt->execute()) {
        $message = "Activity deleted successfully!";
    } else {
        $message = "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Retrieve message if set
$message = isset($message) ? $message : '';

$user_id = $_SESSION['user_id'];

$sql = "SELECT * FROM fitness_activities WHERE user_id = $user_id ORDER BY activity_date DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Activity History</title>
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
            width: 80%;
            max-width: 1000px;
        }
        h2 {
            color: #333;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #007bff;
            color: #fff;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .button {
            background-color: #dc3545;
            color: white;
            border: none;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 12px;
            border-radius: 4px;
            cursor: pointer;
        }
        .button:hover {
            background-color: #c82333;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Activity History</h2>
        <table>
            <tr>
                <th>Activity Type</th>
                <th>Duration</th>
                <th>Distance</th>
                <th>Calories Burned</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo htmlspecialchars($row['activity_type']); ?></td>
                <td><?php echo htmlspecialchars($row['duration']); ?> minutes</td>
                <td><?php echo htmlspecialchars($row['distance']); ?> km</td>
                <td><?php echo htmlspecialchars($row['calories_burned']); ?> kcal</td>
                <td><?php echo htmlspecialchars($row['activity_date']); ?></td>
                <td>
                    <form method="GET" style="display:inline;">
                        <input type="hidden" name="delete" value="<?php echo htmlspecialchars($row['activity_id']); ?>">
                        <button type="submit" class="button" onclick="return confirm('Are you sure you want to delete this activity?');">Delete</button>
                    </form>
                </td>
            </tr>
            <?php } ?>
        </table>
    </div>
    <script>
        // Display alert message if any
        <?php if ($message) { ?>
            alert("<?php echo addslashes($message); ?>");
        <?php } ?>
    </script>
</body>
</html>
