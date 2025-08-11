// Sử dụng Kỹ thuật AJAX để lấy danh sách /mã lớp/ & /tên lớp/ 
// dựa trên tham số /mã trường/
function danhSachLop(maKhoaTruong){
    const xhttp = new XMLHttpRequest();

    xhttp.open("POST", "../controllers/lop.php", false);
    xhttp.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhttp.send("maKhoaTruong=" + encodeURIComponent(maKhoaTruong));

    const res = JSON.parse(xhttp.responseText);
    return res.data;
}


// Gán danh sách lớp dưa trên Khoa/Trường của công cụ thêm sinh viên
function ganDanhSachLop(maKhoaTruong) {
    let ds = danhSachLop(maKhoaTruong);
    let output = "";
    for (let lop of ds) {
        output += "<option value='" + lop.maLop+ "'>" + lop.tenLop + "</option>";
    }
    document.getElementById("maLop").innerHTML = output;
}




