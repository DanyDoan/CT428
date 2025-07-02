<?php
    require("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="https://yu.ctu.edu.vn/images/upload/article/2020/03/0305-logo-ctu.png">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.6.7">
    <style>
        #content > h1{
            font-size:2.5em;
            text-transform: uppercase;
            font-weight: 1000;
            color:black;
        }
        #dashboard{
            width: 100%;
            height: fit-content;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: space-around;
        }
        .box{
            width: 12em;
            height: 20em;
            display: flex;
            flex-direction: column;
            justify-content: space-around;
            padding:1% 2%;
            background-image: linear-gradient(to top,rgb(15, 39, 144), white) ;
            margin:20px 10px;
            transition: 0.5s;
            border-radius: 5%;
            transition: 0.5s;
        }

        .box:hover{
            transition: 0.5s;
            transform: scale(1.1) rotateY(-20deg);
            position: relative;
            background-image: none;
        }

        .box:hover img{
            width: auto;
            height: 100%;
        }

        .box img{
            border:5px solid rgb(0, 0, 0);
            border-radius: 5%;
        }

        .box:hover .infor{
            justify-content: center;
        }

        .box:hover .infor .data{
            display: none;
        }

        .infor{
            display: flex;
            justify-content: center;
        }

        .infor .data{
            color: rgb(255, 255, 255);
            font-weight: 800;
            text-align: center;
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
        <h1>about us</h1>
        <div id="dashboard">

            <!-- Box 1 -->
            <div class="box">
                <img src="https://i.pinimg.com/736x/04/00/a6/0400a6935b0d83dc6f7e7633ff6c09e9.jpg">
                <div class="infor">
                    <!-- <span class="tag">Full Name: &nbsp;</span> -->
                    <span class="data">Võ Thị Bảo Trân</span>
                </div>
                <div class="infor">
                    <!-- <span class="tag">MSSV: &nbsp;</span> -->
                    <span class="data">B2204974</span>
                </div>
                <div class="infor">
                    <!-- <span class="tag">Chuyên ngành: &nbsp;</span> -->
                    <span class="data">Mạng Máy Tính và Truyền Thông Dữ Liệu - K48</span>
                </div>
            </div>

            <!-- Box 2 -->
            <div class="box">
                <img src="https://i.pinimg.com/736x/f9/99/10/f9991020ecd4ce346a9ce41cd36d4a16.jpg">
                <div class="infor">
                    <!-- <span class="tag">Full Name: &nbsp;</span> -->
                    <span class="data">Huỳnh Trạch Tuấn</span>
                </div>
                <div class="infor">
                    <!-- <span class="tag">MSSV: &nbsp;</span> -->
                    <span class="data">B2306647</span>
                </div>
                <div class="infor">
                    <!-- <span class="tag">Chuyên ngành: &nbsp;</span> -->
                    <span class="data">An toàn thông tin - K49</span>
                </div>

            </div>

            <!-- Box 3 -->
            <div class="box">
                <img src="https://i.pinimg.com/736x/56/f4/87/56f4872991f1dbfb51422f5b9a23114c.jpg">
                <div class="infor">
                    <!-- <span class="tag">Full Name: &nbsp;</span> -->
                    <span class="data">Đoàn Trung Dân</span>
                </div>
                <div class="infor">
                    <!-- <span class="tag">MSSV: &nbsp;</span> -->
                    <span class="data">B2306523</span>
                </div>
                <div class="infor">
                    <!-- <span class="tag">Chuyên ngành: &nbsp;</span> -->
                    <span class="data">An toàn thông tin - K49</span>
                </div>


            </div>




        </div>

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