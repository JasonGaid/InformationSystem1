<?php include 'config.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subject Schedule App</title>
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

        h1, h2 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #f2f2f2;
        }

        form {
            margin-top: 20px;
            margin-bottom: 20px;
        }

        form label {
            display: inline-block;
            width: 100px;
        }

        form input[type="text"] {
            width: calc(100% - 120px);
            padding: 8px;
            margin-bottom: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        form input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        form input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

<?php include 'config.php'; ?>

<div class="container">
    <h1>Subject Schedule App</h1>

    <!-- Search Form -->
    <form action="index.php" method="GET">
        <label for="search">Search:</label>
        <input type="text" name="search" id="search" placeholder="Enter keyword...">
        <input type="submit" value="Search">
    </form>

    <!-- Display Schedules -->
    <h2>Schedules</h2>
    <table>
        <tr>
            <th>Subject</th>
            <th>Day</th>
            <th>Time</th>
            <th>Room</th>
            <th>Instructor</th>
            <th>Action</th>
        </tr>
        <?php
        // Check if search parameter is set
        if (isset($_GET['search']) && !empty($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM schedules WHERE subject LIKE '%$search%' OR day LIKE '%$search%' OR time LIKE '%$search%' OR room LIKE '%$search%' OR instructor LIKE '%$search%'";
        } else {
            $sql = "SELECT * FROM schedules";
        }
        
        $result = mysqli_query($conn, $sql);
        if ($result && mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>".$row['subject']."</td>";
                echo "<td>".$row['day']."</td>";
                echo "<td>".$row['time']."</td>";
                echo "<td>".$row['room']."</td>";
                echo "<td>".$row['instructor']."</td>";
                echo "<td><a href='edit.php?id=".$row['id']."'>Edit</a> | <a href='delete.php?id=".$row['id']."'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6'>No schedules found</td></tr>";
        }
        ?>
    </table>

    <!-- Add Schedule Form -->
    <h2>Add Schedule</h2>
    <form action="add.php" method="POST">
        <label>Subject:</label>
        <input type="text" name="subject" required><br>
        <label>Day:</label>
        <input type="text" name="day" required><br>
        <label>Time:</label>
        <input type="text" name="time" required><br>
        <label>Room:</label>
        <input type="text" name="room" required><br>
        <label>Instructor:</label>
        <input type="text" name="instructor" required><br>
        <input type="submit" value="Add Schedule">
    </form>
</div>

</body>
</html
