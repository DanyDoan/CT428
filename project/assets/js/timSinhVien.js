function timSinhVien() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let danhSachSinhVien = JSON.parse(this.responseText);
        hienThiSinhVien(danhSachSinhVien);
    }

    const formData = new FormData(document.getElementById("searchingForm"));
    xhttp.open("POST", "../controllers/timSinhVien.php");
    xhttp.send(formData);
}