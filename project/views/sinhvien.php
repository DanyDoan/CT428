<?php
require("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
    <link rel="stylesheet" href="../assets/css/style.css?v=2.3.4.5.10">
    <style>
        #content {
            z-index: 1;
            display: grid;
            padding: 30px 10px;
            gap: 30px 10px;
            grid-template-rows: auto 30px 1fr 20px;
            grid-template-areas:
                "toolBox"
                "searchBar"
                "container"
                "pagination";
            /* position: relative; */
            transition: 0.5s;
            background-image: linear-gradient(to bottom, rgba(252, 252, 255, 0.69), rgba(164, 164, 164, 0.55));
            /* animation: surf 2s linear infinite; */
        }

        @keyframes surf {
            to {
                background-position-y: 80svh;
            }
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
            background-color: rgba(198, 213, 219, 0.92);
        }

        #toolBox fieldset * {
            width: 100%;
        }

        #toolBox fieldset legend {
            width: fit-content;
        }

        #toolBox #addingForm label {
            display: inline-block;
            font-size: 0.9em;
            font-weight: 800;
            width: 5em;
            min-width: 50px;
            color: rgb(3, 21, 75);
        }

        #toolBox input,
        #toolBox select,
        #toolBox button,
        #toolBox input::placeholder {
            width: fit-content;
            font-size: 0.8em;
            background: none;
            color: rgb(8, 8, 8);
            border-width: 0px 0px 2px 0px;
            font-weight: 800;
        }

        #toolBox input::placeholder {
            font-size: 1em;
        }

        #toolBox button {
            background-color: rgb(255, 255, 255);
            color: black;
            transition: 0.2s;
        }

        #toolBox button:hover {
            transition: 0.2s;
            transform: scale(1.05);
        }

        #toolBox div {
            width: fit-content;
        }

        #addingForm {
            display: flex;
            justify-content: space-around;
        }

        #col1,
        #col2 {
            display: flex;
            flex-direction: column;
            gap: 10px;
        }

        #col1 div, #col2 div{
            width: 100%;
            display: flex;
            gap:10px;
        }
        #searchBar {
            grid-area: searchBar;
        }

        #searchBar form {
            width: 100%;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        #searchingForm label {
            font-weight: 800;
            font-size: 1.2em;
            background-image: linear-gradient(rgb(5, 11, 81), rgb(0, 0, 0));
            color: transparent;
            background-clip: text;
        }

        #searchingForm input,
        #searchingForm select {
            border-width: 0px 0px 1px 0px;
            background: none;
        }

        input:focus,
        select:focus {
            background-color: white;
        }

        #searchingForm button {
            position: relative;
            top: 5px;
            width: 20px;
            height: 20px;
            background-image: url("../assets/images/loupe.png");
            background-size: contain;
            background-repeat: no-repeat;
            background-color: rgba(218, 142, 142, 0);
            border: none;
            transition: 0.2s;
        }

        #searchingForm button:hover {
            transition: 0.2s;
            transform: scale(1.1);
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
            max-width: fit-content;
        }
        #studentList tr td:nth-last-child(1){
            width: fit-content;
            max-width: 0.1em;
        }
        #studentList .icon {
            height: 15px;
            width: 15px;
            font-size: 5px;
            margin: 2px;
            background-color: rgba(0, 0, 0, 0);
            background-size: contain;
            background-repeat: no-repeat;
            background-position: center;
            border:none;
            transition: 0.2s;
        }

        #studentList .icon:nth-child(odd) {
            background-image: url("../assets/images/check.png");
        }

        #studentList .icon:nth-child(even) {
            background-image: url("../assets/images/close.png");
        }

        #studentList .icon:hover{
            transition: 0.2s;
            transform: scale(1.1);
        }
        #studentList tr {
            background-color: rgba(205, 233, 46, 0.43);
        }

        #studentList tr:nth-child(2n) {
            background-color: rgb(244, 244, 244);
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
            gap: 10px;
            gap: 10px;
            bottom: 10px;
        }

        #anounceBox {
            position: absolute;
            right: 20px;
        }

        #addingForm {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        /* Responsive Styles */

        @media only screen and (max-width: 700px) {
            * {
                font-size: 12px;
            }

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
            /* animation: fade 5s forwards; */
        }


        @keyframes fade {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }


        @media only screen and (max-width: 400px) {
            * {
                display: none;
            }
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
                    <label for="searchingField">Tìm kiếm</label>
                    <select id="searchingField" name="searchingField">
                        <option value="MSSV">Mã Số Sinh Viên</option>
                        <option value="hoTen">Họ Tên Sinh Viên</option>
                        <option value="gioiTinh">Giới Tính</option>
                        <option value="tenLop">Tên Lớp</option>
                        <option value="truong">Trường</option>
                        <option value="khoa">Khóa</option>
                    </select>
                    <input type="text" name="fieldValue" placeholder="...">
                    <button type="button" onclick="timSinhVien()"></button>
                </form>
            </div>
            <div id="toolBox">
                <fieldset>
                    <legend>Thêm sinh viên</legend>
                    <form method="POST" id="addingForm">
                        <div id="col1">
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

<script>
    function hide() {
        document.getElementById("content").classList.toggle("active");
    }
</script>
<!-- Ẩn hiện side bar -->
<script src="../assets/js/hideNav.js"></script>

<!-- Chức năng lọc các ngành theo tên trường/khoa -->
<script src="../assets/js/danhSachNganh.js?v=1.9.10"></script>

<!-- Các chức năng thêm, sửa, xóa, tìm kiếm sinh viên -->
<script src="../assets/js/hienThiSinhVien.js?v=0.10.10"></script>
<script src="../assets/js/themSinhVien.js?v=1.3.8"></script>
<script src="../assets/js/timSinhVien.js?v=1.123.2130"></script>
<script src="../assets/js/xoaSinhVien.js?v=1.120.2"></script>
<script src="../assets/js/suaSinhVien.js?v=1.2.5.123.23"></script>

<!-- Gọi hàm :v -->
<script>
    timSinhVien();
</script>