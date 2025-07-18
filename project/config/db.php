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
        //echo "Database created!<br>";
    }catch(mysqli_sql_exception){
        //echo "Database already created<br>";
    }

    $conn->select_db($name);
    require("../migrations/canbotable.php");
    require("../migrations/sinhvientable.php");
    require("../migrations/truongtable.php");









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
    }catch(mysqli_sql_exception){
    }



    $query = "CREATE TABLE SINHVIEN(
              MSSV varchar(50) PRIMARY KEY,
              hoTen varchar(50),
              ngaySinh date,
              gioiTinh varchar(5),
              maLop varchar(10),
              khoa varchar(5));"; #Khóa
    try{
        $conn->query($query);
    }catch(mysqli_sql_exception){
    }




    $query = "CREATE TABLE LOP(
                maLop varchar(10) PRIMARY KEY,
                tenLop varchar(50)
            );";
    try{
        $conn->query($query);
    }catch(mysqli_sql_exception){
    }

?>