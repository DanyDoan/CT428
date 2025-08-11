<?php
require_once("../config/db.php");
require_once("../models/sinhvien.php");
session_start();
$data = json_decode(file_get_contents("php://input"), true);

$array = "";
if ($data["type"] == 0) {
    $array = ["MSSV", "hoTen", "gioiTinh", "maLop", "khoa"];
    if (empty($data["hoTen"])) {

        $query = "SELECT * FROM SINHVIEN a
                    JOIN LOP b ON a.maLop = b.maLop
                    ORDER BY b.maKhoaTruong, b.maLop, a.khoa, a.MSSV";
        $result = $conn->query($query);
        $result = $result->fetch_all(MYSQLI_ASSOC);
        $output = ["message" => "Không được để trống dữ liệu", "data" => $result];
        echo json_encode($output);
        exit;
    }
} else {

    $array = ["hoTen", "MSSV", "ngaySinh", "soDienThoai", "email", "diaChi", "gioiTinh", "maLop",  "khoa"];
    if (
        empty($data["hoTen"])
        || empty($data["MSSV"])
        || empty($data["soDienThoai"])
        || empty($data["email"])
        || empty($data["diaChi"])
    ) {
        $output = ["message" => "Không được để trống dữ liệu"];
        echo json_encode($output);
        exit;
    }
}

$A = new sinhVien($conn, $data["MSSV"]);
$change = 0;
$message = "";

foreach ($array as $muc) {
    if ($A->lay($muc) != $data[$muc]) {
            $A->sua($conn, $muc, $data[$muc]);
            $change++;
            $message = $message . "- changed " . $muc . "<br>";
    }
}

if ($message == "")
    $message = "Nothing has been changed!";

//Lưu công việc lên log
$logQuery = "INSERT INTO LOG(MSCB, moTa, MSSV) 
             VALUES('".$_SESSION["MSCB"]."', '$message', '".$A->lay("MSSV")."');";
$conn->query($logQuery);

//Trả kết quả về 
if ($data["type"] == 0) {
    //Chân lý cột đời 
    $query = "SELECT * FROM SINHVIEN a
                  JOIN LOP b ON a.maLop = b.maLop
                  JOIN KHOATRUONG c ON c.maKhoaTruong = b.maKhoaTruong
                  ORDER BY c.maKhoaTruong, a.maLop, a.khoa, a.MSSV";
    // 

    $result = $conn->query($query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $output = ["message" => $message, "data" => $result];
    echo json_encode($output);
} else {
    $output = ["message" => $message];
    echo json_encode($output);
}
