<?php
    require("../config/db.php");
    header("Content-type: application/json");

    $query = "";
    $output = [];
    if (empty($_POST["fieldValue"])){
        $query = "SELECT * FROM SINHVIEN
                  JOIN LOP ON LOP.maLop = SINHVIEN.maLop";
        $result = $conn->query($query);
        $output = $result->fetch_all(MYSQLI_ASSOC);
    }
    else{
        $field = $_POST["searchingField"];
        $fieldValue = "%".$_POST["fieldValue"]."%";
        $stm = $conn->prepare("SELECT * FROM SINHVIEN
                               JOIN LOP ON LOP.maLop = SINHVIEN.maLop
                               WHERE $field LIKE ?");

        $stm->bind_param("s", $fieldValue);
        $stm->execute();
        $result = $stm->get_result();
        $output = $result->fetch_all(MYSQLI_ASSOC);
    }
    echo json_encode(["data" => $output]);
?>