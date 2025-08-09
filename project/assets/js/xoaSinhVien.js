function xoaSinhVien(MSSV){
    xhttp = new XMLHttpRequest();
    xhttp.onload = function(){
        let danhSachSinhVien = JSON.parse(this.responseText);
            document.getElementById("anounceBox").innerHTML = "<h2>Xóa thành công</h2>";
        hienThiSinhVien(danhSachSinhVien);
    }
    xhttp.open("POST", "../controllers/xoaSinhVien.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("MSSV=" + encodeURIComponent(MSSV));
}

function danhSachXoa(){
    const targets = document.getElementsByName("remove");
    for (let sv of targets){
        if (sv.checked === true){
            let row = sv.closest('tr');
            let MSSV = row.querySelectorAll('input')[0].value;
            xoaSinhVien(MSSV);
        }
    }
}