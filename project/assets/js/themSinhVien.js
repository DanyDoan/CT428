function themSinhVien() {

    const formData = new FormData(document.getElementById("addingForm"));
    if (!/^[B]\d{7}$/.test(formData.get("MSSV"))) {
        alert("Mã số sinh viên không hợp lệ");
        return;
    }

    const xhttp = new XMLHttpRequest();


    xhttp.onload = function () {
        document.getElementById("anounceBox").innerHTML = "";
        alert(this.responseText);
        let danhSachSinhVien = JSON.parse(this.responseText);
        if (danhSachSinhVien["status"] == "null") {
            document.getElementById("anounceBox").innerHTML = "<h2>Không được bỏ trống dữ liệu</h2>";
        } else if (danhSachSinhVien["status"] == "existed") {
            document.getElementById("anounceBox").innerHTML = "<h2>Mã số sinh viên đã tồn tại</h2>";
        } else if (danhSachSinhVien["status"] == "success") {
            document.getElementById("anounceBox").innerHTML = "<h2>Thêm thành công</h2>";
        }  else{
            document.getElementById("anounceBox").innerHTML = "<h2>"+danhSachSinhVien.status+"/h2>";
        }
        hienThiSinhVien(danhSachSinhVien.data);
    }

    xhttp.open("POST", "../controllers/themSinhVien.php");
    xhttp.send(formData);
}