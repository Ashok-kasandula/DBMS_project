<?php
include 'connection.php';

$from = $_GET['from'];
$query = "";

switch ($from) {
    case 'booking.php':
        $query = "SELECT * FROM rooms";
        break;
    case 'foodDetails.html':
        $query = "SELECT * FROM food";
        break;
    case 'partyhall':
        $query = "SELECT * FROM party_hall";
        break;
    case 'swimmingpool':
        $query = "SELECT * FROM swimming_pool";
        break;
    default:
        echo json_encode(["error" => "Invalid request"]);
        exit();
}

$result = $conn->query($query);

if ($result->num_rows > 0) {
    $data = [];
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
    echo json_encode($data);
} else {
    echo json_encode(["error" => "No data found"]);
}

$conn->close();
?>
