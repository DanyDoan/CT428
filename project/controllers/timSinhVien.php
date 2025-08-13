<?php
require("../config/db.php");
header("Content-type: application/json");

$query = "";
$output = [];
if (empty($_POST["fieldValue"])) {

    //Chân lý cột đời 
    $query = "SELECT *
                FROM SINHVIEN a
                JOIN LOP b ON a.maLop = b.maLop
                JOIN KHOATRUONG c ON c.maKhoaTruong = b.maKhoaTruong
                ORDER BY c.maKhoaTruong, a.maLop, a.khoa, a.MSSV
            ";
    // 
    // 

    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
} else {
    $field = $_POST["searchingField"];
    $fieldValue = "%" . $_POST["fieldValue"] . "%";
    $stm = $conn->prepare("SELECT * FROM SINHVIEN
                               JOIN LOP ON LOP.maLop = SINHVIEN.maLop
                               WHERE BINARY $field LIKE ?");

    $stm->bind_param("s", $fieldValue);
    $stm->execute();
    $result = $stm->get_result();
    $output = $result->fetch_all(MYSQLI_ASSOC);
}
echo json_encode(["soLuong" => "Số lượng kết quả trả về: ".$result->num_rows, "data" => $output]);
