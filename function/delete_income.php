<?php
    require 'db_connect.php';
    $income_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_income WHERE income_id='$income_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/income_manager.php");
?>