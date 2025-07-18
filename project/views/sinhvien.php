<?php
require("../config/db.php");
?>

<!DOCTYPE html>
<html lang="vi">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
    <link rel="stylesheet" href="../assets/sidebar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Sinh viên</title>

    <style>
        #content {
            z-index: 1;
            display: grid;
            padding: 20px 10px;
            gap: 30px 10px;
            grid-template-rows: auto 10px 1fr 20px;
            grid-template-areas:
                "toolBox"
                "searchBar"
                "container"
                "pagination"
            ;
            transition: 0.5s;
        }

        #content.active {
            transform: translateY(-100px);
            position: absolute;
            overflow: hidden;
        }

        #toolBox {
            grid-area: toolBox;
            width: 100%;
            transition: 1s;
            z-index: 0;
        }

        #toolBox fieldset {
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
            background-color: rgba(255, 255, 255, 0.61);
            width: fit-content;
            justify-self: center;
        }

        #toolBox fieldset * {
            width: 100%;
        }

        #toolBox fieldset legend {
            width: fit-content;
            text-transform: uppercase;
            font-weight: 800;
            background-image: linear-gradient(to left, rgb(0, 0, 0), rgb(85, 113, 255));
            color: transparent;
            background-clip: text;
            animation: surfing 5s linear infinite;
        }

        #toolBox #addingForm label {
            display: inline-block;
            font-size: 0.8em;
            font-weight: 800;
            min-width: fit-content;
            width: 5em;
            color: rgb(0, 0, 0);
            text-align: left;
        }

        #toolBox input,
        #toolBox select,
        #toolBox button,
        #toolBox input::placeholder {
            width: fit-content;
            font-size: 0.85em;
            background: none;
            color: rgb(82, 77, 77);
            border-width: 0px 0px 2px 0px;
            font-weight: 800;
        }

        #toolBox input::placeholder,
        #toolBox input[type="date"] {
            font-size: 0.9em;
            color: rgba(120, 115, 115, 0.64);
        }

        #toolBox button {
            background-color: rgb(255, 255, 255);
            color: black;
            transition: 0.2s;
        }

        #toolBox button:hover {
            transition: 0.2s;
            transform: scale(1.1);
            background-color: black;
            color: white;
        }

        #toolBox div {
            width: fit-content;
        }

        #toolBox #addingForm {
            display: flex;
            justify-content: space-around;
        }

        #col1,
        #col2 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #col1 div,
        #col2 div {
            width: 100%;
            display: flex;
            gap: 10px;
        }

        #searchBar {
            grid-area: searchBar;
            display: flex;
            justify-content: space-around;
            flex-wrap: wrap;
        }

        #searchBar form {
            width: fit-content;
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 10px;
        }

        #anounceBox {
            justify-self: center;
            background-color: rgba(109, 218, 93, 0.73);
            border: 1px 0px solid rgb(5, 0, 68);
            border-radius: 0.8em;
            padding: 5px;
            min-width: fit-content;
            min-height: fit-content;
            width: 10em;
            height: 1.5em;
            display: flex;
            justify-content: center;
            align-items: center;

        }

        #searchingForm input,
        #searchingForm select {
            background-color: rgba(255, 255, 255, 0.89);
            min-width: 2em;
            min-height: 2em;
            border-radius: 10em;
            border-width: 1px 1px;
            color: black;
        }

        #searchingForm button {
            background-size: contain;
            background-repeat: no-repeat;
            font-weight: 600;
            font-size: 0.8em;
            color: black;
            padding: 10px;
            border-radius: 10em;
            border-width: 1px 1px;
            background-color: rgba(255, 255, 255, 0.89);
            transition: 0.2s;

        }

        #searchingForm button:hover {
            transition: 0.2s;
            transform: scale(1.1);
            background-color: black;
            color: white;
        }

        #container {
            grid-area: container;
            width: 100%;
            display: flex;
            align-self: start;
            background-color: red;
        }

        #studentList {
            width: 100%;
            border-collapse: collapse;
        }

        #studentList * {
            border: 1px solid black;
            text-align: center;
        }

        #studentList th {
            background-color: rgb(47, 79, 172);
            color: white;
            font-size: 0.8em;
        }

        #studentList th,
        #studentList td {
            min-width: fit-content;
            max-width: fit-content;
            padding: 5px;
        }

        #studentList .icon {
            height: 15px;
            width: 15px;
            background-color: rgba(0, 0, 0, 0);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            border: none;
            transition: 0.2s;
        }

        #studentList tr td:nth-child(even) .icon {
            background-image: url("../assets/images/check.png");
        }

        #studentList tr td:nth-child(odd) .icon {
            background-image: url("../assets/images/close.png");
        }

        #studentList .icon:hover {
            transition: 0.2s;
            transform: scale(1.1);
        }

        #studentList tr {
            background-color: rgba(252, 255, 159, 1);
        }

        #studentList tr:nth-child(2n) {
            background-color: rgba(255, 255, 255, 1);
        }

        #studentList input,
        #studentList select,
        #studentList option {
            font-size: 0.8em;
            width: 100%;
            height: 100%;
            background: none;
            border: none;
        }

        #studentList option {
            font-size: 1.2em;
        }

        #nutPhanTrang {
            grid-area: pagination;
            display: flex;
            justify-self: center;
            align-self: end;
            gap: 10px;
            background-color: red;

            /* bottom: 10px; */
        }



        #addingForm {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* Responsive Styles */

        @media only screen and (max-width: 800px) {
            /* * {
                font-size: 10px;
            } */

            #content {
                grid-template-areas:
                    "searchBar"
                    "container"
                    "pagination";
            }

            #toolBox {
                display: none;
            }
        }

        .message {
            font-weight: 800;
            text-transform: uppercase;
            font-size: 0.8em;
            animation: fade 5s forwards;
            color: black;
        }


        @keyframes fade {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }


        /* @media only screen and (max-width: 400px) {
            * {
                display: none;
            }
        } */
    </style>
</head>

<body>

    <!-- Sidebar -->
    <div id="sideBar">
        <?php require("../shared/sideBar.php"); ?>
    </div>
    <!-- Main -->
    <div id="main">

        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <!-- Content -->
        <div id="content" class="d-flex flex-column">
    
                <!-- ToolBox -->
                <div id="toolBox">
                    <fieldset>
                        <legend>Thêm sinh viên</legend>
                        <form method="POST" id="addingForm">
                            <div id="col1">
                                <div>
                                    <label for="MSSV">MSSV: </label>
                                    <input type="text" id="MSSV" name="MSSV" placeholder="Mã Số Sinh Viên">
                                </div>
                                <div>
                                    <label for="hoTen">Họ Tên:</label>
                                    <input type="text" id="hoTen" name="hoTen" placeholder="Họ Tên Sinh Viên">
                                </div>
                                <div>
                                    <label for="ngaySinh">Ngày sinh: </label>
                                    <input type="date" id="ngaySinh" name="ngaySinh">
                                </div>
                                <div>
                                    <label for="gioiTinh">Giới tính: </label>

                                    <input type="radio" name="gioiTinh" value="Nam" checked>Nam
                                    <input type="radio" name="gioiTinh" value="Nữ">Nữ

                                </div>
                            </div>
                            <div id="col2">
                                <div>
                                    <label for="tenTruong">Trường</label>
                                    <select id="tenTruong" name="tenTruong">
                                        <optgroup label="Trường/Khoa đào tạo">
                                            <option value="DA">Viện Công nghệ Sinh học và thực phẩm</option>
                                            <option value="DI">Trường Công nghệ Thông tin và Truyền thông</option>
                                            <option value="FL">Khoa Ngoại ngữ</option>
                                            <option value="HG">Khoa Phát triển Nông thôn</option>
                                            <option value="KH">Khoa Khoa học Tự nhiên</option>
                                            <option value="KT">Trường Kinh tế</option>
                                            <option value="LK">Khoa Luật</option>
                                            <option value="ML">Khoa Khoa học Chính trị</option>
                                            <option value="MT">Khoa Môi trường và Tài nguyên thiên nhiên</option>
                                            <option value="NN">Trường Nông nghiệp</option>
                                            <option value="SP">Khoa Sư phạm</option>
                                            <option value="TD">Khoa Giáo dục thể chất</option>
                                            <option value="TN">Trường Bách khoa</option>
                                            <option value="TS">Trường Thủy sản</option>
                                            <option value="XH">Khoa Khoa học Xã hội và Nhân văn</option>
                                        </optgroup>
                                    </select>
                                </div>
                                <div>
                                    <label for="tenLop">Lớp</label>
                                    <select id="tenLop" name="tenLop">
                                        <!-- asd -->
                                    </select>

                                </div>
                                <div>
                                    <label for="khoa">Khóa</label>
                                    <select id="khoa" name="khoa">
                                        <option value="K45">K45</option>
                                        <option value="K46">K46</option>
                                        <option value="K47">K47</option>
                                        <option value="K48">K48</option>
                                        <option value="K49">K49</option>
                                        <option value="K50">K50</option>
                                    </select>
                                    <button type="button" onclick="themSinhVien()">Thêm</button>
                                </div>
                                <!-- <button type="button" onclick="hide()">Ẩn</button> -->
                            </div>
                        </form>
                    </fieldset>


                </div>

                <!-- searchBar -->
                <div id="searchBar">
                    <form method="GET" id="searchingForm">
                        <select id="searchingField" name="searchingField">
                            <option value="MSSV">Mã Số Sinh Viên</option>
                            <option value="hoTen">Họ Tên Sinh Viên</option>
                            <option value="gioiTinh">Giới Tính</option>
                            <option value="tenLop">Tên Lớp</option>
                            <option value="truong">Trường</option>
                            <option value="khoa">Khóa</option>
                        </select>
                        <input type="text" name="fieldValue" placeholder="...">
                        <button type="button" onclick="timSinhVien()">Tìm Kiếm</button>
                        <button type="button" onclick="window.location.reload()">Xóa</button>
                    </form>
                    <fieldset id="anounceBox">
                        <h2 style="color:rgb(0,0,0)">Hộp thông báo</h2>
                    </fieldset>
                </div>

                <!-- Output -->
                <div id="container">
                    <table id="studentList">
                    </table>
                </div>

                <!-- Pagination -->
                <div id="nutPhanTrang">
                </div>

        </div>

        <!-- Footer -->
        <?php
        require("../shared/footer.html");
        ?>
        
    </div>

</body>


</html>

<script>
    function hide() {
        document.getElementById("content").classList.toggle("active");
    }
</script>
<!-- Ẩn hiện side bar -->
<script src="../assets/js/hideNav.js"></script>

<!-- Chức năng lọc các ngành theo tên trường/khoa -->
<script src="../assets/js/danhSachNganh.js?v=1.10.12"></script>

<!-- Các chức năng thêm, sửa, xóa, tìm kiếm sinh viên -->
<script src="../assets/js/hienThiSinhVien.js?v=2.13.00"></script>
<script src="../assets/js/themSinhVien.js"></script>
<script src="../assets/js/timSinhVien.js?v=13.13.0"></script>
<script src="../assets/js/xoaSinhVien.js?v=12.12.3"></script>
<script src="../assets/js/suaSinhVien.js?v=5.23.9"></script>

<!-- Gọi hàm :v -->
<script>
    timSinhVien();
</script>