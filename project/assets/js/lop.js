// Gán danh sách lớp cho hộp công cụ thêm sinh viên
ganDanhSachLop(document.getElementById('maKhoaTruong').value);


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



// Bắt sự kiện khi người dùng thay đổi lựa chọn tên trường/khoa sẽ thay đổi các lựa chọn lớp
document.getElementById("maKhoaTruong").onchange = function () {
    ganDanhSachLop(document.getElementById('maKhoaTruong').value);
}

// Gán danh sách lớp dưa trên Khoa/Trường của công cụ thêm sinh viên
function ganDanhSachLop(maKhoaTruong) {
    let ds = danhSachLop(maKhoaTruong);
    let output = "";
    for (let lop of ds) {
        output += "<option value='" + lop.maLop+ "'>" + lop.tenLop + "</option>";
    }
    document.getElementById("tenLop").innerHTML = output;
}

// Gán danh sách lớp dựa trên Khoa/Trường của sinh viên
function ganDanhSachLopV2(selectTag){
    let maLopField = selectTag.closest('td').nextElementSibling.children[0];
    let ds = danhSachLop(selectTag.value);
    let output = "";
    for (let lop of ds) {
        output += "<option value='" + lop.maLop+ "'>" + lop.tenLop + "</option>";
    }
    maLopField.innerHTML = output;
    
}



