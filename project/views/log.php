<?php
require("../config/db.php");
session_start();
if (!isset($_SESSION['MSCB'])) {
    header("Location: login.php");
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
    <link rel="icon" href="../shared/banner/logo.png">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.6.7">
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../assets/sidebar-style.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

    <title>Cán bộ</title>

    <style>
        table {
            width: 80%;
            margin: 10px AUTO;
            padding: 10px;
            border-collapse: collapse;
            background-color: red;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            border-radius: 0.2em;
        }

        table * {
            border: 1px solid black;
            text-align: center;
        }



        table th,
        table td {
            width: fit-content;
            min-width: 75px;
            max-width: 150px;
            padding: 2px 0px;
            border: 1px solid rgba(221, 196, 196, 1);
            padding: 10px;
            align-content: start;
        }


        table th {
            padding: 5px;
            background-color: #0d6efd;
            color: white;
            font-size: 0.8em;

        }

        table tr {
            background-color: rgba(255, 255, 255, 1);
        }

        table tr:nth-child(2n) {
            background-color: rgba(217, 235, 245, 1);
        }

        br {
            display: inline;
        }
    </style>

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
                alert(this.responseText)
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