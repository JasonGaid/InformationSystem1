<?php
$hostname = 'localhost';
$username = 'root'; // Change this if you have a different MySQL username
$password = ''; // Change this if your MySQL password is different
$database = 'jasongaid'; // Change this to your database name

$conn = mysqli_connect($hostname, $username, $password, $database);

if (!$conn) {
    die('Connection failed: ' . mysqli_connect_error());
}
?>
