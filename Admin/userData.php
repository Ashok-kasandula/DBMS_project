<?php
session_start();

if (!isset($_SESSION['adminId'])) {
    header("Location: login.php");
    exit();
}

$host = "localhost"; 
$name = "root"; 
$password = ""; 
$database = "login";

$conn = new mysqli($host, $name, $password, $database, 3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// SQL query to retrieve data from all related tables for all users
$sql = "
SELECT r.user_id, r.username, rm.room_no, rm.customer_name, rm.check_in, rm.check_out, rm.num_rooms,rm.price,
       f.name AS food_name, f.price AS food_price, f.quantity AS food_quantity,
       p.num_halls, p.price AS party_hall_price, p.date AS party_hall_date,
       s.pool_no, s.price AS pool_price, s.num_pools, s.date AS pool_date
FROM registration r
LEFT JOIN rooms rm ON r.user_id = rm.room_id
LEFT JOIN food f ON r.user_id = f.ID
LEFT JOIN party_hall p ON r.user_id = p.party_hall_id
LEFT JOIN swimming_pool s ON r.user_id = s.poolLink_id
";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $data[] = $row;
    }
} else {
    $data = [];
}
$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
    <style>
        body {
            font-family: 'Georgia', serif;
            background-color: #f4f4f9;
            color: #333;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            font-size: 2.5em;
            margin-bottom: 20px;
            color: #3a3a3a;
        }
        .user-section {
            border: 1px solid #ddd;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
            padding: 20px;
        }
        .user-section h2 {
            margin: 0 0 15px 0;
            padding: 0;
            font-size: 1.8em;
            color: #2c3e50;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
            color: #333;
        }
    </style>
</head>
<body>
    <h1>Admin Page</h1>
    <?php if (empty($data)) : ?>
        <p>No data found.</p>
    <?php else : ?>
        <?php foreach ($data as $row) : ?>
            <div class="user-section">
                <h2>User: <span><?= htmlspecialchars($row['username']) ?></span> (ID: <span><?= htmlspecialchars($row['user_id']) ?></span>)</h2>

                <table>
                    <tr>
                        <th colspan="2">Room Details</th>
                    </tr>
                    <tr>
                        <td>Room No:</td>
                        <td><?= htmlspecialchars($row['room_no']) ?></td>
                    </tr>
                    <tr>
                        <td>Customer Name:</td>
                        <td><?= htmlspecialchars($row['customer_name']) ?></td>
                    </tr>
                    <tr>
                        <td>Price:</td>
                        <td><?= htmlspecialchars($row['price']) ?></td>
                    </tr>
                    <tr>
                        <td>Check In:</td>
                        <td><?= htmlspecialchars($row['check_in']) ?></td>
                    </tr>
                    <tr>
                        <td>Check Out:</td>
                        <td><?= htmlspecialchars($row['check_out']) ?></td>
                    </tr>
                    <tr>
                        <td>Number of Rooms:</td>
                        <td><?= htmlspecialchars($row['num_rooms']) ?></td>
                    </tr>
                    <tr>
                        <th>Total Room Price:</th>
                        <td><?= htmlspecialchars($row['price'] * $row['num_rooms']) ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan="2">Food Details</th>
                    </tr>
                    <tr>
                        <td>Food Name:</td>
                        <td><?= htmlspecialchars($row['food_name']) ?></td>
                    </tr>
                    <tr>
                        <td>Food Price:</td>
                        <td><?= htmlspecialchars($row['food_price']) ?></td>
                    </tr>
                    <tr>
                        <td>Food Quantity:</td>
                        <td><?= htmlspecialchars($row['food_quantity']) ?></td>
                    </tr>
                    <tr>
                        <th>Total Food Price:</th>
                        <td><?= htmlspecialchars($row['food_price'] * $row['food_quantity']) ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan="2">Party Hall Details</th>
                    </tr>
                    <tr>
                        <td>Number of Halls:</td>
                        <td><?= htmlspecialchars($row['num_halls']) ?></td>
                    </tr>
                    <tr>
                        <td>Party Hall Price:</td>
                        <td><?= htmlspecialchars($row['party_hall_price']) ?></td>
                    </tr>
                    <tr>
                        <td>Party Hall Date:</td>
                        <td><?= htmlspecialchars($row['party_hall_date']) ?></td>
                    </tr>
                    <tr>
                        <th>Total Party Hall Price:</th>
                        <td><?= htmlspecialchars($row['party_hall_price']) ?></td>
                    </tr>
                </table>

                <table>
                    <tr>
                        <th colspan="2">Swimming Pool Details</th>
                    </tr>
                    <tr>
                        <td>Pool No:</td>
                        <td><?= htmlspecialchars($row['pool_no']) ?></td>
                    </tr>
                    <tr>
                        <td>Pool Price:</td>
                        <td><?= htmlspecialchars($row['pool_price']) ?></td>
                    </tr>
                    <tr>
                        <td>Number of Pools:</td>
                        <td><?= htmlspecialchars($row['num_pools']) ?></td>
                    </tr>
                    <tr>
                        <td>Pool Date:</td>
                        <td><?= htmlspecialchars($row['pool_date']) ?></td>
                    </tr>
                    <tr>
                        <th>Total Pool Price:</th>
                        <td><?= htmlspecialchars($row['pool_price'] * $row['num_pools']) ?></td>
                    </tr>
                </table>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
</body>
</html>


   
