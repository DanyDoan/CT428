function suaSinhVien(data) {
    data = JSON.parse(data);
    // if (data.ngaySinh.substring(0, 4) < 1975 || data.ngaySinh.substring(0, 4) > 2006) {
    //     alert("Năm sinh không hợp lệ tại "+data.MSSV);
    //     window.location.reload();
    //     return;
    // }
    let xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        try {
            let output = JSON.parse(xhttp.responseText);
            document.getElementById("anounceBox").innerHTML = "<h2>" + output["message"] + "</h2>";
            hienThiSinhVien(output["danhSachSinhVien"]);
        } catch (e) {
            alert("Lỗi JSON: " + e.message);
            console.log("Response Text:", xhttp.responseText);
        }
    };

    xhttp.open("POST", "../controllers/suaSinhVien.php");
    xhttp.setRequestHeader('Content-Type', 'application/json');
    xhttp.send(JSON.stringify(data));
}

function danhSachSua() {
    const targets = document.getElementsByName('update');
    for (let sv of targets) {
        if (sv.checked === true) {
            let row = sv.closest('tr');
            let inputs = row.querySelectorAll('input');
            let selects = row.querySelectorAll('select');
            let data = {
                MSSV: inputs[0].value,
                hoTen: inputs[1].value,
                gioiTinh: selects[0].value,
                truong: selects[1].value,
                tenLop: selects[2].value,
                khoa: selects[3].value
            }
            suaSinhVien(JSON.stringify(data));
        }
    }
    // alert(count(target));
}