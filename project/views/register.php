<?php
require_once("../config/db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        main {
            /* background-color: black; */
            justify-content: center;
            align-items: center;
            padding: 50px 0px;
        }

        fieldset {
            padding: 20px;
            text-align: center;
        }

        table {
            line-height: 40px;
        }

        th,
        td {
            font-size: 16px;
            color: black;
        }

        fieldset>input {
            background-color: black;
            color: white;
            border: 1px solid white;
            border-radius: 10px;
            padding: 6px 10px;
            margin: 10px;
            transition: 0.5s;
        }

        fieldset>input:hover {
            transition: 0.5s;
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php
    require("../require/header.html");
    ?>

    <!-- Main -->
    <div class="register-wrapper">
        <div class="register-container">
            <h2 class="register-title">Đăng Ký Quản Trị Viên</h2>
            <form method="POST" action="administrator.php">
                <label for="adminName" class="register-label">Họ và Tên</label>
                <input type="text" id="adminName" name="adminName" class="register-input" required>

                <label for="adminBirth" class="register-label">Ngày sinh</label>
                <input type="date" id="adminBirth" name="adminBirth" class="register-input" required>

                <label for="adminWorkplace" class="register-label">Công tác tại</label>
                <select id="adminWorkplace" name="adminWorkplace" class="register-select">
                    <optgroup label="Cấp Trường">
                        <option value="DI" selected>Trường CNTT&TT</option>
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

                <label for="adminID" class="register-label">Mã tài khoản</label>
                <input type="text" id="adminID" name="adminID" class="register-input" required>

                <label for="adminPassword" class="register-label">Đặt mật khẩu</label>
                <input type="password" id="adminPassword" name="adminPassword" class="register-input" required>

                <label for="retype" class="register-label">Nhập lại mật khẩu</label>
                <input type="password" id="retype" name="retype" class="register-input" required>

                <label for="key" class="register-label">Security Key</label>
                <input type="text" id="key" name="key" class="register-input">

                <div class="register-notice">
                    Tôi cam kết thực hiện đúng trách nhiệm và nghĩa vụ
                </div>

                <div class="register-buttons">
                    <input type="submit" value="Đăng Ký" name="submit" class="register-submit">
                    <input type="reset" value="Hủy" class="register-reset">
                </div>
            </form>
        </div>
    </div>

    <!-- Footer -->
    <?php
    require("../require/footer.html");
    ?>
</body>

</html>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if ($_POST["adminPassword"] != $_POST["retype"]) {
        echo "Mật khẩu không khớp<br>";
        exit();
    }
    if ($_POST["key"] != "2025") {
        echo "Sai key<br>";
        exit();
    }
    if (checkIfExist($conn, $_POST["adminID"])) {
        echo "Mã đã tồn tại";
        exit();
    } else {
        $stm = $conn->prepare("INSERT INTO adminList
                                 (adminID, adminPassword, adminName, adminBirth, adminWorkplace)
                                 VALUES( ?, ?, ?, ?, ?)");

        $hashedPassword = password_hash($_POST["adminPassword"], PASSWORD_DEFAULT);
        $stm->bind_param(
            "sssss",
            $_POST["adminID"],
            $hashedPassword,
            $_POST["adminName"],
            $_POST["adminBirth"],
            $_POST["adminWorkplace"]
        );
        if ($stm->execute()) {
            echo "<script>
                        location.href='../index.php';  
                     </script>";
            // ob_start();
            // header("Location: ../index.php");
        } else
            echo "<script>
                        alert('thất bại');        
                </script>";
    }
}
echo "<script>
            alert('ngu');        
    </script>";

function checkIfExist($conn, $id)
{
    $stm = $conn->prepare("SELECT * 
                              FROM adminList
                              WHERE adminID = ?");
    $stm->bind_param("s", $id);
    if ($stm->execute()) {
        $result = $stm->get_result();
        return ($result->num_rows > 0);
    } else;
}
?>