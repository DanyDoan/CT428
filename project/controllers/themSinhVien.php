<?php
    require_once("../config/db.php");
    if (  empty($_POST["MSSV"])
        ||empty($_POST["hoTen"])
        ||empty($_POST["ngaySinh"])
        ||empty($_POST["gioiTinh"]))
    {
            die(json_encode(["status" => "fail"]));
    }
    
    $stm = $conn->prepare("INSERT INTO SINHVIEN 
                             (MSSV, hoTen, ngaySinh, gioiTinh, truong, tenLop, khoa)
                             VALUES ( ?, ?, ?, ?, ?, ?, ?)");
    $stm->bind_param("sssssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["ngaySinh"], $_POST["gioiTinh"],  $_POST["tenTruong"], $_POST["tenLop"], $_POST["khoa"]);
    if ($stm->execute()){
        $query = "SELECT * FROM SINHVIEN";
        $result = $conn->query($query);
        $output = $result->fetch_all(MYSQLI_ASSOC);
        echo json_encode(["status" => "success", "data" => $output]);
    }
?>