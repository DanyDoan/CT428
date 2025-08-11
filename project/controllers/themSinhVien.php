<?php
require_once("../config/db.php");
session_start();
if (
    empty($_POST["MSSV"])
    || empty($_POST["hoTen"])
    || empty($_POST["gioiTinh"])
) {
    die(json_encode(["status" => "null"]));
}

// $query = "SELECT maLop FROM LOP WHERE tenLop = '".$_POST['tenLop']."'";
$maLop = $_POST['maLop'];

$stm = $conn->prepare("INSERT INTO SINHVIEN 
                             (MSSV, hoTen, gioiTinh, maLop, khoa)
                             VALUES ( ?, ?, ?, ?, ?)");
$stm->bind_param("sssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["gioiTinh"], $maLop, $_POST["khoa"]);




try {
    $stm->execute();

    //Chân lý cột đời 
    $query = "SELECT * FROM SINHVIEN a
                  JOIN LOP b ON a.maLop = b.maLop
                  JOIN KHOATRUONG c ON c.maKhoaTruong = b.maKhoaTruong
                  ORDER BY c.maKhoaTruong, a.maLop, a.khoa, a.MSSV";
    // 
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);

    //Lưu công việc lên log
    $logQuery = "INSERT INTO LOG(MSCB, moTa, MSSV) 
                VALUES('" . $_SESSION["MSCB"] . "', 'Đã thêm', '" . $_POST["MSSV"] . "');";
    $conn->query($logQuery);
    
    //Trả kết quả của hàm thêm sinh viên về
    echo json_encode(["status" => "success", "data" => $output]);
} catch (mysqli_sql_exception) {

    //Chân lý cột đời 
    $query = "SELECT * FROM SINHVIEN a
                  JOIN LOP b ON a.maLop = b.maLop
                  JOIN KHOATRUONG c ON c.maKhoaTruong = b.maKhoaTruong
                  ORDER BY c.maKhoaTruong, a.maLop, a.khoa, a.MSSV";
    // 
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    if ($stm->errno == 1062)
        echo json_encode(["status" => "existed", "data" => $output]);
    else
        echo json_encode(["status" => $stm->error, "data" => $output]);
}
