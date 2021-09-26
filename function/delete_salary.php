<?php
    require 'db_connect.php';
    $salary_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_salary WHERE salary_id='$salary_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/payroll_manager.php");
?>