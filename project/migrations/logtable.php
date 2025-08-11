<?php
    require_once("../config/db.php");
    $query = "CREATE TABLE LOG(
                id int PRIMARY KEY AUTO_INCREMENT PRIMARY KEY,
                thoiGian TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                MSCB varchar(50),
                tenCanBo varchar(50),
                congViec varchar(50),
                MSSV varchar(50),
                tenSinhVien varchar(50),
                FOREIGN KEY (MSCB) REFERENCES canbo(MSCB),
                FOREIGN KEY (MSSV) REFERENCES sinhvien(MSSV));";
    try{
        $conn->query($query);
        // echo "Thanhf coon";
    }catch(mysqli_sql_exception){
        // echo $conn->error;
    };
?>