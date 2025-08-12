<?php
    $query = "CREATE TABLE SINHVIEN(
                MSSV varchar(50) PRIMARY KEY,
                hoTen varchar(50) NOT NULL,
                ngaySinh date NOT NULL,
                gioiTinh varchar(5) NOT NULL,
                maLop varchar(50) NOT NULL,
                khoa varchar(5) NOT NULL,
                diaChi varchar(50),
                soDienThoai varchar(50) UNIQUE,
                email varchar(50) UNIQUE,
                FOREIGN KEY (maLop) REFERENCES lop(maLop));"; 
    try {
        $conn->query($query);
        // echo "Table SinhVien created<br>";
    } catch (mysqli_sql_exception) {
        // echo $conn->error;
    }

?>

