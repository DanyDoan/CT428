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
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
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
           

            </div>

        <!-- Footer -->
        <?php require("../shared/footer.html"); ?>
    </div>
</body>

</html>
