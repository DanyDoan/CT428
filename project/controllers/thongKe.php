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
$sqlTienSi = "SELECT COUNT(*) AS total FROM CANBO WHERE chucVu LIKE 'Tiến sĩ'";
$resultTienSi = $conn->query($sqlTienSi);
$totalTienSi = $resultTienSi->fetch_assoc()['total'] ?? 0;

// Đếm số lượng Thạc sĩ
$sqlThacSi = "SELECT COUNT(*) AS total FROM CANBO WHERE chucVu LIKE 'Thạc sĩ'";
$resultThacSi = $conn->query($sqlThacSi);
$totalThacSi = $resultThacSi->fetch_assoc()['total'] ?? 0;

// Đếm số lượng Giáo sư
$sqlGiaoSu = "SELECT COUNT(*) AS total FROM CANBO WHERE chucVu LIKE 'Giáo sư'";
$resultGiaoSu = $conn->query($sqlGiaoSu);
$totalGiaoSu = $resultGiaoSu->fetch_assoc()['total'] ?? 0;

// Đếm số lượng Phó giáo sư
$sqlPhoGiaoSu = "SELECT COUNT(*) AS total FROM CANBO WHERE chucVu LIKE 'Phó giáo sư'";
$resultPhoGiaoSu = $conn->query($sqlPhoGiaoSu);
$totalPhoGiaoSu = $resultPhoGiaoSu->fetch_assoc()['total'] ?? 0;
?>