<?php
    require_once("../config/db.php");
    $target = $_POST["MSSV"];
    $query = "DELETE FROM SINHVIEN
              WHERE MSSV = '$target'";
    $conn->query($query);
    $query = "SELECT * FROM SINHVIEN ORDER BY MSSV";
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
?>