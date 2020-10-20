<?php
$servername = "localhost";
$username = "naim_abbasi";
$password = "P@ssw0rd";
$dbname = "BookStore";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>