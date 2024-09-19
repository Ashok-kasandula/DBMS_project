<?php
$host = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "login";

$conn = new mysqli($host, $username, $password, $database,3307);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$cart_data = array();

// Fetch rooms data
$sql = "SELECT 'Room Booking' AS name, price, num_rooms AS quantity FROM rooms";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $row['type'] = 'rooms';  
    $row['subtotal'] = $row['price'] * $row['quantity'];
    array_push($cart_data, $row);
}

// Fetch food data
$sql = "SELECT name, price, quantity FROM food";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $row['type'] = 'food';  
    $row['subtotal'] = $row['price'] * $row['quantity'];
    array_push($cart_data, $row);
}

// Fetch party hall data
$sql = "SELECT 'Party Hall Booking' AS name, price, num_halls AS quantity FROM party_hall";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $row['type'] = 'party_hall';  
    $row['subtotal'] = $row['price'] * $row['quantity'];
    array_push($cart_data, $row);
}

// Fetch swimming pool data
$sql = "SELECT 'Swimming Pool Booking' AS name, price, num_pools AS quantity FROM swimming_pool";
$result = $conn->query($sql);
while($row = $result->fetch_assoc()) {
    $row['type'] = 'swimming_pool';  
    $row['subtotal'] = $row['price'] * $row['quantity'];
    array_push($cart_data, $row);
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart Page</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #99a6f0;
            margin: 0;
            padding: 20px;
        }
        .cart-container {
            background-color: #fff;
            background: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
        }
        .cart-header {
            font-size: 24px;
            margin-bottom: 20px;
        }
        .cart-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px 0;
            border-bottom: 1px solid #eee;
        }
        .cart-item:last-child {
            border-bottom: none;
        }
        .cart-item img {
            width: 50px;
            height: auto;
            margin-right: 20px;
        }
        .cart-item-info {
            flex-grow: 1;
        }
        .cart-item-info h4 {
            margin: 0;
        }
        .cart-item-info p {
            margin: 5px 0 0;
            color: #888;
        }
        .cart-item-price {
            font-size: 16px;
            font-weight: bold;
        }
        .cart-item-quantity {
            display: flex;
            align-items: center;
        }
        .cart-item-quantity button {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 5px 10px;
            cursor: pointer;
        }
        .cart-item-quantity input {
            width: 30px;
            text-align: center;
            border: 1px solid #ddd;
            margin: 0 5px;
        }
        .cart-total {
            display: flex;
            justify-content: space-between;
            font-size: 18px;
            font-weight: bold;
            margin: 20px 0;
        }
        .checkout-button {
            display: block;
            width: 100%;
            padding: 10px;
            background-color: #28a745;
            color: #fff;
            text-align: center;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 16px;
        }
        .remove-button {
            background: none;
            border: none;
            color: red;
            cursor: pointer;
        }
    </style>
</head>
<body>

<div class="cart-container">
    <div class="cart-header">Shopping Cart</div>

    <div id="cart-items">
        <?php 
            $total_cost = 0;
            foreach($cart_data as $item) {
                echo "<div class='cart-item' data-type='{$item['type']}' data-name='{$item['name']}'>";
                echo "<div class='cart-item-info'>";
                echo "<h4>{$item['name']}</h4>";
                echo "</div>";
                echo "<div class='cart-item-quantity'>";
                echo "<input type='number' value='{$item['quantity']}' min='1'>";
                echo "</div>";
                echo "<div class='cart-item-price'>Rs" . number_format($item['price'], 2) . "</div>";
                echo "<button class='remove-button' onclick='removeItem(this)'>Remove</button>";
                echo "</div>";
                $total_cost += $item['subtotal'];
            }
        ?>
    </div>

    <div class="cart-total">
        <div>Sub-Total</div>
        <div>Rs<span id="total-cost"><?php echo number_format($total_cost, 2); ?></span></div>
    </div>

    <button class="checkout-button" id="proceed-to-pay">Proceed to pay</button>
</div>

<script>
    function updateQuantity(button, change) {
        let quantityInput = button.parentElement.querySelector('input');
        let newQuantity = parseInt(quantityInput.value) + change;
        if (newQuantity < 1) newQuantity = 1;
        quantityInput.value = newQuantity;
        updateCart();
    }

    function removeItem(button) {
        let cartItem = button.parentElement;
        let itemType = cartItem.getAttribute('data-type');
        let itemName = cartItem.getAttribute('data-name');

        fetch('remove_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ type: itemType, name: itemName })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                cartItem.remove();
                updateCart();
            } else {
                alert('Failed to remove item.');
            }
        });
    }

    function updateCart() {
        let cartItems = document.querySelectorAll('.cart-item');
        let totalCost = 0;
        cartItems.forEach(item => {
            let price = parseFloat(item.querySelector('.cart-item-price').textContent.replace('Rs', ''));
            let quantity = parseInt(item.querySelector('input').value);
            totalCost += price * quantity;
        });
        document.getElementById('total-cost').textContent = totalCost.toFixed(2);
    }

    document.getElementById('proceed-to-pay').addEventListener('click', () => {
        window.location.href = 'pay.html';
    });
</script>

</body>
</html>
