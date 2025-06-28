function themSinhVien() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let danhSachSinhVien = JSON.parse(this.responseText);
        document.getElementById("anounceBox").innerHTML = "";
        if (danhSachSinhVien.status == "fail")
            document.getElementById("anounceBox").innerHTML = "<h4>Không được bỏ trống dữ liệu</h4>";
        else{  
            document.getElementById("anounceBox").innerHTML = "<h4>Thêm sinh viên thành công</h4>";
            hienThiSinhVien(danhSachSinhVien.data);
        }
    }

    const formData = new FormData(document.getElementById("addingForm"));
    xhttp.open("POST", "../controllers/themSinhVien.php");
    xhttp.send(formData);
}