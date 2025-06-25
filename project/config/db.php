<?php
mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT); // important!

    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "project";

    $conn = new mysqli($host, $user, $pass);
    $query = "CREATE DATABASE $name;";
    try{
        $conn->query($query);
        echo "Database created!<br>";
    }catch(mysqli_sql_exception){
        echo "Database already created<br>";
    }

    $conn->select_db($name);
    echo "Database connected<br>";
?>

<!-- Create adminList table -->
<?php

    $query = "CREATE TABLE QuanTriVien(
              id varchar(50) PRIMARY KEY,
              matkhau varchar(255),
              ten varchar(50),
              ngaysinh date,
              noicongtac varchar(50));";
    try{
        $conn->query($query);
        echo "Table adminList created<br>";
    }catch(mysqli_sql_exception){
        echo "adminList is already created<br>";
    }
?>

<!-- Create SinhVien table -->
<?php
    $query = "CREATE TABLE SinhVien(
              MSSV varchar(50) PRIMARY KEY,
              TenSinhVien varchar(50),
              NgaySinh date,
              GioiTinh varchar(5),
              Lop varchar(50),
              Khoa varchar(50));";
    try{
        $conn->query($query);
        echo "Table SinhVien created<br>";
    }catch(mysqli_sql_exception){
        echo "SinhVien is already created<br>";
    }
?>