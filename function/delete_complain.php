<?php

    require 'db_connect.php';
    $complain_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_complain WHERE complain_id='$complain_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/");
?>