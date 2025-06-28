<?php
require_once("../config/db.php");
session_start();

function generateSecurityKey($length = 8)
{
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
    $key = '';
    for ($i = 0; $i < $length; $i++) {
        $key .= $characters[random_int(0, strlen($characters) - 1)];
    }
    return $key;
}

if (!isset($_SESSION['generatedKey'])) {
    $_SESSION['generatedKey'] = generateSecurityKey(8);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Đăng ký</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5 mb-5 p-5 border rounded shadow" style="max-width: 600px;">

        <h3 class="text-center mb-4 fw-bold">ĐĂNG KÝ QUẢN TRỊ VIÊN</h3>
        <form method="POST" class="mx-auto ">
            <div class="mb-3">
                <label for="hoTen" class="form-label">Họ và tên</label>
                <input type="text" class="form-control" id="hoTen" name="hoTen" required>
            </div>

            <div class="mb-3">
                <label for="ngaySinh" class="form-label">Ngày sinh</label>
                <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Giới tính</label><br>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioiTinh" value="Nam" checked>
                    <label class="form-check-label">Nam</label>
                </div>
                <div class="form-check form-check-inline">
                    <input class="form-check-input" type="radio" name="gioiTinh" value="Nu">
                    <label class="form-check-label">Nữ</label>
                </div>
            </div>

            <div class="mb-3">
                <label for="noiCongTac" class="form-label">Công tác tại</label>
                <select id="noiCongTac" name="noiCongTac" class="form-select" required>
                    <optgroup label="Cấp Trường">
                        <option value="DI">Trường CNTT&TT</option>
                        <option value="CN">Trường Bách Khoa</option>
                        <option value="KT">Trường Kinh Tế</option>
                        <option value="NN">Trường Nông Nghiệp</option>
                        <option value="SP">Trường Sư Phạm</option>
                        <option value="TS">Trường Thủy Sản</option>
                    </optgroup>
                    <optgroup label="Cấp Khoa">
                        <option value="DB">Khoa Dự Bị Dân Tộc</option>
                        <option value="MT">Khoa Chính Trị</option>
                        <option value="TN">Khoa Khoa Học Tự Nhiên</option>
                        <option value="XH">Khoa KHXH&NV</option>
                        <option value="KL">Khoa Luật</option>
                        <option value="MTN">Khoa MT&TNTN</option>
                        <option value="FL">Khoa Ngoại Ngữ</option>
                        <option value="TC">Khoa Giáo Dục Thể Chất</option>
                    </optgroup>
                </select>
            </div>

            <div class="mb-3">
                <label for="MSCB" class="form-label">Mã số cán bộ</label>
                <input type="text" class="form-control" id="MSCB" name="MSCB" minlength="6" maxlength="6" required>
            </div>

            <div class="mb-3">
                <label for="matKhau" class="form-label">Mật khẩu</label>
                <input type="password" class="form-control" id="matKhau" name="matKhau" required>
            </div>

            <div class="mb-3">
                <label for="matKhauXacNhan" class="form-label">Xác nhận mật khẩu</label>
                <input type="password" class="form-control" id="matKhauXacNhan" name="matKhauXacNhan" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Mã bảo vệ:
                    <strong style="font-family: monospace; font-size: 18px; color: #d32f2f;">
                        <?= htmlspecialchars($_SESSION['generatedKey']) ?>
                    </strong>
                </label>
                <input type="text" class="form-control mt-2" id="key" name="key" required minlength="8" maxlength="8">
            </div>

            <div class="mb-3 form-check">
                <input type="checkbox" class="form-check-input" id="camKet" name="camKet">
                <label class="form-check-label" for="camKet">Tôi cam kết thực hiện đúng trách nhiệm và nghĩa vụ</label>
            </div>

            <div class="d-grid gap-2">
                <button type="submit" name="submit" class="btn btn-primary">Đăng ký</button>
                <button type="reset" class="btn btn-outline-secondary">Hủy</button>
            </div>

            <div class="text-center mt-3">
                <small>Đã có tài khoản? <a href="login.php">Đăng nhập</a></small>
            </div>
        </form>
    </div>

    <script>
        document.querySelector("form").addEventListener("submit", function(e) {
            if (!document.getElementById("camKet").checked) {
                e.preventDefault();
                alert("Vui lòng xác nhận rằng bạn cam kết thực hiện đúng trách nhiệm và nghĩa vụ.");
            }
        });
    </script>
</body>

</html>