<?php
require_once("../config/db.php");
session_start();
if (
    empty($_POST["MSSV"])
    || empty($_POST["hoTen"])
    || empty($_POST["gioiTinh"])
) {
    die(json_encode(["status" => "null"]));
}

// $query = "SELECT maLop FROM LOP WHERE tenLop = '".$_POST['tenLop']."'";
$maLop = $_POST['maLop'];

// $stm = $conn->prepare("INSERT INTO SINHVIEN 
//                              (MSSV, hoTen, gioiTinh, maLop, khoa)
//                              VALUES ( ?, ?, ?, ?, ?)");
// $stm->bind_param("sssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["gioiTinh"], $maLop, $_POST["khoa"]);

//Bảng ánh xạ chữ cái có dấu sang không dấu
$serializeChar = array(
    "à" => "a", "á" => "a", "ả" => "a", "ã" => "a", "ạ" => "a",
    "ă" => "a", "ằ" => "a", "ắ" => "a", "ẳ" => "a", "ẵ" => "a", "ặ" => "a",
    "â" => "a", "ầ" => "a", "ấ" => "a", "ẩ" => "a", "ẫ" => "a", "ậ" => "a",

    "è" => "e", "é" => "e", "ẻ" => "e", "ẽ" => "e", "ẹ" => "e",
    "ê" => "e", "ề" => "e", "ế" => "e", "ể" => "e", "ễ" => "e", "ệ" => "e",

    "ì" => "i", "í" => "i", "ỉ" => "i", "ĩ" => "i", "ị" => "i",

    "ò" => "o", "ó" => "o", "ỏ" => "o", "õ" => "o", "ọ" => "o",
    "ô" => "o", "ồ" => "o", "ố" => "o", "ổ" => "o", "ỗ" => "o", "ộ" => "o",
    "ơ" => "o", "ờ" => "o", "ớ" => "o", "ở" => "o", "ỡ" => "o", "ợ" => "o",

    "ù" => "u", "ú" => "u", "ủ" => "u", "ũ" => "u", "ụ" => "u",
    "ư" => "u", "ừ" => "u", "ứ" => "u", "ử" => "u", "ữ" => "u", "ự" => "u",

    "ỳ" => "y", "ý" => "y", "ỷ" => "y", "ỹ" => "y", "ỵ" => "y",

    "đ" => "d"
);

$hoTen = trim($_POST["hoTen"]);
$hoTen = strtolower($hoTen);
$temp = explode(" ", $hoTen);

// Lấy từ cuối
$ten = end($temp);
$ten = strtr($ten, $serializeChar);
$email = $ten.strtolower($_POST["MSSV"])."@student.ctu.edu.vn";

$stm = $conn->prepare("INSERT INTO SINHVIEN 
                             (MSSV, hoTen, gioiTinh, maLop, khoa, email)
                             VALUES ( ?, ?, ?, ?, ?, ?)");
$stm->bind_param("ssssss", $_POST["MSSV"], $_POST["hoTen"], $_POST["gioiTinh"], $maLop, $_POST["khoa"], $email);


try {
    $stm->execute();

    //Chân lý cột đời 
    $query = "SELECT * FROM SINHVIEN a
                  JOIN LOP b ON a.maLop = b.maLop
                  JOIN KHOATRUONG c ON c.maKhoaTruong = b.maKhoaTruong
                  ORDER BY c.maKhoaTruong, a.maLop, a.khoa, a.MSSV";
    // 
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);

    //Lưu công việc lên log
    $logQuery = "INSERT INTO LOG(MSCB, moTa, MSSV) 
                VALUES('" . $_SESSION["MSCB"] . "', 'Đã thêm', '" . $_POST["MSSV"] . "');";
    $conn->query($logQuery);
    
    //Trả kết quả của hàm thêm sinh viên về
    echo json_encode(["status" => "success", "data" => $output]);
} catch (mysqli_sql_exception) {

    //Chân lý cột đời 
    $query = "SELECT * FROM SINHVIEN a
                  JOIN LOP b ON a.maLop = b.maLop
                  JOIN KHOATRUONG c ON c.maKhoaTruong = b.maKhoaTruong
                  ORDER BY c.maKhoaTruong, a.maLop, a.khoa, a.MSSV";
    // 
    $result = $conn->query($query);
    $output = $result->fetch_all(MYSQLI_ASSOC);
    if ($stm->errno == 1062)
        echo json_encode(["status" => "existed", "data" => $output]);
    else
        echo json_encode(["status" => $stm->error, "data" => $output]);
}
