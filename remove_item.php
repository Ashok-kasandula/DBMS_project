<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "login";

$conn = new mysqli($host, $username, $password, $database,3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$data = json_decode(file_get_contents('php://input'), true);

if (isset($data['type']) && isset($data['name'])) {
    $type = $data['type'];
    $name = $data['name'];
    
    $sql = "";
    switch ($type) {
        case 'rooms':
            $sql = "DELETE FROM rooms WHERE 'Room Booking' = '$name'";
            break;
        case 'food':
            $sql = "DELETE FROM food WHERE name = '$name'";
            break;
        case 'party_hall':
            $sql = "DELETE FROM party_hall WHERE 'Party Hall Booking' = '$name'";
            break;
        case 'swimming_pool':
            $sql = "DELETE FROM swimming_pool WHERE 'Swimming Pool Booking' = '$name'";
            break;
    }
    
    if ($sql && $conn->query($sql) === TRUE) {
        echo json_encode(['success' => true]);
    } else {
        echo json_encode(['success' => false]);
    }
} else {
    echo json_encode(['success' => false]);
}

$conn->close();
?>
