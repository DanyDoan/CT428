<?php
session_start();
require_once("../config/db.php");

if (!isset($_SESSION['MSCB'])) {
    header("Location: dangNhap.php");
    exit;
}

$MSCB = $_SESSION['MSCB'];
$error = "";
$success = "";

// Lấy thông tin người dùng
$stmt = $conn->prepare("SELECT * FROM CANBO JOIN LOP ON LOP.maLop = CANBO.maLop WHERE MSCB = ?");
$stmt->bind_param("s", $MSCB);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();
$stmt->close();

// Xử lý cập nhật
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $hoTen = $_POST['hoTen'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    // $noiCongTac = $_POST['noiCongTac'];
    $maLop = $_POST['maLop'] ?? "";
    $diaChi = $_POST['diaChi'] ?? "";
    $chucVu = $_POST['chucVu'] ?? "";
    $email = $_POST['email'] ?? "";
    $soDienThoai = $_POST['soDienThoai'] ?? "";

    // Kiểm tra nếu người dùng muốn đổi mật khẩu
    $changePassword = isset($_POST['change_password']) && $_POST['change_password'] == '1';

    if ($changePassword) {
        $matKhauCu = trim($_POST['matKhauCu']);
        $matKhauMoi = trim($_POST['matKhauMoi']);

        // Kiểm tra mật khẩu cũ
        if (!password_verify($matKhauCu, $user['matKhau'])) {
            $error = "Mật khẩu cũ không chính xác";
        }
        // Kiểm tra độ mạnh mật khẩu mới
        elseif (!preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/', $matKhauMoi)) {
            $error = "Mật khẩu mới yếu (tối thiểu 8 ký tự, gồm chữ hoa, chữ thường, số và ký tự đặc biệt)";
        } else {
            $hashedPassword = password_hash($matKhauMoi, PASSWORD_DEFAULT);
            if (!empty($maLop)) {
                $stmt = $conn->prepare("UPDATE CANBO SET hoTen=?, ngaySinh=?, gioiTinh=?, diaChi=?, chucVu=?, email=?,soDienThoai=?,maLop=?,matKhau=? WHERE MSCB=?");
                $stmt->bind_param("ssssssssss", $hoTen, $ngaySinh, $gioiTinh, $diaChi, $chucVu, $email, $soDienThoai, $maLop, $hashedPassword, $MSCB);
            } else {
                $stmt = $conn->prepare("UPDATE CANBO SET hoTen=?, ngaySinh=?, gioiTinh=?, diaChi=?, chucVu=?, email=?,soDienThoai=?,matKhau=? WHERE MSCB=?");
                $stmt->bind_param("sssssssss", $hoTen, $ngaySinh, $gioiTinh, $diaChi, $chucVu, $email, $soDienThoai, $hashedPassword, $MSCB);
            }
        }
    } else {
        // Không đổi mật khẩu
        if (!empty($maLop)) {
            $stmt = $conn->prepare("UPDATE CANBO SET hoTen=?, ngaySinh=?,gioiTinh=?, diaChi=?, chucVu=?,email=?,soDienThoai=?,maLop=? WHERE MSCB=?");
            $stmt->bind_param("sssssssss", $hoTen, $ngaySinh, $gioiTinh, $diaChi, $chucVu, $email, $soDienThoai, $maLop, $MSCB);
        } else {
            $stmt = $conn->prepare("UPDATE CANBO SET hoTen=?, ngaySinh=?,gioiTinh=?, diaChi=?, chucVu=?,email=?,soDienThoai=? WHERE MSCB=?");
            $stmt->bind_param("ssssssss", $hoTen, $ngaySinh, $gioiTinh, $diaChi, $chucVu, $email, $soDienThoai, $MSCB);
        }
    }

    if (empty($error)) {
        if ($stmt->execute()) {
            $success = "Cập nhật thông tin thành công!";
            $user['hoTen'] = $hoTen;
            $user['ngaySinh'] = $ngaySinh;
            $user['gioiTinh'] = $gioiTinh;
            // $user['noiCongTac'] = $noiCongTac;
            if (!empty($maLop)) {
                $user['maLop'] = $maLop;
            }
            $user['diaChi'] = $diaChi;
            $user['chucVu'] = $chucVu;
            $user['email'] = $email;
            $user['soDienThoai'] = $soDienThoai;
            $_SESSION["chucVu"] = $chucVu;
            header("Location: ./canBo.php");
        } else {
            $error = "Lỗi cập nhật: " . $stmt->error;
        }

        $stmt->close();
    }
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/css/capNhatCanBo.css" rel="stylesheet">
    <title>Cập nhật thông tin cán bộ</title>


</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card p-5 shadow rounded-4" style="width: 100%; max-width: 600px;">
            <h3 class="text-center mb-4 fw-bold text-uppercase text-primary">Cập nhật thông tin</h3>

            <?php if (!empty($error)): ?>
                <div class="alert alert-danger"><?= htmlspecialchars($error) ?></div>
            <?php elseif (!empty($success)): ?>
                <div class="alert alert-success"><?= htmlspecialchars($success) ?></div>
            <?php endif; ?>

            <form method="POST">
                <div class="mb-3">
                    <label for="hoTen" class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" id="hoTen" name="hoTen" value="<?= htmlspecialchars($user['hoTen']) ?>" required>
                </div>

                <div class="mb-3">
                    <label for="ngaySinh" class="form-label">Ngày sinh</label>
                    <input type="date" class="form-control" id="ngaySinh" name="ngaySinh" value="<?= htmlspecialchars($user['ngaySinh']) ?>" required>
                </div>

                <div class="mb-3">
                    <label class="form-label">Giới tính</label><br>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioiTinh" value="Nam" <?= $user['gioiTinh'] === 'Nam' ? 'checked' : '' ?>>
                        <label class="form-check-label">Nam</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="gioiTinh" value="Nu" <?= $user['gioiTinh'] === 'Nu' ? 'checked' : '' ?>>
                        <label class="form-check-label">Nữ</label>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="diaChi" class="form-label">Địa chỉ</label>
                    <textarea class="form-control" id="diaChi" name="diaChi" value="<?= htmlspecialchars($user['diaChi']) ?>"></textarea>
                </div>

                <div class="mb-3">
                    <label for="chucVu" class="form-label">Trình độ</label>
                    <select id="chucVu" name="chucVu" class="form-select">
                        <option value="Giáo sư" <?= $user['chucVu'] === 'Giáo sư' ? 'selected' : '' ?>>Giáo sư</option>
                        <option value="Phó giáo sư" <?= $user['chucVu'] === 'Phó giáo sư' ? 'selected' : '' ?>>Phó giáo sư</option>
                        <option value="Tiến sĩ" <?= $user['chucVu'] === 'Tiến sĩ' ? 'selected' : '' ?>>Tiến sĩ</option>
                        <option value="Thạc sĩ" <?= $user['chucVu'] === 'Thạc sĩ' ? 'selected' : '' ?>>Thạc sĩ</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="text" class="form-control" id="email" name="email" value="<?= htmlspecialchars($user['email']) ?>" required>
                </div>


                <div class="mb-3">
                    <label for="soDienThoai" class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" id="soDienThoai" name="soDienThoai" value="<?= htmlspecialchars($user['soDienThoai']) ?>">
                </div>

                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="change_lopCoVan_checkbox" name="change_lopCoVan" value="1">
                    <label class="form-check-label" for="change_lopCoVan_checkbox">Đổi lớp cố vấn</label>
                </div>
                <div id="lopCoVan-fields" class="lopCoVan-fields">
                    <div class="mb-3">
                        <label for="noiCongTac" class="form-label">Công tác tại</label>
                        <select id="noiCongTac" name="noiCongTac" class="form-select">
                            <option value="">-- Chọn Khoa / Trường --</option>
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
                    </div>
                    <div class="mb-3">
                        <label for="maLop" class="form-label">Lớp cố vấn</label>
                        <select id="maLop" name="maLop" class="form-select">
                            <option value="">-- Chọn lớp --</option>
                        </select>
                    </div>
                </div>
                <div class="mb-3 form-check">
                    <input type="checkbox" class="form-check-input" id="change_password_checkbox" name="change_password" value="1">
                    <label class="form-check-label" for="change_password_checkbox">Đổi mật khẩu</label>
                </div>

                <div id="password_fields" class="password-fields">
                    <div class="mb-3">
                        <label for="matKhauCu" class="form-label">Mật khẩu cũ</label>
                        <input type="password" class="form-control" id="matKhauCu" name="matKhauCu">
                    </div>

                    <div class="mb-3">
                        <label for="matKhauMoi" class="form-label">Mật khẩu mới</label>
                        <input type="password" class="form-control" id="matKhauMoi" name="matKhauMoi">
                        <div class="password-strength">
                            <div class="password-strength-bar" id="password-strength-bar"></div>
                        </div>
                        <small id="password-help" class="form-text text-muted">
                            Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt
                        </small>
                        <div id="password-feedback" class="form-text"></div>
                    </div>
                </div>

                <div class="d-grid gap-2">
                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                    <a href="canBo.php" class="btn btn-outline-secondary">Quay lại</a>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkbox = document.getElementById('change_password_checkbox');
            const passwordFields = document.getElementById('password_fields');
            const passwordInput = document.getElementById('matKhauMoi');
            const passwordBar = document.getElementById('password-strength-bar');
            const passwordFeedback = document.getElementById('password-feedback');

            // Xử lý hiển thị/ẩn trường mật khẩu
            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    passwordFields.style.display = 'block';
                    document.getElementById('matKhauCu').required = true;
                    document.getElementById('matKhauMoi').required = true;
                } else {
                    passwordFields.style.display = 'none';
                    document.getElementById('matKhauCu').required = false;
                    document.getElementById('matKhauMoi').required = false;
                }
            });

            // Kiểm tra nếu checkbox đã được chọn (khi có lỗi và form được load lại)
            if (checkbox.checked) {
                passwordFields.style.display = 'block';
            }

            // Kiểm tra độ mạnh mật khẩu khi người dùng nhập
            passwordInput.addEventListener('input', function() {
                const password = this.value;
                const strongRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/;

                // Reset classes
                passwordBar.className = 'password-strength-bar';
                passwordFeedback.textContent = '';

                if (password.length === 0) {
                    passwordBar.style.width = '0%';
                    return;
                }

                // Kiểm tra độ mạnh
                if (password.length < 8) {
                    passwordBar.className = 'password-strength-bar weak';
                    passwordFeedback.textContent = 'Mật khẩu quá ngắn (tối thiểu 8 ký tự)';
                    passwordFeedback.className = 'form-text text-danger';
                } else {
                    let strength = 0;

                    // Kiểm tra các yếu tố
                    if (/[A-Z]/.test(password)) strength++;
                    if (/[a-z]/.test(password)) strength++;
                    if (/[0-9]/.test(password)) strength++;
                    if (/[@$!%*?&]/.test(password)) strength++;

                    // Đánh giá độ mạnh
                    if (strength < 3) {
                        passwordBar.className = 'password-strength-bar weak';
                        passwordFeedback.textContent = 'Mật khẩu yếu';
                        passwordFeedback.className = 'form-text text-danger';
                    } else if (strength === 3) {
                        passwordBar.className = 'password-strength-bar medium';
                        passwordFeedback.textContent = 'Mật khẩu trung bình';
                        passwordFeedback.className = 'form-text text-warning';
                    } else {
                        passwordBar.className = 'password-strength-bar strong';
                        passwordFeedback.textContent = 'Mật khẩu mạnh';
                        passwordFeedback.className = 'form-text text-success';
                    }
                }

                // Kiểm tra đầy đủ yêu cầu
                if (strongRegex.test(password)) {
                    passwordFeedback.textContent = 'Mật khẩu đạt yêu cầu';
                    passwordFeedback.className = 'form-text text-success';
                }
            });
        });

        document.addEventListener('DOMContentLoaded', function() {
            const lopCheckbox = document.getElementById('change_lopCoVan_checkbox');
            const lopFields = document.getElementById('lopCoVan-fields');

            lopCheckbox.addEventListener('change', function() {
                if (this.checked) {
                    lopFields.style.display = 'block';
                    document.getElementById('noiCongTac').required = true;
                    document.getElementById('maLop').required = true;
                } else {
                    lopFields.style.display = 'none';
                    document.getElementById('noiCongTac').required = false;
                    document.getElementById('maLop').required = false;
                }
            });

        });




        document.getElementById("noiCongTac").addEventListener("change", function() {
            const maKhoaTruong = this.value;
            const lopSelect = document.getElementById("maLop");
            lopSelect.innerHTML = '<option value="">-- Chọn lớp --</option>';

            if (maKhoaTruong) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "get_lop.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

                xhr.onreadystatechange = function() {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        try {
                            const res = JSON.parse(xhr.responseText);
                            res.data.forEach(item => {
                                const option = document.createElement("option");
                                option.value = item.maLop; // lưu mã lớp
                                option.textContent = item.tenLop; // hiển thị tên lớp
                                lopSelect.appendChild(option);
                            });
                        } catch (err) {
                            console.error("Lỗi parse JSON:", err);
                            console.log("Phản hồi từ server:", xhr.responseText);
                        }
                    }
                };

                // Gửi dữ liệu dạng application/x-www-form-urlencoded
                xhr.send("maKhoaTruong=" + encodeURIComponent(maKhoaTruong));
            }
        });
    </script>
</body>

</html>