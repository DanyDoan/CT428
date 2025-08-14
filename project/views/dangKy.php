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

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    $_SESSION['generatedKey'] = generateSecurityKey(8);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logo.png">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <title>Đăng ký</title>
    <style>
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

        .password-match {
            display: none;
        }
    </style>
</head>

<body class="bg-light">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6">
                <div class="card shadow">
                    <div class="card-body">
                        <h3 class="card-title text-center mb-4">ĐĂNG KÝ TÀI KHOẢN CÁN BỘ</h3>
                        <form method="POST" class="px-3">
                            <div class="mb-3">
                                <label for="hoTen" class="form-label">Họ và Tên</label>
                                <input type="text" id="hoTen" name="hoTen" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label for="ngaySinh" class="form-label">Ngày sinh</label>
                                <input type="date" id="ngaySinh" name="ngaySinh" class="form-control" required>
                            </div>
                            <div class="mb-3">
                                <label class="form-label d-block">Giới tính</label>
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
                                <select id="noiCongTac" name="noiCongTac" class="form-select">
                                    <optgroup label="Cấp Trường">
                                        <option value="DI" selected>Trường CNTT&TT</option>
                                        <option value="TN">Trường Bách Khoa</option>
                                        <option value="KT">Trường Kinh Tế</option>
                                        <option value="NN">Trường Nông Nghiệp</option>
                                        <option value="SP">Trường Sư Phạm</option>
                                        <option value="TS">Trường Thủy Sản</option>
                                    </optgroup>
                                    <optgroup label="Cấp Khoa">
                                        <option value="MT">Khoa Chính Trị</option>
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
                                <select id="maLop" name="maLop" class="form-select" required>
                                    <option value="">-- Chọn lớp --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="MSCB" class="form-label">Mã tài khoản</label>
                                <input type="text" id="MSCB" name="MSCB" class="form-control" minlength="6" maxlength="6" required placeholder="001234">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" id="email" name="email" class="form-control" required placeholder="vtbtran@gmail.com">
                            </div>
                            <div class="mb-3">
                                <label for="matKhau" class="form-label">Đặt mật khẩu</label>
                                <input type="password" id="matKhau" name="matKhau" class="form-control" required>
                                <div class="password-strength">
                                    <div class="password-strength-bar" id="password-strength-bar"></div>
                                </div>
                                <small id="password-help" class="form-text text-muted">
                                    Mật khẩu phải có ít nhất 8 ký tự, bao gồm chữ hoa, chữ thường, số và ký tự đặc biệt
                                </small>
                                <div id="password-feedback" class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label for="matKhauXacNhan" class="form-label">Nhập lại mật khẩu</label>
                                <input type="password" id="matKhauXacNhan" name="matKhauXacNhan" class="form-control" required>
                                <div id="confirm-feedback" class="form-text"></div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Mã bảo vệ</label>
                                <div class="fw-bold fs-5 text-danger font-monospace">
                                    <?= htmlspecialchars($_SESSION['generatedKey']) ?>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="key" class="form-label">Nhập lại mã bảo vệ</label>
                                <input type="text" id="key" name="key" class="form-control" required minlength="8" maxlength="8">
                            </div>
                            <div class="form-check mb-3">
                                <input class="form-check-input" type="checkbox" id="camKet" required>
                                <label class="form-check-label" for="camKet">
                                    Tôi cam kết thực hiện đúng trách nhiệm và nghĩa vụ
                                </label>
                            </div>
                            <a href="dangNhap.php">Đã có tài khoản?</a>
                            <div class="d-flex justify-content-end gap-2">
                                <button type="submit" name="submit" class="btn btn-primary">Đăng Ký</button>
                                <button type="reset" class="btn btn-secondary">Hủy</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const passwordInput = document.getElementById("matKhau");
            const confirmInput = document.getElementById("matKhauXacNhan");
            const passwordBar = document.getElementById("password-strength-bar");
            const passwordFeedback = document.getElementById("password-feedback");
            const confirmFeedback = document.getElementById("confirm-feedback");

            // Kiểm tra độ mạnh mật khẩu
            passwordInput.addEventListener("input", function() {
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

                // Kiểm tra khớp mật khẩu
                checkPasswordMatch();
            });

            // Kiểm tra khớp mật khẩu
            confirmInput.addEventListener("input", checkPasswordMatch);

            function checkPasswordMatch() {
                const pass = passwordInput.value;
                const confirm = confirmInput.value;

                if (confirm.length === 0) {
                    confirmFeedback.textContent = '';
                } else if (pass !== confirm) {
                    confirmFeedback.textContent = 'Mật khẩu không khớp';
                    confirmFeedback.className = 'form-text text-danger';
                } else {
                    confirmFeedback.textContent = 'Mật khẩu khớp';
                    confirmFeedback.className = 'form-text text-success';
                }
            }
        });

        layLop();
        document.getElementById("noiCongTac").addEventListener("change", layLop)

        function layLop() {
            const maKhoaTruong = document.getElementById("noiCongTac").value;
            const lopSelect = document.getElementById("maLop");
            lopSelect.innerHTML = '<option value="">-- Chọn lớp --</option>';

            if (maKhoaTruong) {
                const xhr = new XMLHttpRequest();
                xhr.open("POST", "../controllers/layLop.php", true);
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
        }
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?php
function checkIfExist($conn, $id)
{
    $stmt = $conn->prepare("SELECT MSCB FROM CANBO WHERE MSCB = ?");
    $stmt->bind_param("s", $id);
    $stmt->execute();
    $stmt->store_result();
    return ($stmt->num_rows > 0);
}

// Xử lý khi gửi form
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $MSCB = $_POST['MSCB'];
    $hoTen = $_POST['hoTen'];
    $matKhau = $_POST['matKhau'];
    $ngaySinh = $_POST['ngaySinh'];
    $gioiTinh = $_POST['gioiTinh'];
    $maLop = $_POST['maLop'];
    $noiCongTac = $_POST['noiCongTac'];
    $email = $_POST['email'];
    $matKhauXacNhan = $_POST['matKhauXacNhan'];
    $key = $_POST['key'] ?? '';
    $generatedKey = $_SESSION['generatedKey'] ?? '';

    $isStrongPassword = preg_match('/^(?=.*[A-Z])(?=.*[a-z])(?=.*\d)(?=.*[@$!%*?&]).{8,}$/', $matKhau);

    if ($matKhau !== $matKhauXacNhan) {
        echo "<script>alert('Mật khẩu không khớp');</script>";
    } elseif (!$isStrongPassword) {
        echo "<script>alert('Mật khẩu phải có ít nhất 8 ký tự, gồm chữ hoa, chữ thường, số và ký tự đặc biệt');</script>";
    } elseif ($key !== $generatedKey) {
        echo "<script>alert('Mã bảo vệ không đúng');</script>";
    } elseif (checkIfExist($conn, $MSCB)) {
        echo "<script>alert('Mã tài khoản đã tồn tại');</script>";
    } else {
        $hashedPassword = password_hash($matKhau, PASSWORD_DEFAULT);
        $chucVu = "Trợ giảng";

        $stmt = $conn->prepare("INSERT INTO CANBO (MSCB, matKhau, hoTen, ngaySinh, gioiTinh, noiCongTac, maLop, email, chucVu) VALUES ( ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssss", $MSCB, $hashedPassword, $hoTen, $ngaySinh, $gioiTinh, $noiCongTac, $maLop, $email, $chucVu);

        if ($stmt->execute()) {
            $_SESSION['generatedKey'] = generateSecurityKey(8);
            echo "<script>alert('Đăng ký thành công!'); location.href='dangNhap.php';</script>";
        } else {
            echo "<script>alert('Lỗi khi đăng ký: " . $stmt->error . "');</script>";
        }
        $stmt->close();
    }
    $conn->close();
}
?>