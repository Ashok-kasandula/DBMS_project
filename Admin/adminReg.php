<?php

include 'connection.php';

if (isset($_POST['signUp'])) {
    $Name = $_POST['Name'];
    $password = $_POST['password']; 
    $phone    = $_POST['phone'];
    $email    = $_POST['email'];

    // Check if email already exists
    $checkEmail = $conn->prepare("SELECT * FROM adminreg WHERE email = ? AND password= ?");
    $checkEmail->bind_param("ss", $email,$password);
    $checkEmail->execute();
    $result = $checkEmail->get_result();

    if ($result->num_rows > 0) {
        echo "Email address or password already exists";
    } else {
       $insertQuery="INSERT INTO adminreg(name,password,phone,email) VALUES('$Name','$password','$phone','$email')";
       if($conn->query($insertQuery)==TRUE){
        echo "registration successful";
        header("location:admin.php");
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
    $stmt = $conn->prepare("SELECT * FROM adminreg WHERE email = ? AND password = ?");
    $stmt->bind_param("ss", $email, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION['adminId']=$row['adminId'];
        $_SESSION['email'] = $row['email'];
        // Redirect to dashboard page after successful signin
        header("Location: userData.php");
        exit();
    } else {
        echo "Incorrect email or password";
    }
    $stmt->close();
}

$conn->close();
?>
