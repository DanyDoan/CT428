<?php
session_start();
// if (!isset($_SESSION['MSCB'])) {
//     header("Location: login.php");
//     exit;
// }
require("../config/db.php");

$stmt = $conn->prepare("SELECT * FROM CANBO WHERE MSCB = ?");
$stmt->bind_param("s", $_SESSION['MSCB']);
if ($stmt->execute() && ($result = $stmt->get_result())) {
    $row = $result->fetch_assoc();
} else
    // echo "Error: " . $stmt->error;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined" rel="stylesheet">
    <style>
        #content * {
            box-sizing: border-box;
        }

        .container {
            display: grid;
            width: 90%;
            height: auto;
            margin-left: auto;
            margin-right: auto;
            padding: 32px;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: repeat(4, 20%);
            gap: 24px 24px;
            grid-auto-flow: row;
            grid-template-areas:
                "user-profile user-profile edit-profile"
                "user-profile user-profile logout"
                "contact-info forum messages"
                "group fact_check calendar_month";
        }

        .box {
            background-color: #eee;
            padding: 12px;
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
            width: 100%;
            height: 100%;
        }

        .user-profile {
            grid-area: user-profile;
        }

        .edit-profile {
            grid-area: edit-profile;
        }

        .logout {
            grid-area: logout;
        }

        .contact-info {
            grid-area: contact-info;
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
            height: 50%;
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
    </style>

</head>

<body>

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
                    <span class="material-symbols-outlined">
                        account_circle
                    </span>
                    <span class="main-title-box">Thông tin cá nhân</span>
                    <?php echo $row['hoTen']; ?>
                    <span class="sub-title-box">Nơi công tác</span>
                    <?php echo $row['noiCongTac']; ?>
                    <span class="sub-title-box">Lớp hiện tại</span>
                    <?php echo $row['maLop']; ?>
                </div>

                <a href="updatecanbo.php" class="box edit-profile">
                    <span class="material-symbols-outlined">manage_accounts</span>
                    <span class="main-title-box">Cập nhật thông tin</span>
                </a>

                <a href="#" class="box logout">
                    <span class="material-symbols-outlined">
                        logout
                    </span>
                    <span class="main-title-box">Đăng xuất</span>
                </a>
                <a href="#" class="box contact-info">
                    <span class="material-symbols-outlined">
                        info
                    </span>
                    <span class="main-title-box">Liên hệ</span>
                </a>

                <a href="#" class="box forum">
                    <span class="material-symbols-outlined">
                        forum
                    </span>
                    <span class="main-title-box">Diễn đàn</span>
                </a>

                <a href="#" class="box messages">
                    <span class="material-symbols-outlined">
                        chat
                    </span>
                    <span class="main-title-box">Nhắn tin</span>
                </a>
                <a href="#" class="box group">
                    <span class="material-symbols-outlined">group</span>
                    <span class="main-title-box">Danh sách lớp</span>
                </a>

                <a href="#" class="box fact_check">
                    <span class="material-symbols-outlined">fact_check</span>
                    <span class="main-title-box">Duyệt đơn / Yêu cầu</span>
                </a>

                <a href="#" class="box calendar_month">
                    <span class="material-symbols-outlined">calendar_month</span>
                    <span class="main-title-box">Lịch làm việc / Giảng dạy</span>
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
</script>