<?php
    require 'db_connect.php';
    $employee_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_employee WHERE employee_id='$employee_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/hrm_manager.php");
?>