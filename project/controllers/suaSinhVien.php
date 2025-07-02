<?php
    require_once("../config/db.php");
    require_once("../models/sinhvien.php");
    $data = json_decode(file_get_contents("php://input"), true);

    $A = new sinhVien($conn, $data["MSSV"]);
    $array = ["MSSV", "hoTen", "ngaySinh", "gioiTinh", "truong", "tenLop", "khoa"];
    $change = 0;
    $data["khoa"] = "K".$data["khoa"];
    $message = "nothing to change!";
    foreach ($array as $muc){
        if ($A->lay($muc) != $data[$muc])
        {
            $A->sua($conn, $muc, $data[$muc]);
            $change++;
            $message = "changed successfully";
        }
        else;
    }
    $query = "SELECT * FROM SINHVIEN";
    $result = $conn->query($query);
    $result = $result->fetch_all(MYSQLI_ASSOC);
    $output = ["message" => $message, "danhSachSinhVien" => $result];
    echo json_encode($output);
?>