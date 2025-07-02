<?php
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}
require("../config/db.php");

$stmt = $conn->prepare("SELECT * FROM CANBO WHERE MSCB = ?");
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
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
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
                "fact_check forum feedback";
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

        .forum {
            grid-area: forum;
        }

        .messages {
            grid-area: messages;
        }

        .group {
            grid-area: group;
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
            z-index: 999;
        }

        .modal {
            position: fixed;
            width: 50%;
            height: autox;
            top: 15%;
            left: 50%;
            transform: translateX(-50%);
            background-color: rgba(250, 250, 250, 1);
            border: 1px solid #ddd;
            box-shadow: 0 4px 8px 6px rgba(0, 0, 0, 0.2);
            border-radius: 12px;
            z-index: 1000;
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
    <div class="d-flex vh-100">

        <!-- Header -->
        <?php
        require("../require/header.html")
        ?>

        <!-- Main -->
        <main>
            <?php
            require("../require/sideBar.html")
            ?>

            <!-- Content -->
            <div id="content">
                <h2>Đây là trang thông tin cán bộ</h2>

                <div class="container">
                    <div onclick="showModal()" class="box user-profile">
                        <span class="material-symbols-outlined" style="color:#1E88E5">account_circle</span>
                        <span class="main-title-box">Thông tin cá nhân</span>
                        <?php echo $row['hoTen']; ?>
                        <span class="sub-title-box">Nơi công tác</span>
                        <?php echo $row['noiCongTac']; ?>
                        <span class="sub-title-box">Lớp hiện tại</span>
                        <?php echo $row['maLop']; ?>
                    </div>

                    <a href="updatecanbo.php" class="box edit-profile">
                        <span class="material-symbols-outlined" style="color:#43A047">manage_accounts</span>
                        <span class="main-title-box">Cập nhật thông tin</span>
                    </a>

                    <a href="#" onclick="showComingSoon()" class="box feedback">
                        <span class="material-symbols-outlined" style="color:#FB8C00">feedback</span>
                        <span class="main-title-box">Góp ý hệ thống</span>
                    </a>

                    <a href="#" onclick="showComingSoon()" class="box advisor-class-meeting-info">
                        <span class="material-symbols-outlined" style="color:#8E24AA">diversity_3</span>
                        <span class="main-title-box">Thông tin họp lớp cố vấn</span>
                    </a>

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
        </main>

        <!-- Footer -->
        <?php
        require("../require/footer.html");
        ?>
        <div id="overlay" class="overlay hidden"></div>
        <div id="modal" class="modal hidden">
            <div class="modal-content">
                <span class="material-symbols-outlined button" onclick="closeModal()">close</span>
                <span class="main-title-box">Thông tin chi tiết</span>
                <span class="sub-title-box">Mã số cán bộ</span>
                <?php echo $row['MSCB']; ?>
                <span class="sub-title-box">Họ tên</span>
                <?php echo $row['hoTen']; ?>
                <span class="sub-title-box">Ngày sinh</span>
                <?php echo $row['ngaySinh']; ?>
                <span class="sub-title-box">Giới tính</span>
                <?php echo $row['gioiTinh']; ?>
                <span class="sub-title-box">Nơi công tác</span>
                <?php echo $row['noiCongTac']; ?>
                <span class="sub-title-box">Lớp hiện tại</span>
                <?php echo $row['maLop']; ?>
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
        document.getElementById("overlay").classList.remove("hidden");
        document.getElementById("modal").classList.remove("hidden");
    }

    function closeModal() {
        document.getElementById("overlay").classList.add("hidden");
        document.getElementById("modal").classList.add("hidden");
    }

    function showComingSoon() {
        alert("Tính năng đang trong quá trình phát triển!");
    }
</script>