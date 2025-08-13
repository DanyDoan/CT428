<?php
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}
require("../config/db.php");

$stmt = $conn->prepare("SELECT * FROM CANBO JOIN LOP ON CANBO.maLop = LOP.maLop JOIN KHOATRUONG ON LOP.maKhoaTruong = KHOATRUONG.maKhoaTruong WHERE MSCB = ?");
$stmt->bind_param("s", $_SESSION['MSCB']);
if ($stmt->execute() && ($result = $stmt->get_result())) {
    $row = $result->fetch_assoc();
} else {
    echo "Error: " . $stmt->error;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../shared/banner/logo.png">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" />
    <link rel="stylesheet" href="../assets/css/style.css?v=1.6.7">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/sidebar-style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <title>Cán bộ</title>

    <style>
        .container {
            display: grid;
            width: 80%;
            height: auto;
            gap: 32px;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: repeat(4, 1fr);
            grid-template-areas:
                "user-profile user-profile calendar_month"
                "user-profile user-profile edit-profile"
                "user-profile user-profile edit-profile"
                "fact_check advisor-class-meeting-info feedback";
        }

        .box {
            background-color: #eee;
            padding: 16px;
            border-radius: 12px;
            line-height: 1.5;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            cursor: pointer;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border: 2px solid #ddd;
            transition: 0.4s;
        }

        .box:hover {
            transition: 0.4s;
            transform: translateY(-8px);
            opacity: 0.6;
        }

        .main-title-box,
        .sub-title-box {
            margin-top: 12px;
        }

        .main-title-box {
            font-size: 1rem;
            font-weight: 550;
        }

        .sub-title-box {
            font-size: 0.8rem;
        }

        .container a {
            color: #000;
            text-decoration: none;
        }

        .user-profile {
            grid-area: user-profile;
        }

        .edit-profile {
            grid-area: edit-profile;
        }


        .feedback {
            grid-area: feedback;
        }

        .advisor-class-meeting-info {
            grid-area: advisor-class-meeting-info;
        }

        .fact_check {
            grid-area: fact_check;
        }

        .calendar_month {
            grid-area: calendar_month;
        }

        .hidden {
            display: none;
        }

        .overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.4);
            z-index: 9999;
        }

        .modal {
            position: fixed;
            width: 50%;
            height: auto;
            top: 7%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(250, 250, 250, 1);
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px 6px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            z-index: 10000;
        }

        .modal-content {
            display: flex;
            flex-direction: column;
            padding: 8px 16px;
        }

        .button {
            cursor: pointer;
            position: absolute;
            top: 6px;
            right: 4px;
        }

        @media (max-width: 767px) {
            .container {
                grid-template-columns: 1fr;
                grid-template-rows: repeat(6, 1fr);
                grid-template-areas:
                    "user-profile"
                    "edit-profile"
                    "fact_check"
                    "calendar_month"
                    "forum"
                    "feedback";
            }
        }
    </style>

</head>

<body>
    <!-- Sidebar -->
    <div id="sideBar">
        <?php require("../shared/sideBar.php"); ?>
    </div>
    <!-- Main content -->
    <div id="main">
        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <!-- Main -->

        <!-- Content -->
        <div id="content" class="flex-grow-1 overflow-auto">
            <br>
            <br>
            <div class="container">
                <div onclick="showModal()" class="box user-profile">
                    <span class="material-symbols-outlined" style="color:#1E88E5">account_circle</span>
                    <span class="main-title-box">Thông tin cá nhân</span>
                    <span class="sub-title-box">MSCB</span>
                    <?php echo  htmlspecialchars($row['MSCB']); ?>
                    <span class="sub-title-box">Họ tên</span>
                    <?php echo  htmlspecialchars($row['hoTen']); ?>
                    <span class="sub-title-box">Khoa / Trường</span>
                    <?php echo htmlspecialchars($row['tenKhoaTruong']); ?>
                    <span class="sub-title-box">Lớp cố vấn</span>
                    <?php echo htmlspecialchars($row['tenLop']); ?>
                </div>

                <a href="updatecanbo.php" class="box edit-profile">
                    <span class="material-symbols-outlined" style="color:#43A047">manage_accounts</span>
                    <span class="main-title-box">Cập nhật thông tin</span>
                </a>

                <a href="#" onclick="showComingSoon()" class="box feedback">
                    <span class="material-symbols-outlined" style="color:#FB8C00">feedback</span>
                    <span class="main-title-box">Góp ý hệ thống</span>
                </a>
                <?php
                echo '<div onclick="setLocalStorage(' . "'" . $row["maLop"] . "'" . ')" class="box advisor-class-meeting-info">'
                ?>
                <span class="material-symbols-outlined" style="color:#8E24AA">diversity_3</span>
                <span class="main-title-box">Thông tin lớp cố vấn</span>
            </div>

            <a href="https://mail.google.com" target="_blank" class="box fact_check">
                <span class="material-symbols-outlined" style="color:#546E7A">mail</span>
                <span class="main-title-box">Hộp thư đến</span>
            </a>

            <a href="https://www.cit.ctu.edu.vn/index.php/2023-04-21-07-01-51" target="_blank" class="box calendar_month">
                <span class="material-symbols-outlined" style="color:#E53935">calendar_month</span>
                <span class="main-title-box">Lịch công tác</span>
            </a>

        </div>

    </div>

    <!-- Footer -->
    <?php require("../shared/footer.html"); ?>
    </div>

    <div id="overlay" class="overlay hidden"></div>
    <div id="modal" class="modal hidden">
        <div class="modal-content">
            <span class="material-symbols-outlined button" onclick="closeModal()">close</span>
            <span class="main-title-box">Thông tin chi tiết</span>
            <span class="sub-title-box">Mã số cán bộ</span>
            <?php echo htmlspecialchars($row['MSCB']); ?>
            <span class="sub-title-box">Họ tên</span>
            <?php echo htmlspecialchars($row['hoTen']); ?>
            <span class="sub-title-box">Ngày sinh</span>
            <?php echo htmlspecialchars($row['ngaySinh']); ?>
            <span class="sub-title-box">Giới tính</span>
            <?php echo htmlspecialchars($row['gioiTinh']); ?>
            <span class="sub-title-box">Khoa / Trường</span>
            <?php echo htmlspecialchars($row['tenKhoaTruong']); ?>
            <span class="sub-title-box">Chức vụ</span>
             <?php echo htmlspecialchars(!empty($row['chucVu']) ? $row['chucVu'] : "(chưa cập nhật)"); ?>
            <span class="sub-title-box">Lớp cố vấn</span>
            <?php echo htmlspecialchars($row['tenLop']); ?>
            <span class="sub-title-box">Địa chỉ liên hệ</span>
            <?php echo htmlspecialchars(!empty($row['diaChi']) ? $row['diaChi'] : "(chưa cập nhật)"); ?>
            <span class="sub-title-box">SĐT</span>
            <?php echo htmlspecialchars(!empty($row['soDienThoai']) ? $row['soDienThoai'] : "(chưa cập nhật)"); ?>
            <span class="sub-title-box">Email</span>
            <?php echo htmlspecialchars(!empty($row['email']) ? $row['email'] : "(chưa cập nhật)"); ?>

        </div>
    </div>
</body>

</html>

<script>
    function hideNav() {
        const sideBar = document.getElementById("sideBar");
        sideBar.classList.toggle("active");
    }

    function showModal() {
        const overlay = document.getElementById("overlay");
        const modal = document.getElementById("modal");

        overlay.classList.remove("hidden");
        modal.classList.remove("hidden");

        // Ép hiển thị
        overlay.style.display = "block";
        modal.style.display = "block";
    }

    function closeModal() {
        const overlay = document.getElementById("overlay");
        const modal = document.getElementById("modal");

        overlay.classList.add("hidden");
        modal.classList.add("hidden");

        overlay.style.display = "none";
        modal.style.display = "none";
    }


    function showComingSoon() {
        alert("Tính năng sẽ được phát triễn trong tương lai!");
    }

    function setLocalStorage(maLop) {
        localStorage.setItem("maLop", JSON.stringify(maLop));
        window.location.href = "./quanly.php";
    }
</script>