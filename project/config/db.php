<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $name = "buoi3";

    $conn = new mysqli($host, $user, $pass, $name);
    if ($conn->errno)
        echo "Couldn't connect to database<br>";
    else    
        echo "Database connected";
?>