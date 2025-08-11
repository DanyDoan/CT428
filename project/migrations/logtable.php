<?php
    require_once("../config/db.php");
    $query = "CREATE TABLE LOG(
                id int PRIMARY KEY AUTO_INCREMENT,
                thoiGian TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                MSCB varchar(50) NOT NULL,
                moTa varchar(255) NOT NULL,
                MSSV varchar(50) NOT NULL);";
    try{
        $conn->query($query);
        // echo "Thanhf coon";
    }catch(mysqli_sql_exception){
        // echo $conn->error;
    };
?>