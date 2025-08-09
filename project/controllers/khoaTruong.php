<?php
    require_once("../config/db.php");
    header("Content-type: application/json");
    $result = $conn->query("SELECT * FROM KHOATRUONG ORDER BY maKhoaTruong");
    $result = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(["data" => $result]);
?>