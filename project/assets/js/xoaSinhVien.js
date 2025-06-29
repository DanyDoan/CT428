function xoaSinhVien(MSSV){
    xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        let danhSachSinhVien = JSON.parse(this.responseText);
        hienThiSinhVien(danhSachSinhVien);
    }
    xhttp.open("POST", "../controllers/xoaSinhVien.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("MSSV=" + encodeURIComponent(MSSV));
}