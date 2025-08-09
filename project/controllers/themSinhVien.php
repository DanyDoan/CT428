<?php
require_once("../config/db.php");
if (
    empty($_POST["MSSV"])
    || empty($_POST["hoTen"])
    || empty($_POST["ngaySinh"])
    || empty($_POST["gioiTinh"])
) {
    die(json_encode(["status" => "fail"]));
}

$stm = $conn->prepare("INSERT INTO SINHVIEN 
                             (MSSV, hoTen, ngaySinh, gioiTinh, truong, maLop)
                             VALUES ( ?, ?, ?, ?, ?, ?, ?)");
$stm->bind_param("sssssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["ngaySinh"], $_POST["gioiTinh"],  $_POST["tenTruong"], $_POST["maLop"], $_POST["khoa"]);



try {
    $stm->execute();
    $query = "SELECT * FROM SINHVIEN";
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode(["status" => "success", "data" => $output]);
} catch (mysqli_sql_exception) {
    $query = "SELECT * FROM SINHVIEN";
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    if ($stm->errno == 1062)
        echo json_encode(["status" => "existed", "data" => $output]);
    else
        echo json_encode(["status" => "fail", "data" => $output]);
}
