<?php
    require("config/db.php");
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<header>
    <img src="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png" class="logo"></i>
    <h1>Quản lý sinh viên</h1>
</header>
<main>
    <div id="sideBar">
        <button onclick="hideNav()">---</button>
        <ul>
            <li>
                <a href="#">
                    <img src="assets/home.png" class="icon"></img>
                    <span>My Portfolio</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/home.png" class="icon"></img>
                    <span>Todo List</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/home.png" class="icon"></img>
                    <span>Update</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <img src="assets/home.png" class="icon"></img>
                    <span>Sign in</span>
                </a>
            </li>
        </ul>
    </div>
    
    <div id="content">
        
    </div>
</main>
<footer>

</footer>
</body>
</html>

<script>
    function hideNav(){
        const sideBar = document.getElementById("sideBar");
        sideBar.classList.toggle("active");
    }
</script>