<?php
    require 'db_connect.php';
    $room_id = filter_input(INPUT_GET, 'id');
    $sql = "DELETE FROM tbl_room WHERE room_id='$room_id'";
    mysqli_query($conn, $sql);
    header("Location: ../admin/room_manager.php");
?>