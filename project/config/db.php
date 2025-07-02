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
    }catch(mysqli_sql_exception){
    }

    $conn->select_db($name);
    require("../migrations/canbotable.php");
    require("../migrations/sinhvientable.php");
    require("../migrations/truongtable.php");
?>





