<?php
    session_start();

    require 'db_connect.php';
    
    $admin_email = filter_input(INPUT_POST, 'admin_email');
    $admin_password = filter_input(INPUT_POST, 'admin_password');

    $sql = "SELECT * FROM tbl_admin WHERE admin_email='$admin_email' AND admin_password='$admin_password' ";

    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
    $active = $row['admin_name'];
    $count = mysqli_num_rows($result);
    
    if ($count == 1) {
        $_SESSION["admin_name"] = $row['admin_name'];    
        header("location: ../admin/dashboard.php");
    } 
    
    else {
        header("location: ../admin/");
    }
?>