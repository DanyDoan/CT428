function suaSinhVien(data) {
    data = JSON.parse(data);
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        try {
            alert(xhttp.responseText)
            let output = JSON.parse(xhttp.responseText);
            document.getElementById("anounceBox").innerHTML = "<h2>" + output["message"] + "</h2>";
            hienThiSinhVien(output["data"]);
        } catch (e) {
            alert("Lỗi JSON: " + e.message);
            console.log("Response Text:", xhttp.responseText);
        }
    };

    xhttp.open("POST", "../controllers/suaSinhVien.php");
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.send(JSON.stringify(data));
}

