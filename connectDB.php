<?php
/* Database connection settings */
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "pdp_itclub";

$conn = mysqli_connect($servername, $username, $password, $dbname);
// mysqli_set_charset($conn, 'UTF8');
$conn->set_charset("utf8");
if ($conn->connect_error) {
    die("Database Connection failed: " . $conn->connect_error);
}
