<?php
    require("../config/db.php");
    require("../models/sinhvien.php");

    header("Content-Type: application/json");
    $A = new sinhVien($conn , $_GET["MSSV"]);

    echo json_encode(["data" => $A->layThongTin()]);
?>