<?php
session_start();

if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
    exit;
}
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/index-style.css" rel="stylesheet">
    <title>Trang chủ</title>
</head>

<body>

    <!-- Sidebar -->
    <div id="sideBar">
        <?php require("../shared/sideBar.php"); ?>
    </div>

    <!-- Main -->
    <div id="main">
        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <!-- Content -->
        <div id="content">
            <!-- Banner slider -->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <!-- Banner 1 -->
                    <div class="carousel-item active">
                        <img src="../shared/banner/banner2.png" class="d-block w-100" alt="Banner 1">
                    </div>

                    <!-- Banner 2 -->
                    <div class="carousel-item">
                        <img src="../shared/banner/banner1.png" class="d-block w-100" alt="Banner 2">
                    </div>
                </div>

                <!-- Optional controls -->
                <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>


            <!-- Giới thiệu -->
            <section class="about-section">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-lg-6" style="overflow: hidden;">
                            <h2 class="mb-4">Giới thiệu hệ thống</h2>
                            <p class="lead">Hệ thống quản lý thông tin sinh viên được phát triển nhằm mục đích hỗ trợ công tác quản lý và nâng cao hiệu quả làm việc của giảng viên trong việc theo dõi tình hình học tập của các bạn sinh viên.</p>
                            <p>Với hệ thống này, giảng viên có thể dễ dàng quản lý thông tin cá nhân của sinh viên, quản lý các tài khoản, mặc khác các bạn sinh viên cũng có thể tìm kiếm thông tin giảng viên tại đây.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="../shared/banner/RLC1.jpg" alt="Giới thiệu" class=" rounded custom-img img-fluid">
                        </div>
                    </div>
                </div>
            </section>

            <!-- Các chức năng chính -->
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-5">Các chức năng chính</h2>
                    <div class="row g-4">
                        <div class="col-md-4">
                            <div class="card feature-card p-4 text-center">
                                <i class="bi bi-person-vcard feature-icon"></i>
                                <h3>Xem thông tin cán bộ</h3>
                                <p>Xem thông tin về cán bộ, giảng viên đang công tác tại trường</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card feature-card p-4 text-center">
                                <i class="bi bi-book feature-icon"></i>
                                <h3>Quản lý tài khoản cá nhân</h3>
                                <p>Xem trang thông tin cá nhân và các chức năng sẵn dùng</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card feature-card p-4 text-center">
                                <i class="bi bi-search feature-icon"></i>
                                <h3>Quản lý thông tin sinh viên</h3>
                                <p>Quản lý tài khoản sinh viên, tác vụ thêm/sửa/xóa</p>
                                <a href="#" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>

        <!-- Footer -->
        <?php require("../shared/footer.html"); ?>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
    <script>
        $('.owl-carousel').owlCarousel({
            loop: true,
            nav: true,
            dots: true,
            autoplay: true,
            autoplayTimeout: 3000,
            items: 1,
            responsiveClass: true,
            responsiveRefreshRate: 100
        });
    </script>
</body>

</html>