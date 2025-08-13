<?php
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.6.7">
    <link rel="stylesheet" href="../assets/sidebar-style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <title>Cán bộ</title>

    <style>
        .container{
            display: flex;
            flex-direction: column;
            align-items: center;
            margin-top: 16px;
        }
        table {
            width: 100%;
            margin-top: 16px;
            border-collapse: collapse;
        }

        th,
        td {
            border: 1px solid black;
            padding: 6px 12px;
            text-align: center;
        }

         #searchBar input,
        #searchBar select {
            width: fit-content;
            height: 2em;
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 0.2em;
            border-width: 1px 1px;
            color: black;
        }

        #searchBar button {
            width: fit-content;
            height: 2em;
            border-radius: 0.2em;
            border-width: 1px 1px;
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.2s;
        }

        #pagin{
            margin-top: 8px;
            margin-left: auto;
            margin-right: auto;
        }

        #canBoList th {
            background-color: #0d6efd;
            color: white;
            font-size: 0.8em;
        }

        #canBoList tr {
            background-color: rgba(255, 255, 255, 1);
        }

        #canBoList tr:nth-child(2n) {
            background-color: rgba(217, 235, 245, 1);
        }

        #canBoList tbody tr:hover{
            filter: brightness(0.9);
        }

    </style>
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
                <button type="button" onclick="timCanBo()">Tìm Kiếm</button>
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
    function hideNav() {
        const sideBar = document.getElementById("sideBar");
        sideBar.classList.toggle("active");
    }
    timCanBo();
</script>