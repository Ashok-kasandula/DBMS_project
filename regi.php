<?php

include 'connection.php';

if (isset($_POST['signUp'])) {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $phone    = $_POST['phone'];
    $address  = $_POST['address'];
    $date     = $_POST['dob']; 
    $email    = $_POST['email'];

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT * FROM registration WHERE email = ? AND password= ?  ");
    $checkEmail->bind_param("ss", $email,$password);
    $checkEmail->execute();
    $result = $checkEmail->get_result();
   
    if ($result->num_rows > 0) {
        echo "Email address or password already exists";
    } else {
       $insertQuery="INSERT INTO registration(username,password,phone,address,date,email) VALUES('$username','$password','$phone','$address','$date','$email')";
       if($conn->query($insertQuery)==TRUE){
        echo "registration successful";
        header("location:logi.php");
       }
       else{
        echo "Error inserting data";
       }
    }
    $checkEmail->close();
}

if (isset($_POST['signIn'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Check if user exists with the provided email and password
    $stmt = $conn->prepare("SELECT * FROM registration WHERE email = ? AND password = ? ");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['user_id'] = $row['user_id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['username'] = $row['username']; // Adding the username to the session
        header("Location: userDash.php");
        exit();
    } else {
        echo "Incorrect email or password";
    }
    $stmt->close();
}

$conn->close();
?>
