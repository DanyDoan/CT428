<?php
require("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
    <link rel="stylesheet" href="../assets/css/style.css?v=1">
    <style>
        #content {
            display: grid;
            padding: 30px 10px;
            grid-template-columns: 4fr 1fr;
            grid-template-rows: auto 1fr 200px;
            gap: 30px 10px;
            grid-template-areas:
                "searchBar searchBar"
                "container toolBox"
                "remain remain"
            ;
        }

        #searchBar {
            grid-area: searchBar;
        }

        #searchBar form {
            width: 100%;
        }

        #container {
            grid-area: container;
            width: 100%;
            display: flex;
            align-self: self-start;
            background-color: red;
        }

        #container #studentList {
            width: 100%;
            border-collapse: collapse;
        }

        #container #studentList * {
            border: 1px solid black;
            text-align: center;
        }
        th {
            background-color: rgb(47, 79, 172);
            color:white;
        }
        th,
        td {
            font-size: 0.6em;
            width: fit-content;
        }

        #toolBox {
            grid-area: toolBox;
            width: 100%;
            height: 100%;            
        }

        #toolBox fieldset {
            display: flex;
            flex-direction: column;
            box-sizing: border-box;
        }

        #toolBox fieldset *{
            width: 100%;
        }
        #toolBox label{
            font-size: 0.6em;
        }
        #toolBox input {
            width: fit-content;
            font-size: 0.8em;
        }

        #toolBox select {
            width: 200px;
            font-size: 0.8em;
        }

        #addingForm {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }


        #nutPhanTrang {
            grid-area: remain;
            display: flex;
            justify-self: center;
            gap: 10px;
        }

        #anounceBox{
            position: absolute;
        }
        @media only screen and (max-width: 600px) {
            * {
                font-size: 12px;
            }

            #content {
                grid-column: 1fr;
                grid-template-areas:
                    "searchBar searchBar searchBar"
                    "container container container"
                ;
            }

            #toolBox {
                display: none;
            }
        }

        @media only screen and (max-width: 400px) {
            * {
                display: none;
            }
        }
        #studentList .icon{
            height: 10px;
            width: 10px;
            font-size: 10px;
            background-color: black;
            margin:2px;
        }
        #studentList .icon:nth-child(n){
            background-image: url("../assets/images/modify.png");
            background-size:contain;
            background-repeat: no-repeat;
            background-position: center;       
        }
        #studentList .icon:nth-child(2n){
            background-image: url("../assets/images/close.png");
            background-size:contain;
            background-repeat: no-repeat;
            background-position: center;
        }

        #studentList tr{
            background-color: rgba(221, 237, 125, 0.43);
        }        #studentList tr:nth-child(2n){
            background-color: rgb(255, 255, 255);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php
    require("../require/header.html")
    ?>

    <!-- Main -->
    <main>
        <?php
        require("../require/sideBar.html")
        ?>

        <!-- Content -->
        <div id="content">

            <div id="searchBar">
                <form method="GET" id="searchingForm">
                    <select id="searchingField" name="searchingField">
                        <optgroup label="Tìm kiếm theo">
                            <option value="MSSV">Mã Số Sinh Viên</option>
                            <option value="hoTen">Họ Tên Sinh Viên</option>
                            <option value="tenLop">Tên Lớp</option>
                        </optgroup>
                    </select>
                    <input type="text" name="fieldValue" placeholder="...">
                    <button type="button" onclick="timSinhVien()">Tìm</button>
                </form>
            </div>
            <div id="toolBox">
                <fieldset>
                    <legend>Thêm sinh viên</legend>
                    <form method="POST" id="addingForm">
                        <div>
                            <label for="MSSV">MSSV: </label>
                            <input type="text" id="MSSV" name="MSSV" placeholder="Mã Số Sinh Viên" required>
                        </div>
                        <div>
                            <label for="hoTen">Họ Tên:</label>
                            <input type="text" id="hoTen" name="hoTen" placeholder="Họ Tên Sinh Viên" required>
                        </div>
                        <div>
                            <label for="ngaySinh">Ngày sinh: </label>
                            <input type="date" id="ngaySinh" name="ngaySinh" required>
                        </div>
                        <div>
                            <label for="gioiTinh">Giới tính: </label>

                            <input type="radio" name="gioiTinh" value="Nam" checked>Nam
                            <input type="radio" name="gioiTinh" value="Nữ">Nữ

                        </div>
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
                        <select id="tenLop" name="tenLop">
                            <!-- asd -->
                        </select>
                        <select id="khoa" name="khoa">
                            <option value="K45">K45</option>
                            <option value="K46">K46</option>
                            <option value="K47">K47</option>
                            <option value="K48">K48</option>
                            <option value="K49">K49</option>
                            <option value="K50">K50</option>
                        </select>
                        <button type="button" onclick="themSinhVien()">Thêm</button>
                    </form>
                </fieldset>
                <div id="anounceBox">
                
                </div>
            </div>



            <div id="container">
                <table id="studentList">
                </table>
            </div>

            <div id="nutPhanTrang">
            </div>

        </div>
    </main>

    <!-- Footer -->
    <?php
    require("../require/footer.html");
    ?>

</body>

</html>

<!-- Ẩn hiện side bar -->
<script src="../assets/js/hideNav.js"></script>

<!-- Chức năng lọc các ngành theo tên trường/khoa -->
<script src="../assets/js/danhSachNganh.js"></script>

<!-- Các chức năng thêm, sửa, xóa, tìm kiếm sinh viên -->
<script src="../assets/js/xoaSinhVien.js"></script>
<script src="../assets/js/hienThiSinhVien.js?v=1.0.1"></script>
<script src="../assets/js/themSinhVien.js"></script>
<script src="../assets/js/timSinhVien.js"></script>

<!-- Gọi hàm :v -->
<script>
    timSinhVien();
</script>