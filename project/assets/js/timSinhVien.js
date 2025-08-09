function timSinhVien() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let danhSachSinhVien = JSON.parse(this.responseText);
        hienThiSinhVien(danhSachSinhVien);
    }

    let formData;
    if (localStorage.getItem("tenLop") != null){
        formData = new FormData();
        formData.append("searchingField", "tenLop");
        formData.append("fieldValue", JSON.parse(localStorage.getItem("tenLop")));
        localStorage.removeItem("tenLop");
    }
    else{
        formData = new FormData(document.getElementById("searchBar"));
    }
    xhttp.open("POST", "../controllers/timSinhVien.php");
    xhttp.send(formData);
}