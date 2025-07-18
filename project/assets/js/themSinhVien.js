function themSinhVien() {

    const formData = new FormData(document.getElementById("addingForm"));
    if (!/^[B]\d{7}$/.test(formData.get("MSSV"))) {
        alert("Mã số sinh viên không hợp lệ");
        return;
    }
    if (formData.get("ngaySinh").substring(0, 4) < 1975 || formData.get("ngaySinh").substring(0, 4) > 2006) {
        alert("Năm sinh không hợp lệ");
        return;
    }
    const xhttp = new XMLHttpRequest();


    xhttp.onload = function () {
        document.getElementById("anounceBox").innerHTML = "";
        try {
            let danhSachSinhVien = JSON.parse(this.responseText);
            if (danhSachSinhVien["status"] == "fail") {
                document.getElementById("anounceBox").innerHTML = "<h4 class='message'>Không được bỏ trống dữ liệu</h4>";
            } else if (danhSachSinhVien["status"] == "existed") {
                document.getElementById("anounceBox").innerHTML = "<h4 class='message'>Mã số sinh viên đã tồn tại</h4>";
            } else {
                document.getElementById("anounceBox").innerHTML = "<h4 class='message'>Thêm thành công</h4>";
                hienThiSinhVien(danhSachSinhVien.data);
            }
        } catch (e) {
            document.getElementById("anounceBox").innerHTML = "<h4 class='message text-danger'>Lỗi hệ thống hoặc JSON không hợp lệ</h4>";
            console.error("Lỗi khi parse JSON:", this.responseText);
        }
    }

    xhttp.open("POST", "../controllers/themSinhVien.php");
    xhttp.send(formData);
}