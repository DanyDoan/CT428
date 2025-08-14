<?php
require_once("../config/db.php");
header("Content-type: application/json");

if (!isset($_POST["maKhoaTruong"])) {
    echo json_encode(["data" => []]);
    exit;
}

$maKhoaTruong = $_POST["maKhoaTruong"];

$stmt = $conn->prepare("
    SELECT a.maLop, a.tenLop 
    FROM LOP a
    WHERE a.maKhoaTruong = ?
    AND a.maLop NOT IN (SELECT c.maLop FROM LOP c JOIN CANBO d ON c.maLop = d.maLop)
    ORDER BY a.tenLop
");

$stmt->bind_param("s", $maKhoaTruong);
$stmt->execute();
$result = $stmt->get_result();

$data = $result->fetch_all(MYSQLI_ASSOC);
echo json_encode(["data" => $data]);
