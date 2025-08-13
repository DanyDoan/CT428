<?php
session_start();
require_once("../config/db.php");

$error = "";

if (isset($_SESSION['MSCB'])) {
    header("Location: index.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $MSCB = $_POST['MSCB'];
    $matKhau = $_POST['matKhau'];

    $stmt = $conn->prepare("SELECT * FROM CANBO WHERE MSCB = ?");
    $stmt->bind_param("s", $MSCB);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows === 1) {
        $row = $result->fetch_assoc();
        if (password_verify($matKhau, $row['matKhau'])) {
            $_SESSION['hoTen'] = $row['hoTen'];
            $_SESSION['chucVu'] = $row['chucVu'];
            $_SESSION['MSCB'] = $MSCB;
            echo "<script>alert('Đăng nhập thành công!'); window.location.href = 'index.php';</script>";
        } else {
            $error = "Mật khẩu không đúng!";
        }
    } else {
        $error = "Mã số cán bộ không tồn tại!";
    }

    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Đăng nhập</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../assets/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;">
        <div class="card shadow p-5" style="width: 100%; max-width: 500px;">
            <h3 class="text-center mb-4 fw-bold">ĐĂNG NHẬP</h3>
            <?php if (!empty($error)): ?>
                <div class="alert alert-danger" role="alert">
                    <?= htmlspecialchars($error) ?>
                </div>
            <?php endif; ?>
            <form method="POST">
                <div class="mb-3">
                    <label for="MSCB" class="form-label">Mã số cán bộ</label>
                    <input type="text" class="form-control" id="MSCB" name="MSCB" required>
                </div>
                <div class="mb-3">
                    <label for="matKhau" class="form-label">Mật khẩu</label>
                    <input type="password" class="form-control" id="matKhau" name="matKhau" required>
                </div>
                <div class="d-grid gap-2">
                    <button type="submit" name="submit" class="btn btn-primary">Đăng nhập</button>
                    <button type="reset" class="btn btn-outline-secondary">Hủy</button>
                </div>
                <div class="text-center mt-3">
                    <small>Bạn chưa có tài khoản? <a href="dangKy.php">Đăng ký ngay</a></small>
                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>