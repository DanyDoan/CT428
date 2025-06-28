function themSinhVien(e) {
    e.preventDefault();
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let danhSachSinhVien = JSON.parse(this.responseText);
        hienThiSinhVien(danhSachSinhVien);
    }

    const formData = new FormData(document.getElementById("addingForm"));
    xhttp.open("POST", "../controllers/themSinhVien.php");
    xhttp.send(formData);
}