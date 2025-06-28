<?php
$query = "CREATE TABLE SINHVIEN(
              MSSV varchar(50) PRIMARY KEY,
              hoTen varchar(50),
              ngaySinh date,
              gioiTinh varchar(5),
              tenLop varchar(50),
              truong varchar(50),
              khoa varchar(5));"; #Khóa
try {
    $conn->query($query);
    echo "Table SinhVien created<br>";
} catch (mysqli_sql_exception) {
    // echo "SinhVien is already created<br>";
}
