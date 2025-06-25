<?php
    require_once("../config/db.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/style.css">
    <style>
        main{
            /* background-color: black; */
            justify-content: center;
            align-items: center;
        }
        fieldset{
            padding:20px;
            text-align: center;
        }
        table{
            line-height: 40px;
        }
        th, td{
            font-size: 16px;
            color:black;
        }
        fieldset > input{
            background-color: black;
            color:white;
            border:1px solid white;
            border-radius: 10px;
            padding: 6px 10px;
            margin: 10px;
            transition: 0.5s;
        }
        fieldset > input:hover{
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
    <form method="POST" action="login.php">
        <fieldset>
            <legend>Đăng nhập</legend>
            <table>
                <tr>
                    <th><label for="userName">Mã tài khoản: </label></th>
                    <td><input type="text" required></td>
                </tr>
                <tr>
                    <th><label for="userPassword">Mật khẩu: </label></th>
                    <td><input type="password" required></td>
                </tr>
            </table>
            <input type="submit" value="Đăng nhập"></input>
            <input type="reset" value="Hủy"></input>
        </fieldset>

    </form>
</main>

<!-- Footer -->
    <?php
        require("../require/footer.html");
    ?>
</body>
</html>

<?php
    
?>
