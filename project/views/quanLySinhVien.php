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
    <link rel="stylesheet" href="../assets/css/sidebar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/quanLySinhVien.css?v=123.123" rel="stylesheet">
    <title>Quản lý</title>


</head>

<body>

    <!-- Sidebar -->
    <?php require("../shared/sideBar.php"); ?>

    <div id="main">

        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <!-- Content -->
        <div id="content">



            <!-- box1 -->
            <div id="box1">
                <fieldset>
                    <!-- <legend>Thêm sinh viên</legend> -->
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
                                <label for="maKhoaTruong">Trường: </label>
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
                                <label for="maLop">Lớp: </label>
                                <select id="maLop" name="maLop">
                                    <!-- asd -->
                                </select>

                            </div>
                            <div>
                                <label for="khoa">Khóa: </label>
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
                        </div>
                    </form>
                </fieldset>


            </div>

            <!-- box2 -->
            <div id="box2">
                <div id="anounceBox">
                    <!-- <h2>Hộp thông báo</h2> -->
                </div>
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
                <button type="button" onclick="timSinhVien()"> <i class="bi bi-search feature-icon"></i>
                </button>
                <button type="button" onclick="window.location.reload()">Hủy</button>
            </form>


            <!-- modify -->
            <div id="modify">
                <button onclick='danhSachSua()'>
                    Cập nhật
                </button>


                <button onclick='danhSachXoa()'>
                    Xóa
                </button>
            </div>

            <!-- pagin -->
            <div id="pagin">
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

    //Vào trang thông tin cá nhân của sinh viên cụ thể
    function chiTiet(MSSV) {
        localStorage.setItem("MSSV", MSSV);
        window.open("./chiTiet.php", "_blank");
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
    function danhSachXoa() {
        const targets = document.getElementsByName("remove");
        for (let sv of targets) {
            if (sv.checked === true) {
                let row = sv.parentElement.parentElement;
                let MSSV = row.querySelectorAll('input')[0].value;
                xoaSinhVien(MSSV);
            }
        }
    }
</script>
</script>