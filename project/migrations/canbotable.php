<?php
    $query = "CREATE TABLE CANBO(
              MSCB varchar(50) PRIMARY KEY,
              matKhau varchar(255),
              hoTen varchar(50),
              ngaySinh date,
              gioiTinh varchar(5),
              maLop varchar(10),
              noiCongTac varchar(50));";
    try{
        $conn->query($query);
        echo "Table adminList created<br>";
    }catch(mysqli_sql_exception){
        // echo "adminList is already created<br>";
    }
?>