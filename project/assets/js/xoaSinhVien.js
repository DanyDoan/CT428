function xoaSinhVien(MSSV){
    xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        alert(this.responseText);
        let danhSachSinhVien = JSON.parse(this.responseText);
        document.getElementById("anounceBox").innerHTML = "<h2>Xóa thành công</h2>";
        hienThiSinhVien(danhSachSinhVien.data);
    }
    xhttp.open("POST", "../controllers/xoaSinhVien.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("MSSV=" + encodeURIComponent(MSSV));
}

