<?php
require("../config/db.php");
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: dangNhap.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/sidebar-style.css">
    <link rel="stylesheet" href="../assets/css/chiTiet.css">
    <title>
    </title>

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
                            <td><label for="tenCoVan">Cố vấn học tập: </label></td>
                            <td><span id="tenCoVan" name="tenCoVan">
                                    <!-- Mã nhúng -->
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="emailCoVan">Email cố vấn: </label></td>
                            <td>
                                <span id="emailCoVan" name="emailCoVan">
                                    <!-- Mã nhúng -->
                                </span>
                            </td>
                        </tr>
                        <tr>
                            <td><label for="soDienThoaiCoVan">Số điện thoại cố vấn: </label></td>
                            <td>
                                <span id="soDienThoaiCoVan" name="soDienThoaiCoVan">
                                    <!-- Mã nhúng -->
                                </span>
                            </td>
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
            document.getElementById("hoTen").value = data.sv.hoTen;
            document.getElementById("MSSV").value = data.sv.MSSV;
            document.getElementById("soDienThoai").value = data.sv.soDienThoai;
            document.getElementById("email").value = data.sv.email;
            document.getElementById("diaChi").value = data.sv.diaChi;
            document.getElementById("ngaySinh").value = data.sv.ngaySinh;
            if (data.cb == null) {
                document.getElementById("tenCoVan").innerText = "Chưa có thông tin";
                document.getElementById("emailCoVan").innerText = "Chưa có thông tin";
                document.getElementById("soDienThoaiCoVan").innerText = "Chưa có thông tin";
            } else {
                document.getElementById("tenCoVan").innerText = data.cb.hoTen || "Chưa có thông tin";
                document.getElementById("emailCoVan").innerText = data.cb.email || "Chưa có thông tin";
                document.getElementById("soDienThoaiCoVan").innerText = data.cb.soDienThoai || "Chưa có thông tin";
            }

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
                if (truong.maKhoaTruong == data.sv.maKhoaTruong) {
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
                if (l.maLop == data.sv.maLop)
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
            xhttp.open("GET", "../controllers/laySinhVien.php?MSSV=" + localStorage.getItem("MSSV"), false);
            xhttp.send();

            if (xhttp.status === 200) {
                try {
                    return JSON.parse(xhttp.responseText);
                } catch (err) {
                    console.error("JSON parse error:", err, xhttp.responseText);
                    return null;
                }
            } else {
                console.error("Request error:", xhttp.status, xhttp.statusText);
                return null;
            }
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