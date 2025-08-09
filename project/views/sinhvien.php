<?php

// session_start();

// if (!isset($_SESSION['MSCB'])) {
//     header("Location: login.php");
//     exit;
// }

?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
    <link rel="stylesheet" href="../assets/sidebar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <title>Trang chủ</title>
</head>

<body>
    <!-- Sidebar -->
    <?php require("../shared/sideBar.php"); ?>

    <!-- Main -->
    <div id="main">

        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <!-- Content -->
        <div id="content" class="d-flex flex-column">
        </div>

        <!-- Footer -->
        <?php require("../shared/footer.html"); ?>
    </div>

</body>

</html>