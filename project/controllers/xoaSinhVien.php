<?php
    require_once("../config/db.php");
    require_once("../models/sinhvien.php");
    session_start();
    
    $MSSV = $_POST["MSSV"];

    $query = "DELETE FROM SINHVIEN
              WHERE MSSV = '$MSSV'";
    $conn->query($query);

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
                VALUES('" . $_SESSION["MSCB"] . "', 'Đã xóa', '" . $_POST["MSSV"] . "');";
    $conn->query($logQuery);

    echo json_encode(["data" => $output]);
?>