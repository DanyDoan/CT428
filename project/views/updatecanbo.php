<?php
session_start();
require_once("../config/db.php");

if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}

$MSCB = $_SESSION['MSCB'];
$error = "";
$success = "";

// Lấy thông tin người dùng
$stmt = $conn->prepare("SELECT * FROM CANBO WHERE MSCB = ?");
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
    $noiCongTac = $_POST['noiCongTac'];
    $maLopCoVan = $_POST['maLopCoVan'];

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
            $stmt = $conn->prepare("UPDATE CANBO SET hoTen=?, ngaySinh=?, gioiTinh=?, noiCongTac=?, maLopCoVan=?, matKhau=? WHERE MSCB=?");
            $stmt->bind_param("sssssss", $hoTen, $ngaySinh, $gioiTinh, $noiCongTac, $maLopCoVan, $hashedPassword, $MSCB);
        }
    } else {
        // Không đổi mật khẩu
        $stmt = $conn->prepare("UPDATE CANBO SET hoTen=?, ngaySinh=?, gioiTinh=?, noiCongTac=?, maLopCoVan=? WHERE MSCB=?");
        $stmt->bind_param("ssssss", $hoTen, $ngaySinh, $gioiTinh, $noiCongTac, $maLopCoVan, $MSCB);
    }

    if (empty($error)) {
        if ($stmt->execute()) {
            $success = "Cập nhật thông tin thành công!";
            $user['hoTen'] = $hoTen;
            $user['ngaySinh'] = $ngaySinh;
            $user['gioiTinh'] = $gioiTinh;
            $user['noiCongTac'] = $noiCongTac;
            $user['maLopCoVan'] = $maLopCoVan;
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
    <title>Cập nhật thông tin cán bộ</title>
    <link rel="icon" href="../shared/banner/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .password-fields {
            display: none;
            transition: all 0.3s ease;
        }

        .password-strength {
            height: 5px;
            margin-top: 5px;
            background-color: #e9ecef;
            border-radius: 3px;
            overflow: hidden;
        }

        .password-strength-bar {
            height: 100%;
            width: 0%;
            transition: width 0.3s ease;
        }

        .weak {
            background-color: #dc3545;
            width: 33%;
        }

        .medium {
            background-color: #ffc107;
            width: 66%;
        }

        .strong {
            background-color: #28a745;
            width: 100%;
        }
    </style>
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
                    <label for="noiCongTac" class="form-label">Nơi công tác</label>
                    <select id="noiCongTac" name="noiCongTac" class="form-select" required>
                        <optgroup label="Cấp Trường">
                            <option value="DI" <?= $user['noiCongTac'] === 'DI' ? 'selected' : '' ?>>Trường CNTT&TT</option>
                            <option value="CN" <?= $user['noiCongTac'] === 'CN' ? 'selected' : '' ?>>Trường Bách Khoa</option>
                            <option value="KT" <?= $user['noiCongTac'] === 'KT' ? 'selected' : '' ?>>Trường Kinh Tế</option>
                            <option value="NN" <?= $user['noiCongTac'] === 'NN' ? 'selected' : '' ?>>Trường Nông Nghiệp</option>
                            <option value="SP" <?= $user['noiCongTac'] === 'SP' ? 'selected' : '' ?>>Trường Sư Phạm</option>
                            <option value="TS" <?= $user['noiCongTac'] === 'TS' ? 'selected' : '' ?>>Trường Thủy Sản</option>
                        </optgroup>
                        <optgroup label="Cấp Khoa">
                            <option value="DB" <?= $user['noiCongTac'] === 'DB' ? 'selected' : '' ?>>Khoa Dự Bị Dân Tộc</option>
                            <option value="MT" <?= $user['noiCongTac'] === 'MT' ? 'selected' : '' ?>>Khoa Chính Trị</option>
                            <option value="TN" <?= $user['noiCongTac'] === 'TN' ? 'selected' : '' ?>>Khoa Khoa Học Tự Nhiên</option>
                            <option value="XH" <?= $user['noiCongTac'] === 'XH' ? 'selected' : '' ?>>Khoa KHXH&NV</option>
                            <option value="KL" <?= $user['noiCongTac'] === 'KL' ? 'selected' : '' ?>>Khoa Luật</option>
                            <option value="MTN" <?= $user['noiCongTac'] === 'MTN' ? 'selected' : '' ?>>Khoa MT&TNTN</option>
                            <option value="FL" <?= $user['noiCongTac'] === 'FL' ? 'selected' : '' ?>>Khoa Ngoại Ngữ</option>
                            <option value="TC" <?= $user['noiCongTac'] === 'TC' ? 'selected' : '' ?>>Khoa Giáo Dục Thể Chất</option>
                        </optgroup>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="maLopCoVan" class="form-label">Mã lớp cố vấn</label>
                    <input type="text" class="form-control" id="maLopCoVan" name="maLopCoVan" value="<?= htmlspecialchars($user['maLopCoVan']) ?>" required>
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
                    <a href="canbo.php" class="btn btn-outline-secondary">Quay lại</a>
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
    </script>
</body>

</html>