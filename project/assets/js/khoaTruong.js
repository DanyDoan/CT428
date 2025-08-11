// Sử dụng kỹ thuật AJAX để lấy toàn bộ {["maKhoaTruong", "tenKhoaTruong"]} để gán option
function danhSachKhoaTruong(){
    const xhttp = new XMLHttpRequest();
    xhttp.open("POST", "../controllers/khoaTruong.php", false);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send();    


    const res = JSON.parse(xhttp.responseText);

    //Trả về mảng đối tượng 
    return res;
}

