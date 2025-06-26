<?php
require_once("../config/db.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        main {
            /* background-color: black; */
            justify-content: center;
            align-items: center;
            /* padding:50px 0px; */
        }

        fieldset {
            padding: 20px;
            text-align: center;
        }

        table {
            line-height: 2em;
        }

        th,
        td {
            font-size: 16px;
            color: black;
        }

        fieldset>input {
            background-color: black;
            color: white;
            border: 1px solid white;
            border-radius: 10px;
            padding: 6px 10px;
            margin: 10px;
            transition: 0.5s;
        }

        fieldset>input:hover {
            transition: 0.5s;
            transform: scale(1.1);
        }
    </style>
</head>

<body>

    <!-- Header -->
    <?php
    require("../require/header.html");
    ?>

    <!-- Main -->
    <main>

        <!-- Side Bars -->
        <?php
            require("../require/sideBar.html");
        ?>

        <div id="content">
            <form method="POST" action="register.php">
                <fieldset>
                    <legend>Đăng Ký Tài Khoản Quản Trị</legend>
                    <table>
                        <tr>
                            <th><label for="adminName">Họ và Tên: </label></th>
                            <td><input type="text" id="adminName" name="adminName" required></td>
                        </tr>
                        <tr>
                            <th><label for="adminBirth">Ngày sinh</label></th>
                            <td><input type="date" id="adminBirth" name="adminBirth" required></td>
                        </tr>
                        <tr>
                            <th><label for="adminWorkplace" required>Công tác tại: </label></th>
                            <td>
                                <select id="adminWorkplace" name="adminWorkplace">
                                    <optgroup label="Cấp Trường" selected>
                                        <option value="DI" selected>Trường CNTT&TT</option>
                                        <option value="CN">Trường Bách Khoa</option>
                                        <option value="KT">Trường Kinh Tế</option>
                                        <option value="NN">Trường Nông Nghiệp</option>
                                        <option value="SP">Trường Sư Phạm</option>
                                        <option value="TS">Trường Thủy Sản</option>
                                    </optgroup>
                                    <optgroup label="Cấp Khoa">
                                        <option value="DB">Khoa Dự Bị Dân Tộc</option>
                                        <option value="MT">Khoa Chính Trị</option>
                                        <option value="TN">Khoa Khoa Học Tự Nhiên</option>
                                        <option value="XH">Khoa KHXH&NV</option>
                                        <option value="KL">Khoa Luật</option>
                                        <option value="MTN">Khoa MT&TNTN</option>
                                        <option value="FL">Khoa Ngoại Ngữ</option>
                                        <option value="TC">Khoa Giáo Dục Thể Chất</option>
                                    </optgroup>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <th><label for="adminBirthday"></label></th>
                        </tr>
                        <tr>
                            <th><label for="adminID">Mã tài khoản: </label></th>
                            <td><input type="text" id="adminID" name="adminID" required></td>
                        </tr>
                        <tr>
                            <th><label for="adminPassword">Đặt mật khẩu: </label></th>
                            <td><input type="password" id="adminPassword" name="adminPassword" required></td>
                        </tr>
                        <tr>
                            <th><label for="retype">Nhập lại mật khẩu: </label></th>
                            <td><input type="password" id="retype" name="retype" required></td>
                        </tr>
                        <tr>
                            <th><label for="key">Security Key: </label></th>
                            <td><input type="text" id="key" name="key"></td>
                        </tr>
                        <tr>
                            <th colspan=2 style="color:red">Tôi Cam Kết Thực Hiện Đúng Trách Nhiệm và Nghĩa Vụ</th>
                        </tr>
                    </table>
                    <input type="submit" value="Đăng Ký" name="submit"></input>
                    <input type="reset" value="Hủy"></input>
                </fieldset>
            </form>
        </div>
    </main>

    <!-- Footer -->
    <?php
    require("../require/footer.html");
    ?>
</body>

</html>

<?php
    if ($_SERVER["REQUEST_METHOD"] == "POST"){
        if ($_POST["adminPassword"] != $_POST["retype"]){
            echo "<script>
                        alert('Mật khẩu không khớp');
                  </script>";
            exit();
        }
        if ($_POST["key"] != "2025"){
            echo "<script>
                        alert('Sai key');
                  </script>";
            exit();
        }
        if (checkIfExist($conn, $_POST["adminID"])){
            echo "Mã đã tồn tại";
            exit();
        }
        else{
            $stm =$conn->prepare("INSERT INTO adminList
                                 (adminID, adminPassword, adminName, adminBirth, adminWorkplace)
                                 VALUES( ?, ?, ?, ?, ?)");

            $hashedPassword=password_hash($_POST["adminPassword"], PASSWORD_DEFAULT);
            $stm->bind_param("sssss", $_POST["adminID"], 
                                      $hashedPassword,
                                      $_POST["adminName"], 
                                      $_POST["adminBirth"], 
                                      $_POST["adminWorkplace"]);
            if ($stm->execute()){
                echo "<script>
                        location.href='index.php';  
                     </script>";
                // ob_start();
                // header("Location: ../index.php");
            }else
                echo "<script>
                        alert('thất bại');        
                </script>";        
        }
    }

    function checkIfExist($conn, $id){
        $stm =$conn->prepare("SELECT * 
                              FROM adminList
                              WHERE adminID = ?");
        $stm->bind_param("s", $id);
        if ($stm->execute()){
            $result = $stm->get_result();
            return ($result->num_rows > 0);
        }else;
    }
?>

<script>
    function hideNav(){
        const sideBar = document.getElementById("sideBar");
        sideBar.classList.toggle("active");
    }
</script>