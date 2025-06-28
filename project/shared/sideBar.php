<?php 
$current_page = basename($_SERVER['PHP_SELF']);
?>

<div class="d-flex flex-column text-white vh-100 shadow" id="sidebar" style="width: 200px; background-color: #001528; transition: width 0.6s;">
    <div class="d-flex justify-content-between align-items-center p-3">
        <span class="fs-5 fw-bold" id="sidebar-brand">Quản Lý</span>
        <button class="btn btn-sm btn-primary" id="toggle-btn">
            <i class="bi bi-chevron-left"></i>
        </button>
    </div>
    <hr class="text-secondary m-0">
    <ul class="nav nav-pills flex-column mb-auto mt-3" id="menu-items">
        <li class="nav-item <?= $current_page == 'index.php' ? 'bg-primary' : '' ?>">
            <a href="index.php" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-house-door me-2"></i>
                <span class="menu-text">Trang chủ</span>
            </a>
        </li>
        <li class="nav-item <?= $current_page == 'sinhvien.php' ? 'bg-primary' : '' ?>">
            <a href="sinhvien.php" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-people me-2"></i>
                <span class="menu-text">Sinh viên</span>
            </a>
        </li>
        <li class="nav-item <?= $current_page == 'canbo.php' ? 'bg-primary' : '' ?>">
            <a href="canbo.php" class="nav-link text-white d-flex align-items-center">
                <i class="bi bi-person-badge me-2"></i>
                <span class="menu-text">Cán bộ</span>
            </a>
        </li>
    </ul>

    <div class="mt-auto p-3 d-flex align-items-center">
        <div id="profile-info">
            <strong>Eren</strong><br>
            <small>Designer</small>
        </div>
    </div>
</div>

<script>
    const toggleBtn = document.getElementById("toggle-btn");
    const sidebar = document.getElementById("sidebar");
    const brandText = document.getElementById("sidebar-brand");
    const profileInfo = document.getElementById("profile-info");
    const menuTextList = document.querySelectorAll(".menu-text");
    const icon = toggleBtn.querySelector("i");

    toggleBtn.addEventListener("click", () => {
        const isCollapsed = sidebar.style.width === "60px";
        sidebar.style.width = isCollapsed ? "200px" : "60px";

        // Toggle visibility with Bootstrap utility classes and opacity
        brandText.classList.toggle("d-none", !isCollapsed);
        profileInfo.classList.toggle("d-none", !isCollapsed);
        menuTextList.forEach(span => {
            span.classList.toggle("d-none", !isCollapsed);
        });

        icon.className = isCollapsed ? "bi bi-chevron-left" : "bi bi-chevron-right";
    });

    // Initialize expanded state
    brandText.classList.remove("d-none");
    profileInfo.classList.remove("d-none");
    menuTextList.forEach(span => span.classList.remove("d-none"));
</script>