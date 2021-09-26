<?php

    require 'db_connect.php';
    $booking_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_package WHERE booking_id='$booking_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/package_booking_manager.php");
?>