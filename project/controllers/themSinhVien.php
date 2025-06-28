<?php
    header("Content-type: application/json");
    require_once("../config/db.php");
    $stm = $conn->prepare("INSERT INTO SINHVIEN 
                             (MSSV, hoTen, ngaySinh, gioiTinh, truong, tenLop, khoa)
                             VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    $stm->bind_param("sssssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["ngaySinh"], $_POST["gioiTinh"],  $_POST["tenTruong"], $_POST["tenLop"], $_POST["khoa"]);
    if ($stm->execute()){
        $query = "SELECT * FROM SINHVIEN";
        $result = $conn->query($query);
        $output = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode($output);
    }else echo json_encode("Failed");
?>