function xoaSinhVien(MSSV){
    xhttp = new XMLHttpRequest();

    xhttp.onload = function(){
        // alert(this.responseText);
        let output = JSON.parse(this.responseText);
        try{
            document.getElementById("anounceBox").innerHTML = "<h2>Xóa thành công</h2>";
            hienThiSinhVien(output["data"]);
        }catch(e){}
    }
    xhttp.open("POST", "../controllers/xoaSinhVien.php");
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("MSSV=" + encodeURIComponent(MSSV));
}

