let load = 0;
function phanTrang(danhSachSinhVien) {
    if (danhSachSinhVien == '') {
        document.getElementById("studentList").innerHTML = "";
        document.getElementById("nutPhanTrang").innerHTML = "";
    }
    else {
        let theader = "<tr><th>Mã Số Sinh Viên</th><th>Họ Tên Sinh Viên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Trường / Khoa</th><th>Ngành Học</th><th>Khóa</th></th><th>Lưu Thay Đổi</th><th>Xóa Sinh Viên</th></tr>";
        document.getElementById("studentList").innerHTML = theader + danhSachSinhVien;
    }
}

function hienThiSinhVien(danhSachSinhVien) {

    
    if (danhSachSinhVien == '' && load != 0) {
        phanTrang('');
        exit;
    }
    load++;
    let pages = [];
    let stack = [];
    let count = 0;

    let obj = {
        "DI" : "Trường CNTT&TT",
        "DA" : "Viện CNSH&TP",
        "KT" : "Trường Kinh Tế",
        "FL" : "Khoa Ngoại Ngữ",
        "HG" : "Khoa PTNT",
        "KH" : "Khoa KHTN",
        "XH" : "Khoa KHXH&NV",
        "LK" : "Khoa Luật",
        "MT" : "Khoa MT&TNTN",
        "ML" : "Khoa Chính Trị",
        "NN" : "Trường Nông Nghiệp",
        "SP" : "Trường Sư Phạm",
        "TD" : "Khoa Thể Chất",
        "TN" : "Trường Bách Khoa",
        "TS" : "Trường Thủy Sản"
    }
    for (let sinhVien of danhSachSinhVien) {
        let row = "<tr>";
        row += "<td><input type='text' value='" + sinhVien["MSSV"] + "' disabled></td>";
        row += "<td><input type='text' value='" + sinhVien["hoTen"] + "'></td>";

        row += "<td><input type='date' value='" + sinhVien["ngaySinh"] + "'></td>";

        // Gender field
        row += "<td><select name='gioiTinh'>";
        if (sinhVien["gioiTinh"].toUpperCase() == "NAM") {
            row += "<option value='Nam' selected>Nam</option>"
            row += "<option value='Nữ'>Nữ</option>";
        } else {
            row += "<option value='Nam' >Nam</option>"
            row += "<option value='Nữ' selected>Nữ</option>";
        }
        row += "</select></td>";

        //School field
        row += "<td><select name='truong' onchange='ganDanhSachNganhV2(this)'>";
        for (let key in maTruong) {
            if (key == sinhVien["truong"])
                row += "<option value='" + key + "' selected>" + obj[key] + "</option>"
            else
                row += "<option value='" + key + "'>" + obj[key] + "</option>"
        }
        row += "</select></td>";

        //Class field
        let lop = layTenNganh(sinhVien["truong"]);
        row += "<td><select name='tenLop'>";
        for (let i = 0; i < lop.length; i++) {
            if (lop[i].toUpperCase() == sinhVien["tenLop"].toUpperCase())
                row += "<option value='" + lop[i] + "' selected>" + lop[i] + "</option>";
            else
                row += "<option value='" + lop[i] + "'>" + lop[i] + "</option>";
        }
        row += "</select></td>";

        row += "<td><select name='khoa'>";
        for (let i = 45; i <= 50; i++) {
            if (("K" + i).toUpperCase() == sinhVien["khoa"].toUpperCase())
                row += "<option value='" + i + "' selected>K" + i + "</option>"
            else
                row += "<option value='" + i + "'>K" + i + "</option>"
        }

        row += "</select></td>";
        row += `<td><button type='button' onclick="suaSinhVien(this)" class='icon'></button></td>`
        row += `<td><button type='button' onclick="xoaSinhVien('${sinhVien["MSSV"]}')" class='icon'></button></td></tr>`;

        stack.push(row);
        count++;
        if (count % 10 == 0) {
            pages.push(stack.join(""));
            stack = [];
        }
    }
    if (count % 10 != 0) {
        pages.push(stack.join(""));
    }

    document.getElementById("nutPhanTrang").innerHTML = "";
    for (let i = 0; i < pages.length; i++) {
        const button = document.createElement("button");
        button.addEventListener("click", () => phanTrang(pages[i]));
        button.innerText = `${i + 1}`;
        button.classList.add("pageButton");
        document.getElementById("nutPhanTrang").appendChild(button);
    }
    if (pages.length > 0)
        phanTrang(pages[0]);

}

