<?php
    require("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
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
        <h2>Đây là phần nội dung chính</h2>
    </div>
</main>

<!-- Footer -->
    <?php
        require("../require/footer.html");
    ?>
</body>
</html>

<script>
    function hideNav(){
        const sideBar = document.getElementById("sideBar");
        sideBar.classList.toggle("active");
    }
</script>