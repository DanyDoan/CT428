<?php
    require_once("../config/db.php");
    header("Content-type: application/json");

    $maKhoaTruong = $_POST["maKhoaTruong"];
    $result = $conn->query("SELECT a.maLop, a.tenLop FROM LOP a
                            JOIN KHOATRUONG b ON a.maKhoaTruong = b.maKhoaTruong
                            WHERE b.maKhoaTruong = '$maKhoaTruong'
                            ORDER BY b.maKhoaTruong");
    $result = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(["data" =>$result]);
?>