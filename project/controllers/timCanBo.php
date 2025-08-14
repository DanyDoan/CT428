<?php
require("../config/db.php");
header("Content-type: application/json");

$query = "";
$output = [];
if (empty($_POST["fieldValue"])) {
    $query = "SELECT * FROM CANBO a
              JOIN LOP b ON a.maLop = b.maLop 
              ORDER BY FIELD(a.chucVu,'Giáo sư', 'Phó giáo sư', 'Tiến sĩ', 'Thạc sĩ', 'Trợ giảng'), b.maKhoatruong, a.maLop, a.MSCB";
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $field = $_POST["searchingField"];
    $fieldValue = "%" . $_POST["fieldValue"] . "%";
    $stm = $conn->prepare("SELECT * FROM CANBO  a
                            JOIN LOP b ON a.maLop = b.maLop 
                            WHERE $field LIKE ?
                            ORDER BY FIELD(a.chucVu,'Giáo sư', 'Phó giáo sư', 'Tiến sĩ', 'Thạc sĩ', 'Trợ giảng'), b.maKhoatruong, a.maLop, a.MSCB");

    $stm->bind_param("s", $fieldValue);
    $stm->execute();
    $result = $stm->get_result();
    $output = $result->fetch_all(MYSQLI_ASSOC);
}
echo json_encode($output);
