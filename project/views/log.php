<?php
require("../config/db.php");
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: dangNhap.php");
    exit;
}


$stmt = $conn->prepare("SELECT * FROM CANBO WHERE MSCB = ?");
$stmt->bind_param("s", $_SESSION['MSCB']);
if ($stmt->execute() && ($result = $stmt->get_result())) {
    $row = $result->fetch_assoc();
} else {
    echo "Error: " . $stmt->error;
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../assets/images/logo.png">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/css/sidebar-style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.6.7">
    <link rel="stylesheet" href="../assets/css/log.css">
    
    <title>Cán bộ</title>

    

</head>

<body>
    <!-- Sidebar -->
    <div id="sideBar">
        <?php require("../shared/sideBar.php"); ?>
    </div>
    <!-- Main content -->
    <div id="main">
        <!-- Header -->
        <?php require("../shared/header.html"); ?>

        <!-- Main -->

        <!-- Content -->
        <div id="content" class="flex-grow-1 overflow-auto">


        </div>

        <!-- Footer -->
        <?php require("../shared/footer.html"); ?>
    </div>





    <script>
        chenLog();

        function chenLog() {
            const xhttp = new XMLHttpRequest();
            xhttp.onload = function() {
                const response = JSON.parse(this.responseText);

                let tb = "<table>"
                tb += "<tr><th>Thời gian</th><th>MSSB</th><th>Tên cán bộ</th><th>Mô tả</th><th>Mã số sinh viên</th></tr>"
                for (let task of response.data) {
                    tb += "<tr>";
                    for (let field in task)
                        tb += "<td>" + task[field] + "</td>";
                    tb += "</tr>"
                }
                tb += "</table>";
                document.getElementById("content").innerHTML = tb;
            }

            xhttp.open("POST", "../controllers/layLog.php");
            xhttp.setRequestHeader("Content-Type", "application/json");
            xhttp.send();
        }
    </script>
</body>

</html>