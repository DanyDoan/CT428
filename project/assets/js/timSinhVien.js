function timSinhVien() {
    const xhttp = new XMLHttpRequest();
    xhttp.onload = function () {
        let danhSachSinhVien = JSON.parse(this.responseText);
        hienThiSinhVien(danhSachSinhVien.data);
    }
    let formData = new FormData(document.getElementById("searchBar"));;
    // if (localStorage.getItem("maLop") != null){
    //     formData = new FormData();
    //     formData.append("searchingField", "maLop");
    //     formData.append("fieldValue", JSON.parse(localStorage.getItem("maLop")));
    //     localStorage.removeItem("maLop");
    // }
    // else{
    //     formData = new FormData(document.getElementById("searchBar"));
    // }
    xhttp.open("POST", "../controllers/timSinhVien.php");
    xhttp.send(formData);
}