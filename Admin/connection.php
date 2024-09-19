<?php
$host = "localhost"; 
$name = "root"; 
$password = ""; 
$database = "login";

$conn = new mysqli($host, $name, $password, $database,3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>