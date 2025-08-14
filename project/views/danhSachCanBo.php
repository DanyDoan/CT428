<?php
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: dangNhap.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logo.png">
    <link rel="stylesheet" href="../assets/css/sidebar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/danhSachCanBo.css" rel="stylesheet">

    <title>Danh sách cán bộ</title>

</head>

<body>
    <!-- Sidebar -->
    <div id="sideBar">
        <?php require("../shared/sideBar.php"); ?>
    </div>
    <!-- Main content -->
    <div id="main">
        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <div class="container">

            <form method="GET" id="searchBar">
                <select id="searchingField" name="searchingField">
                    <option value="maKhoaTruong">Khoa / Trường</option>
                </select>
                <select id="fieldValue" name="fieldValue">
                    <option value="">Tất cả</option>
                    <optgroup label="Viện">
                        <option value="DA">Viện Công nghệ sinh học</option>
                    <optgroup label="Cấp Trường">
                        <option value="DI">Trường CNTT&TT</option>
                        <option value="TN">Trường Bách Khoa</option>
                        <option value="KT">Trường Kinh Tế</option>
                        <option value="NN">Trường Nông Nghiệp</option>
                        <option value="SP">Trường Sư Phạm</option>
                        <option value="TS">Trường Thủy Sản</option>
                    </optgroup>
                    <optgroup label="Cấp Khoa">
                        <option value="ML">Khoa Chính Trị</option>
                        <option value="KH">Khoa Khoa Học Tự Nhiên</option>
                        <option value="XH">Khoa KHXH&NV</option>
                        <option value="KL">Khoa Luật</option>
                        <option value="MT">Khoa MT&TNTN</option>
                        <option value="FL">Khoa Ngoại Ngữ</option>
                        <option value="TD">Khoa Giáo Dục Thể Chất</option>
                    </optgroup>
                </select>
                <button type="button" onclick="timCanBo()"><i class="bi bi-search feature-icon"></i></button>
                <button type="button" onclick="window.location.reload()">Hủy</button>
            </form>

            <table id="canBoList">
            </table>

        </div>
        <div id="pagin">
        </div>
</body>

</html>

<script src="../assets/js/hienThiCanBo.js?v=2.23.0"></script>
<script src="../assets/js/timCanBo.js?v=21.12.123.3"></script>
<script>
    timCanBo();
</script>