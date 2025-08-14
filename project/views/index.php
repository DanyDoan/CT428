<?php
session_start();

if (!isset($_SESSION['MSCB'])) {
    header("Location: dangNhap.php");
    exit;
}
?>
<?php require("../controllers/thongKe.php"); ?>
<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/sidebar-style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" rel="stylesheet">
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/index.css" rel="stylesheet">
    <link rel="icon" href="../assets/images/logo.png?v=12312">
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
        <div id="content">
            <!-- Banner slider -->
            <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="2000">
                <div class="carousel-inner">
                    <!-- Banner 1 -->
                    <div class="carousel-item active">
                        <img src="../assets/images/banner2.png" class="d-block w-100" alt="Banner 1">
                    </div>

                    <!-- Banner 2 -->
                    <div class="carousel-item">
                        <img src="../assets/images/banner1.png" class="d-block w-100" alt="Banner 2">
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
                            <p class="lead">Trường Đại học Cần Thơ là một trong những cơ sở giáo dục đại học trọng điểm của cả nước, đặc biệt giữ vai trò then chốt trong đào tạo nguồn nhân lực chất lượng cao cho khu vực Đồng bằng sông Cửu Long. Với quy mô hàng chục nghìn sinh viên đang theo học cùng đội ngũ giảng viên và cán bộ đông đảo, nhu cầu quản lý và tra cứu thông tin nhanh chóng, chính xác trở nên vô cùng cần thiết.</p>
                            <p>Hệ thống quản lý thông tin sinh viên được phát triển nhằm hỗ trợ giảng viên và cán bộ trong việc cập nhật, tìm kiếm và quản lý dữ liệu sinh viên một cách khoa học, thuận tiện và an toàn. Việc áp dụng hệ thống không chỉ giúp tiết kiệm thời gian, giảm thiểu sai sót trong xử lý thông tin, mà còn góp phần hiện đại hóa công tác quản lý, đáp ứng yêu cầu của một môi trường đại học năng động và chuyên nghiệp.</p>
                        </div>
                        <div class="col-lg-6">
                            <img src="../assets/images/RLC1.jpg" alt="Giới thiệu" class=" rounded custom-img img-fluid">
                        </div>
                    </div>
                </div>
            </section>
            <section class="py-5">
                <div class="container">
                    <h2 class="text-center mb-5">Thống kê hệ thống</h2>

                    <!-- Hàng 1: Giáo sư - Phó giáo sư - Tiến sĩ -->
                    <div class="row g-4 text-center mb-4">
                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm feature-card">
                                <i class="bi bi-award-fill" style="font-size: 2rem; color: #d9534f;"></i>
                                <h3><?php echo $totalGiaoSu; ?></h3>
                                <p>Giáo sư</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm feature-card">
                                <i class="bi bi-person-fill-up" style="font-size: 2rem; color: #f0ad4e;"></i>
                                <h3><?php echo $totalPhoGiaoSu; ?></h3>
                                <p>Phó giáo sư</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm feature-card">
                                <i class="bi bi-mortarboard-fill" style="font-size: 2rem; color: #5bc0de;"></i>
                                <h3><?php echo $totalTienSi; ?></h3>
                                <p>Tiến sĩ</p>
                            </div>
                        </div>
                    </div>

                    <!-- Hàng 2: Thạc sĩ - Cán bộ - Sinh viên -->
                    <div class="row g-4 text-center">
                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm feature-card">
                                <i class="bi bi-mortarboard" style="font-size: 2rem; color: #0275d8;"></i>
                                <h3><?php echo $totalThacSi; ?></h3>
                                <p>Thạc sĩ</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm feature-card">
                                <i class="bi bi-people-fill" style="font-size: 2rem; color: #5cb85c;"></i>
                                <h3><?php echo ($totalCanBo-1); ?></h3>
                                <p>Cán bộ / Giảng viên</p>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="card p-4 shadow-sm feature-card">
                                <i class="bi bi-person-video3" style="font-size: 2rem; color: #6610f2;"></i>
                                <h3><?php echo $totalSinhVien; ?></h3>
                                <p>Sinh viên</p>
                            </div>
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
                                <i class="bi bi-search feature-icon"></i>
                                <h3>Quản lý thông tin sinh viên</h3>
                                <p>Quản lý tài khoản sinh viên, tác vụ thêm/sửa/xóa</p>
                                <a href="./quanLySinhVien.php" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card feature-card p-4 text-center">
                                <i class="bi bi-person-vcard feature-icon"></i>
                                <h3>Xem thông tin cán bộ</h3>
                                <p>Xem thông tin về cán bộ, giảng viên đang công tác tại trường</p>
                                <a href="./danhSachCanBo.php" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card feature-card p-4 text-center">
                                <i class="bi bi-book feature-icon"></i>
                                <h3>Quản lý tài khoản cá nhân</h3>
                                <p>Xem trang thông tin cá nhân và các chức năng sẵn dùng</p>
                                <?php
                                if ($_SESSION["MSCB"] == "000000") {
                                ?>
                                    <a href="#" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                                <?php
                                } else {
                                ?>
                                    <a href="./canBo.php" class="btn btn-sm btn-outline-primary">Chi tiết</a>
                                <?php
                                }
                                ?>
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