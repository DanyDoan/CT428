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
                             (MSSV, hoTen, ngaySinh, gioiTinh, truong, tenLop, khoa)
                             VALUES ( ?, ?, ?, ?, ?, ?, ?)");
$stm->bind_param("sssssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["ngaySinh"], $_POST["gioiTinh"],  $_POST["tenTruong"], $_POST["tenLop"], $_POST["khoa"]);
// if ($stm->execute()) {
//     $query = "SELECT * FROM SINHVIEN";
//     $result = $conn->query($query);
//     $output = $result->fetch_all(MYSQLI_ASSOC);
//     echo json_encode(["status" => "success", "data" => $output]);
// } else {
//     if ($stm->errno == 1062) { // 1062: Duplicate entry for key PRIMARY or UNIQUE
//         die(json_encode(["status" => "existed", "data" => $output]));
//     } else {
//         die(json_encode(["status" => "fail", "data" => $output]));
//     }
// }

$query = "SELECT * FROM SINHVIEN";
$result = $conn->query($query);
$output = $result->fetch_all(MYSQLI_ASSOC);

try {
    $stm->execute();
    echo json_encode(["status" => "success", "data" => $output]);
} catch (mysqli_sql_exception) {
    if ($stm->errno == 1062)
        echo json_encode(["status" => "existed", "data" => $output]);
    else
        echo json_encode(["status" => "fail", "data" => $output]);
}
