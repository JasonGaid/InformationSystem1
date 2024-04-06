<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Schedule</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            text-align: center;
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: inline-block;
            width: 100px;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 120px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "SELECT * FROM schedules WHERE id=$id";
    $result = mysqli_query($conn, $sql);
    $schedule = mysqli_fetch_assoc($result);
}
?>

<div class="container">
    <h2>Edit Schedule</h2>
    <form action="update.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $schedule['id']; ?>">
        <label>Subject:</label>
        <input type="text" name="subject" value="<?php echo $schedule['subject']; ?>" required><br>
        <label>Day:</label>
        <input type="text" name="day" value="<?php echo $schedule['day']; ?>" required><br>
        <label>Time:</label>
        <input type="text" name="time" value="<?php echo $schedule['time']; ?>" required><br>
        <label>Room:</label>
        <input type="text" name="room" value="<?php echo $schedule['room']; ?>" required><br>
        <label>Instructor:</label>
        <input type="text" name="instructor" value="<?php echo $schedule['instructor']; ?>" required><br>
        <input type="submit" value="Update Schedule">
    </form>
</div>

</body>
</html>
