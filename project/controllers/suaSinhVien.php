<?php
    require_once("../config/db.php");
    require_once("../models/sinhvien.php");
    $data = json_decode(file_get_contents("php://input"), true);

    $query = "";
    if (empty($data["hoTen"])) {

        $query = "SELECT * FROM SINHVIEN 
                  JOIN LOP ON SINHVIEN.maLop = LOP.maLop
                  ORDER BY maTruong, tenLop, khoa, MSSV";
        $result = $conn->query($query);
        $result = $result->fetch_all(MYSQLI_ASSOC);
        $output = ["message" => $message, "danhSachSinhVien" => $result];
        echo json_encode($output);
        exit;
    }
    $A = new sinhVien($conn, $data["MSSV"]);
    $array = ["MSSV", "hoTen", "gioiTinh", "maTruong", "tenLop", "khoa"];
    $change = 0;
    $data["khoa"] = "K" . $data["khoa"];
    $message = "";
    foreach ($array as $muc) {
        if ($A->lay($muc) != $data[$muc]) {
            $A->sua($conn, $muc, $data[$muc]);
            $change++;
            $message = $message."- changed ".$muc."<br>";
        } else;
    }

    if ($message == "")
        $message = "Nothing has been changed!";

    $query = "SELECT * FROM SINHVIEN 
        JOIN LOP ON SINHVIEN.maLop = LOP.maLop
        ORDER BY maTruong, tenLop, khoa, MSSV";
    $result = $conn->query($query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $output = ["message" => $message, "danhSachSinhVien" => $result];
    echo json_encode($output);
?>