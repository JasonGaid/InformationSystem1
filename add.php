<?php include 'config.php'; ?>

<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $subject = $_POST['subject'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $room = $_POST['room'];
    $instructor = $_POST['instructor'];

    $sql = "INSERT INTO schedules (subject, day, time, room, instructor) VALUES ('$subject', '$day', '$time', '$room', '$instructor')";
    if (mysqli_query($conn, $sql)) {
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>