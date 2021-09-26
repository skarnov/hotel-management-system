<?php
    session_start();

    require 'db_connect.php';
    
    $user_name = filter_input(INPUT_POST, 'user_name');
    $user_password = filter_input(INPUT_POST, 'user_password');

    $sql = "SELECT * FROM tbl_user WHERE user_name='$user_name' AND user_password='$user_password' ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['user_id'];

    if ($active) {
        $_SESSION["user_id"] = $active;  
        header("location: ../dashboard.php");
    }
    else {
        header("location: ../index.php");
    }
?>