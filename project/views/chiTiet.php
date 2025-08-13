<?php
require("../config/db.php");
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../shared/banner/logo.png">
    <link rel="stylesheet" href="../assets/sidebar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>
    </title>
    <style>
        #sideBar {
            background-color: red !important;
        }

        #content {
            display: grid;
            /* grid-template-columns: auto; */
            /* grid-template-rows: auto; */
            grid-template-areas:
                "a1 a2"
                "a1 a3"

            ;
            gap: 10%;
            padding: 10px 50px;
        }

        #a1 {
            grid-area: a1;
            height: fit-content;
        }

        #a2 {
            grid-area: a2;
            height: fit-content;
        }

        #a3 {
            grid-area: a3;
            width: 100%;
            height: fit-content;
            display: flex;
            gap: 10px;
            justify-content: center;
        }

        #a3 button {
            border: 1px solid white;
            border-radius: 10px;
            width: 120px;
            height: 50px;
            padding: 5px;
            /* background: linear-gradient(to bottom, rgba(157, 216, 255, 1), rgba(25, 64, 148, 0.9)); */
            color: white;
            transition: 0.5s;

        }

        #a3 button:hover {
            /* transition: 1.5s; */
            transform: scale(1.1);
            animation: slide 0.3s forwards;
        }

        .btn-donate {
            --clr-font-main: #333;
            --btn-bg-1: #61daff;
            --btn-bg-2: #0d47a1;
            --btn-bg-color: #fff;
            --radii: 0.5em;
            background-image: linear-gradient(325deg, var(--btn-bg-2) 0, var(--btn-bg-1) 55%, var(--btn-bg-2) 90%);
            background-size: 280% auto;
            border: none;
            border-radius: var(--radii);
            box-shadow: 0 0 20px #47b8ff80, 0 5px 5px -1px #3a7de940, inset 4px 4px 8px #afe6ff80, inset -4px -4px 8px #135fd859;
            color: var(--btn-bg-color);
            cursor: pointer;
            font-family: Segoe UI, system-ui, sans-serif;
            font-size: 1rem;
            font-size: var(--size, 1rem);
            padding: .5em 1em;
            transition: .8s;
        }

        @keyframes slide {
            to {
                background-position-y: -50px;
                background-position-x: -120px;
            }

        }

        .box {
            min-width: fit-content;
            min-height: fit-content;
            padding: 10px;
            border: 2px solid #ddd;
            border-radius: 10px;
            background-color: #eee;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        input,
        textarea,
        select,
        option {
            width: fit-content;
            max-width: 200px;
            background: rgba(255, 255, 255, 1);
            border-width: 0px;
            border-radius: 5px;
            color: rgba(155, 154, 154, 1)
        }

        td {
            padding: 20px;
        }

        @media only screen and (max-width: 1000px) {
            #content {
                grid-template-areas:
                    "a3"
                    "a1"
                    "a2"
                ;
                /* gap:100px; */
            }

            #a1,
            #a2,
            #a3 {
                min-height: fit-content !important;
                height: fit-content;
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
            <div id="a1" class="box">
                <h2>Thông tin sinh viên</h2>
                <table>
                    <tbody>
                        <tr>
                            <td><label for="MSSV">Mã số sinh viên: </label></td>
                            <td><input type="text" id="MSSV" name="MSSV" disabled style="color:black"></td>
                        </tr>
                        <tr>
                            <td><label for="hoTen">Họ tên đầy đủ: </label></td>
                            <td><input type="text" id="hoTen" name="hoTen"></td>
                        </tr>
                        <tr>
                            <td><label for="ngaySinh">Ngày sinh: </label></td>
                            <td><input type="date" id="ngaySinh" name="ngaySinh"></td>
                        </tr>
                        <tr>
                            <td><label for="gioiTinh">Giới tính: </td>
                            <td>
                                <input type="radio" value="Nam" id="Nam" name="gioiTinh">Nam
                                <input type="radio" value="Nữ" id="Nữ" name="gioiTinh">Nữ
                            </td>
                        </tr>
                        <tr>
                            <td><label for="soDienThoai">Số điện thoại: </label></td>
                            <td><input type="number" id="soDienThoai" name="soDienThoai"></td>
                        </tr>
                        <tr>
                            <td><label for="email">Email: </label></td>
                            <td><input type="email" id="email" name="email"></td>
                        </tr>
                        <tr>
                            <td><label for="diaChi">Địa chỉ thường trú: </td>
                            <td><textarea id="diaChi" id="diaChi" name="diaChi"></textarea></td>
                        </tr>
                    </tbody>
                </table>

            </div>
            <div id="a2" class="box">
                <h2>Chương trình đào tạo</h2>
                <table>
                    <tbody>
                        <tr>
                            <td><label for="maKhoaTruong">Khoa/Trường: </label></td>
                            <td>
                                <select id="maKhoaTruong" name="maKhoaTruong" onchange="ganDanhSachLop(this.value)">
                                    <!-- Mã nhúng -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="maLop">Ngành đào tạo: </label></td>
                            <td>
                                <select id="maLop" name="maLop">
                                    <!-- Mã nhúng -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="khoa">Khóa: </label></td>
                            <td>
                                <select id="khoa" name="khoa">
                                    <!-- Mã nhúng -->
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="MSCB">Cố vấn học tập: </label></td>
                            <td><span id="MSCB" name="MSCB"> Thầy </span></td>
                        </tr>
                        <tr>
                            <td><label for="emailCB">Email cố vấn: </label></td>
                            <td><span id="emailCB" name="emailCB">@thay</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div id="a3">
                <button type="button" class="btn-donate" onclick="capNhat()">Cập nhật</button>
                <button type="button" class="btn-donate" onclick="confirmXoa()">Xóa sinh viên</button>

                <button type="button" class="btn-donate" onclick="huy()">Đặt lại</button>
                <button type="button" class="btn-donate" onclick="window.close()">Tắt tab</button>
            </div>
        </div>

        <!-- Footer -->
        <?php
        require("../shared/footer.html");
        ?>

    </div>


    <!-- Các hàm thêm, sửa, xóa sinh viên -->
    <script src="../assets/js/xoaSinhVien.js?v=12.23..21"></script>
    <script src="../assets/js/suaSinhVien.js?v=52.123.1"></script>
    <script src="../assets/js/khoaTruong.js?v=121.123.90.23.123"></script>
    <script src="../assets/js/lop.js?v=123.1233.345"></script>


    <!-- script chính -->
    <script>
        const MSSV = localStorage.getItem("MSSV");
        document.getElementsByTagName("title")[0].innerHTML = MSSV;
        ganThongTin();


        function ganThongTin() {
            const data = layThongTin();

            //Xử lý input
            document.getElementById("hoTen").value = data.hoTen;
            document.getElementById("MSSV").value = data.MSSV;
            document.getElementById("soDienThoai").value = data.soDienThoai;
            document.getElementById("email").value = data.email;
            document.getElementById("diaChi").value = data.diaChi;
            document.getElementById("ngaySinh").value = data.ngaySinh;
            //Xử lý radio
            if (data.gioiTinh == "Nam")
                document.getElementById("Nam").checked = true;
            else
                document.getElementById("Nữ").checked = true;

            //Xử lý select

            //Khoa/Trường
            const khoaTruong = JSON.parse((localStorage.getItem("danhSachKhoaTruong")));
            let row = "";
            let MKT;
            for (let truong of khoaTruong) {
                if (truong.maKhoaTruong == data.maKhoaTruong) {
                    row += "<option value='" + truong.maKhoaTruong + "' selected>" + truong.tenKhoaTruong + "</option>";
                    MKT = truong.maKhoaTruong;
                } else
                    row += "<option value='" + truong.maKhoaTruong + "'>" + truong.tenKhoaTruong + "</option>";
            }
            document.getElementById("maKhoaTruong").innerHTML = row;

            //Lớp
            const lop = JSON.parse(localStorage.getItem("lop" + MKT));
            row = "";
            for (let l of lop) {
                if (l.maLop == data.maLop)
                    row += "<option value='" + l.maLop + "' selected>" + l.tenLop + "</option>";
                else
                    row += "<option value='" + l.maLop + "'>" + l.tenLop + "</option>";
            }
            document.getElementById("maLop").innerHTML = row;

            //Khóa
            row = "";
            for (let i = 45; i <= 50; i++) {
                if (("K" + i).toUpperCase() == data.khoa)
                    row += "<option value='K" + i + "' selected>K" + i + "</option>"
                else
                    row += "<option value='K" + i + "'>K" + i + "</option>"
            }
            document.getElementById("khoa").innerHTML = row;

        }

        function layThongTin() {
            const xhttp = new XMLHttpRequest();
            xhttp.open("GET", "../controllers/laySinhVien.php?MSSV=" + MSSV, false);
            xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
            xhttp.send();

            const sv = JSON.parse(xhttp.responseText);
            return sv.data;
        }




        function capNhat() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                const response = JSON.parse(this.responseText);
            }

            let gender = document.getElementById("Nam").checked == true ? "Nam" : "Nữ";
            const data = {
                type: 1,
                //inputs
                hoTen: document.getElementById("hoTen").value,
                MSSV: document.getElementById("MSSV").value,
                ngaySinh: document.getElementById("ngaySinh").value,
                soDienThoai: document.getElementById("soDienThoai").value,
                email: document.getElementById("email").value,
                diaChi: document.getElementById("diaChi").value,

                //selects
                gioiTinh: gender,
                maLop: document.getElementById("maLop").value,
                khoa: document.getElementById("khoa").value
            }
            xhttp.open("POST", "../controllers/suaSinhVien.php");
            xhttp.send(JSON.stringify(data));
        }

        function confirmXoa() {
            if (confirm("Xác nhận xóa sinh viên")) {
                xoaSinhVien(document.getElementById("MSSV").value);
                setTimeout(() => {
                    window.close()
                }, 1500);
            }
        }

        function huy() {
            ganThongTin()
        }
    </script>
</body>

</html>