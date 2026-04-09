<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "quan_ly_khoa_hoc";
// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}