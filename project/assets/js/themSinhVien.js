function themSinhVien() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let danhSachSinhVien = JSON.parse(this.responseText);
        document.getElementById("anounceBox").innerHTML = "";
        if (danhSachSinhVien.status == "fail")
            document.getElementById("anounceBox").innerHTML = "<h4 class='message'>Không được bỏ trống dữ liệu</h4>";
        else {
            document.getElementById("anounceBox").innerHTML = "<h4 style='color: green' class='message'>Thêm thành công</h4>";
            hienThiSinhVien(danhSachSinhVien.data);
        }
    }

    const formData = new FormData(document.getElementById("addingForm"));
    xhttp.open("POST", "../controllers/themSinhVien.php");
    xhttp.send(formData);
}