<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Authentication</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('background.jpg');
            background-size: cover;
            background-position: center;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .container {
            text-align: center;
            background: rgba(255, 255, 255, 0.8); 
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            color: #666;
            font-weight: bold;
        }

        input[type="text"] {
            width: calc(100% - 22px);
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 14px;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 14px;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error {
            color: red;
            margin-top: 10px;
        }
    </style>
</head>
<body style="background-image: url('background.jpg');">
    <div class="container">
        <h2>Enter Unique Code</h2>
        <?php
        // Check if form is submitted
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Database connection parameters
            $host = "localhost";
            $username = "root";
            $password = "";
            $dbname = "login";

            // Create connection
            $conn = new mysqli($host, $username, $password, $dbname,3307);

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Retrieve code from form submission
            $entered_code = $_POST['code'];

            // Prepare SQL statement to fetch code from database
            $stmt = $conn->prepare("SELECT id FROM Unicode WHERE code = ?");
            $stmt->bind_param("s", $entered_code);

            // Execute the query
            $stmt->execute();

            // Bind result variables
            $stmt->bind_result($id);

            // Fetch value
            $stmt->fetch();

            // Close statement
            $stmt->close();

            // Check if a row was found
            if ($id) {
                // Code exists, redirect to adminRegFront.php
                header("Location: adminRegFront.php");
                exit();
            } else {
                // Code does not exist, display error message
                echo "<p class='error'>Invalid code. Please try again.</p>";
            }

            // Close database connection
            $conn->close();
        }
        ?>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <label for="code">Enter Code:</label>
            <input type="password" id="code" name="code" required>
            <br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
