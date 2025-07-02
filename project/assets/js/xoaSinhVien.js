function xoaSinhVien(MSSV){
    xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        let danhSachSinhVien = JSON.parse(this.responseText);
            document.getElementById("anounceBox").innerHTML = "<h4 style='color: red' class='message'>Xóa thành công</h4>";
        hienThiSinhVien(danhSachSinhVien);
    }
    xhttp.open("POST", "../controllers/xoaSinhVien.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("MSSV=" + encodeURIComponent(MSSV));
}