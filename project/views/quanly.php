<?php
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}
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
    <link href="../assets/css/style.css?v=213.1231" rel="stylesheet">
    <title>Sinh viên</title>

    <style>
        #content {
            /* overflow-y: scroll; */
            z-index: 1;
            display: grid;
            padding: 20px 0px;
            gap: 20px 0px;
            align-items: center;
            grid-template-areas:
                "box1 box2 box2"
                "searchBar pagin modify"
                "container container container"
            ;
            height: fit-content;
            max-height: 80svh;
            transition: 0.5s;
        }


        #box1 {
            grid-area: box1;
            width: 100%;
            transition: 1s;
            z-index: 0;
        }

        #searchBar {
            grid-area: searchBar;
            height: fit-content;
            display: flex;
            justify-content: center;
            gap: 10px;
        }

        #pagin {
            grid-area: pagin;
        }

        fieldset {
            display: flex;
            flex-direction: column;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);

            box-sizing: border-box;
            width: fit-content;
            justify-self: center;
        }

        fieldset * {
            width: 100%;
        }

        fieldset legend {
            width: fit-content;
            text-transform: uppercase;
            font-weight: 800;
            background-image: linear-gradient(to left, rgb(0, 0, 0), rgb(85, 113, 255));
            color: transparent;
            background-clip: text;
            animation: surfing 5s linear infinite;
        }

        #box1 #addingForm label {
            display: inline-block;
            font-size: 0.8em;
            font-weight: 800;
            min-width: fit-content;
            width: 5em;
            color: rgb(0, 0, 0);
            text-align: left;
        }

        #box1 input,
        #box1 select,
        #box1 button,
        #box1 input::placeholder {
            width: fit-content;
            font-size: 0.85em;
            background: none;
            color: rgba(82, 82, 77, 0.72);
            border-width: 0px 0px 2px 0px;
            font-weight: 800;
        }

        #box1 input::placeholder,
        #box1 input[type="date"] {
            font-size: 0.9em;
        }

        #box1 button {
            background-color: rgb(255, 255, 255);
            color: black;
            transition: 0.2s;
        }

        #box1 button:hover {
            transition: 0.2s;
            transform: scale(1.1);
            background-color: black;
            color: white;
        }

        #box1 div {
            width: fit-content;
        }

        #box1 #addingForm {
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

        #box2 {
            grid-area: box2;
            flex-wrap: wrap;
            justify-content: center;
            gap: 10px 0px;
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

        #searchBar button:hover,
        #pagin button:hover,
        #modify button:hover {
            transition: 0.2s;
            transform: scale(1.1);
            background-color: black;
            color: white;
        }

        .currentPage {
            transform: scale(1.1);
            background-color: black;
            color: white;
        }

        #anounceBox {
            grid-area: anounceBox;
            display: flex;
            justify-content: center;
            align-items: center;
            border: 5px solid #001528;
            border-radius: 0.5em;
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            width: 100%;
            height: 10em;
        }

        h2 {
            text-align: center;
            font-size: 0.8em;
            font-weight: 800;
            color: rgba(28, 108, 3, 1);
            text-transform: uppercase;
            animation: fade 5s forwards;
        }

        #pagin {
            grid-area: pagin;
            display: flex;
            justify-self: center;
            align-self: end;
            gap: 10px;
        }

        #container {
            grid-area: container;
            width: 100%;
            display: flex;
            align-self: start;
            justify-content: center;
        }

        #studentList {
            max-width: 100%;
            min-width: 95%;
            margin: 10px;
            border-collapse: collapse;
            background-color: red;
        }

        #studentList * {
            border: 1px solid black;
            text-align: center;
        }



        #studentList th,
        #studentList td {
            width: fit-content;
            min-width: 80px;
            max-width: 150px;
            padding: 5px 0px;
        }


        #studentList th {
            background-color: rgb(47, 79, 172);
            color: white;
            font-size: 0.8em;

        }

        .MSSV {
            pointer-events: none;
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

        #studentList tbody tr:hover {
            filter: brightness(0.9);
        }

        #studentList input,
        #studentList select,
        #studentList option {
            font-size: 1em;
            width: 80%;
            height: 100%;
            background: none;
            border: none;
        }

        /* #studentList option {
            font-size: 1.2em;
        } */

        #studentList .checkBox {
            appearance: none;
            width: 30px;
            height: 15px;
            background-color: white;
            align-items: center;
            border: 1px solid black;
            border-radius: 5px;
        }

        #studentList tr td:nth-last-child(1) .checkBox:checked {
            background-color: red;
        }

        #studentList tr td:nth-last-child(2) .checkBox:checked {
            background-color: green;
        }



        #addingForm {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
        }

        #modify {
            grid-area: modify;
            display: flex;
            justify-content: end;
            gap: 10px;
        }

        /* Responsive Styles */

        @media only screen and (max-width: 1000px) {
            * {
                font-size: 10px;
            }

            #box1,
            #box2 {
                display: none;
            }

            #content {
                grid-template-areas:
                    "searchBar searchBar"
                    "pagin modify"
                    "container container";
                height: fit-content;
            }
        }

        #modify {
            justify-content: center;
        }





        @keyframes fade {
            from {
                opacity: 1;
            }

            to {
                opacity: 0;
            }
        }
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
        <div id="content">



            <!-- box1 -->
            <div id="box1">
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
                            <!-- <div>
                                <label for="ngaySinh">Ngày sinh: </label>
                                <input type="date" id="ngaySinh" name="ngaySinh">
                            </div> -->
                            <div>
                                <label for="gioiTinh">Giới tính: </label>

                                <input type="radio" name="gioiTinh" value="Nam" checked>Nam
                                <input type="radio" name="gioiTinh" value="Nữ">Nữ

                            </div>
                        </div>
                        <div id="col2">
                            <div>
                                <label for="maKhoaTruong">Trường</label>
                                <select id="maKhoaTruong" name="maKhoaTruong">
                                    <optgroup label="Trường/Khoa đào tạo">
                                        <option value="DA">Viện Công nghệ Sinh học và thực phẩm</option>
                                        <option value="DI">Trường Công nghệ Thông tin và Truyền thông</option>
                                        <option value="KT">Trường Kinh tế</option>
                                        <option value="TN">Trường Bách khoa</option>
                                        <option value="NN">Trường Nông nghiệp</option>
                                        <option value="TS">Trường Thủy sản</option>
                                        <option value="FL">Khoa Ngoại ngữ</option>
                                        <option value="HG">Khoa Phát triển Nông thôn</option>
                                        <option value="KH">Khoa Khoa học Tự nhiên</option>
                                        <option value="KL">Khoa Luật</option>
                                        <option value="ML">Khoa Khoa học Chính trị</option>
                                        <option value="MT">Khoa Môi trường và Tài nguyên thiên nhiên</option>
                                        <option value="SP">Khoa Sư phạm</option>
                                        <option value="TD">Khoa Giáo dục thể chất</option>
                                        <option value="XH">Khoa Khoa học Xã hội và Nhân văn</option>
                                    </optgroup>
                                </select>
                            </div>
                            <div>
                                <label for="maLop">Lớp</label>
                                <select id="maLop" name="maLop">
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

            <!-- box2 -->
            <div id="box2">
                <div id="anounceBox">
                    <h2>Hộp thông báo</h2>
                </div>
                <h3 style='text-align:center; font-size:1.2em; color:goldenrod'>Thông báo</h3>
            </div>

            <!-- searchBar -->
            <form method="GET" id="searchBar">
                <select id="searchingField" name="searchingField">
                    <option value="MSSV">Mã Số Sinh Viên</option>
                    <option value="hoTen">Họ Tên Sinh Viên</option>
                    <option value="gioiTinh">Giới Tính</option>
                    <option value="tenLop">Tên Lớp</option>
                    <option value="maKhoaTruong">Mã Trường</option>
                    <option value="khoa">Khóa</option>
                </select>
                <input type="text" name="fieldValue" placeholder="...">
                <button type="button" onclick="timSinhVien()">Tìm Kiếm</button>
                <button type="button" onclick="window.location.reload()">Hủy</button>
            </form>

            <!-- pagin -->
            <div id="pagin">
            </div>


            <!-- modify -->
            <div id="modify">
                <div>
                    <button onclick='danhSachSua()'>
                        Cập nhật
                    </button>
                </div>

                <div>
                    <button onclick='danhSachXoa()'>
                        Xóa
                    </button>
                </div>
            </div>

            <!-- container -->
            <div id="container">
                <table id="studentList">
                </table>
            </div>


        </div>

        <!-- Footer -->
        <?php
        require("../shared/footer.html");
        ?>

    </div>
</body>


</html>





<!-- Các chức năng thêm, sửa, xóa, tìm kiếm sinh viên -->
<script src="../assets/js/hienThiSinhVien.js?v=2.2.123312.3.23.0"></script>
<script src="../assets/js/themSinhVien.js?v=21.1223.12.123.33.21.33"></script>
<script src="../assets/js/timSinhVien.js?v=133.1.132.33"></script>
<script src="../assets/js/xoaSinhVien.js?v=12..23.1á..21"></script>
<script src="../assets/js/suaSinhVien.js?v=52.123.1"></script>
<script src="../assets/js/khoaTruong.js?v=121.123.90.23.123"></script>
<script src="../assets/js/lop.js?v=123.1233.345"></script>

<!-- Gọi hàm :v -->
<script>
    // Gán danh sách lớp cho hộp công cụ thêm sinh viên
    ganDanhSachLop(document.getElementById('maKhoaTruong').value);
    timSinhVien();

    // Bắt sự kiện khi người dùng thay đổi lựa chọn tên trường/khoa sẽ thay đổi các lựa chọn lớp
    document.getElementById("maKhoaTruong").onchange = function() {
        ganDanhSachLop(document.getElementById('maKhoaTruong').value);
    }

    function chiTiet(MSSV) {
        localStorage.setItem("MSSV", MSSV);
        window.location.href = "./chiTiet.php";
    }

    // Gán danh sách lớp dựa trên Khoa/Trường của sinh viên
    function ganDanhSachLopV2(selectTag) {
        let maLopField = selectTag.closest('td').nextElementSibling.children[0];
        let ds = danhSachLop(selectTag.value);
        let output = "";
        for (let lop of ds) {
            output += "<option value='" + lop.maLop + "'>" + lop.tenLop + "</option>";
        }
        maLopField.innerHTML = output;
    }

    //Truy vết những sinh viên cần sửa
    function danhSachSua() {
        const targets = document.getElementsByName('update');
        for (let sv of targets) {
            if (sv.checked === true) {
                let row = sv.closest('tr');
                let inputs = row.querySelectorAll('input');
                let selects = row.querySelectorAll('select');
                let data = {
                    type: 0,
                    MSSV: inputs[0].value,
                    hoTen: inputs[1].value,
                    gioiTinh: selects[0].value,
                    maKhoaTruong: selects[1].value,
                    maLop: selects[2].value,
                    khoa: selects[3].value
                }
                suaSinhVien(JSON.stringify(data));
            }
        }
    }

    //Truy vết những sinh viên cần xóa
    function danhSachXoa(){
    const targets = document.getElementsByName("remove");
    for (let sv of targets){
        if (sv.checked === true){
            let row = sv.parentElement.parentElement;
            let MSSV = row.querySelectorAll('input')[0].value;
            xoaSinhVien(MSSV);
        }
    }
}
</script>
</script>