<?php
    require 'db_connect.php';
    $expense_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_expense WHERE expense_id='$expense_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/expense_manager.php");
?>