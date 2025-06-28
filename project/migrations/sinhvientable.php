<?php
$query = "CREATE TABLE SINHVIEN(
              MSSV varchar(50) PRIMARY KEY,
              hoTen varchar(50) NOT NULL,
              ngaySinh date NOT NULL,
              gioiTinh varchar(5) NOT NULL,
              tenLop varchar(50) NOT NULL,
              truong varchar(50) NOT NULL,
              khoa varchar(5) NOT NULL)"; #Khóa
try {
    $conn->query($query);
    // echo "Table SinhVien created<br>";
} catch (mysqli_sql_exception) {
    // echo $conn->error;
}
