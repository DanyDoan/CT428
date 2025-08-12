<?php
require_once("../config/db.php"); 
// Đếm số lượng cán bộ
$sqlCanBo = "SELECT COUNT(*) AS total FROM CANBO";
$resultCanBo = $conn->query($sqlCanBo);
$totalCanBo = $resultCanBo->fetch_assoc()['total'] ?? 0;

// Đếm số lượng sinh viên
$sqlSinhVien = "SELECT COUNT(*) AS total FROM SINHVIEN";
$resultSinhVien = $conn->query($sqlSinhVien);
$totalSinhVien = $resultSinhVien->fetch_assoc()['total'] ?? 0;

// Đếm số lượng Tiến sĩ
$sqlTienSi = "SELECT COUNT(*) AS total FROM CANBO WHERE chucVu LIKE '%Tiến sĩ%'";
$resultTienSi = $conn->query($sqlTienSi);
$totalTienSi = $resultTienSi->fetch_assoc()['total'] ?? 0;

?>

