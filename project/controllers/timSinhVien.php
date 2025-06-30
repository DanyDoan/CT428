<?php
    header("Content-type: application/json");
    require("../config/db.php");

    $query = "";
    $result = "";
    if (empty($_POST["fieldValue"]))
    $query = "SELECT * FROM SINHVIEN ORDER BY MSSV";
    else{
        $field = $_POST["searchingField"];
        $fieldValue = $_POST["fieldValue"];
        $query = "SELECT * FROM SINHVIEN
                  WHERE $field LIKE '%$fieldValue%'";
    }
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    echo json_encode($output);
?>