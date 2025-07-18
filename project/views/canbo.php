<?php
require("../config/db.php");
?>

<!DOCTYPE html>
<html lang="vi">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Thông Tin Cán Bộ</title>
  <link rel="stylesheet" href="../assets/sidebar-style.css" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
</head>

<body>
  <div class="d-flex vh-100">
    <!-- Sidebar -->
    <?php require("../shared/sideBar.php"); ?>

    <!-- Main content -->
    <div class="flex-grow-1 d-flex flex-column">
      <!-- Header -->
      <?php require("../shared/header.html"); ?>

      <!-- Main page content -->
      <main class="flex-grow-1 p-4 bg-light">
        <h2 class="mb-4">Đây là trang thông tin cán bộ</h2>
      </main>

      <!-- Footer -->
      <?php require("../shared/footer.html"); ?>
    </div>
  </div>

  
</body>

</html>
