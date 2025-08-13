<?php
    require("../config/db.php");
    require("../models/sinhvien.php");
    require("../models/canbo.php");
    header("Content-Type: application/json");

    //Lấy thông tin sinh viên
    $A = new sinhVien($conn , $_GET["MSSV"]);

    //Lấy thông tin cán bộ
    $query = "SELECT MSCB FROM CANBO
                WHERE CANBO.maLop = '".$A->lay("maLop")."'";
    $result = $conn->query($query);
    if ($result->num_rows == 0){
        echo json_encode(["sv" => $A->layThongTin(), "cb" => null]);
    }
    else{
        $result = $result->fetch_assoc();
        $MSCB = $result["MSCB"];
        $B = new canBo($conn, $MSCB);
        $b = array(
            "hoTen" =>  $B->lay("hoTen"),
            "email" => $B->lay("email"),
            "soDienThoai" => $B->lay("soDienThoai")
        );
        echo json_encode(["sv" => $A->layThongTin(), "cb" => $b]);

    }

?>