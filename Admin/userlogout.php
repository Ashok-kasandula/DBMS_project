<?php
// Start session
session_start();

if(isset($_SESSION['user_id'])) {
    
    $_SESSION = array();
    session_destroy();

    header("location:c:xampp/htdocs/DBMS_project/logi.php"); 
    exit;
} else {
    header("location:c:xampp/htdocs/DBMS_project/logi.php"); 
    exit;
}
?>
