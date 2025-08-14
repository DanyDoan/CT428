<?php
    require_once("../config/db.php");
    header("Content-Type: application/json");
    $query = "SELECT a.thoiGian, a.MSCB, b.hoTen, a.moTa, a.MSSV FROM LOG a
              JOIN CANBO b ON a.MSCB = b.MSCB
              WHERE b.MSCB != '000000'";
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(["data" => $output]);
?>