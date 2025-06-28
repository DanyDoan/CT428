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
        // echo "Database already created<br>";
    }

    $conn->select_db($name);
    require("../migrations/canbotable.php");
    require("../migrations/sinhvientable.php");
    require("../migrations/loptable.php");
?>





