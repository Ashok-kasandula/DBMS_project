<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "login";

$conn = new mysqli($host, $username, $password, $database,3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>