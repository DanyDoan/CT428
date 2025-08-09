<?php
    require("../config/db.php");
    header("Content-type: application/json");

    $query = "";
    $output = [];
    if (empty($_POST["fieldValue"])){
        $query = "SELECT * FROM SINHVIEN ORDER BY truong, tenLop, khoa, MSSV";
        $result = $conn->query($query);
        $output = $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        $field = $_POST["searchingField"];
        $fieldValue = "%".$_POST["fieldValue"]."%";
        $stm = $conn->prepare("SELECT * FROM SINHVIEN
                               WHERE $field LIKE ?");

        $stm->bind_param("s", $fieldValue);
        $stm->execute();
        $result = $stm->get_result();
        $output = $result->fetch_all(MYSQLI_ASSOC);
    }
    echo json_encode($output);
?>