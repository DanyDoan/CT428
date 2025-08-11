function phanTrang(danhSachSinhVien, k) {
    const btns = document.getElementsByClassName("pageButton");

    for (let btn of btns) {
        btn.classList.remove('currentPage');
    }
    if (k != -1)
        btns[k].classList.add('currentPage');

    if (danhSachSinhVien == '') {
        document.getElementById("studentList").innerHTML = "";
        document.getElementById("pagin").innerHTML = "";
    }
    else {
        let theader = "<thead><tr><th>Mã Số Sinh Viên</th><th>Họ Tên Sinh Viên</th><th>Giới Tính</th><th>Trường / Khoa</th><th>Ngành Học</th><th>Khóa</th></th><th onclick='selectAll(" + '"update"' + ")'>Lưu Thay Đổi</th><th onclick='selectAll(" + '"remove"' + ")'>Xóa Sinh Viên</th></tr></thead>";
        document.getElementById("studentList").innerHTML = theader + "<tbody>" + danhSachSinhVien + "</tbody>";
    }
}

function hienThiSinhVien(danhSachSinhVien) {
    if (danhSachSinhVien.length == 0) {
        phanTrang('', -1);
        return;
    }
    let pages = [];
    let stack = [];
    let count = 0;

    //Cache bảng KHOATRUONG về localStorage => Truy xuất nhanh hơn do không cần yêu cầu đến phía server
    let khoaTruong;
    if (JSON.parse(localStorage.getItem("danhSachKhoaTruong"))) {
        khoaTruong = JSON.parse((localStorage.getItem("danhSachKhoaTruong")));
    }
    else {
        khoaTruong = danhSachKhoaTruong();
        khoaTruong = khoaTruong.data;
        localStorage.setItem("danhSachKhoaTruong", JSON.stringify(khoaTruong));
    }
    //end cache

    for (let sinhVien of danhSachSinhVien) {
        let row = "<tr>";
        row += "<td  onclick='chiTiet(\"" + sinhVien["MSSV"] + "\")'><input type='text' value='" + sinhVien["MSSV"] + "' class='MSSV' disabled></td>";
        row += "<td><input type='text' value='" + sinhVien["hoTen"] + "'></td>";

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
        row += "<td><select name='maKhoaTruong' onchange='ganDanhSachLopV2(this)'>";
        let MKT;
        for (let truong of khoaTruong) {
            if (truong.maKhoaTruong == sinhVien["maKhoaTruong"]){
                row += "<option value='" + truong.maKhoaTruong + "' selected>" + truong.tenKhoaTruong + "</option>";
                MKT = truong.maKhoaTruong;
            }
            else
                row += "<option value='" + truong.maKhoaTruong + "'>" + truong.tenKhoaTruong + "</option>";
        }
        row += "</select></td>";


        //Cache csdl bảng LOP vào local Storage => Cải hiện tốc độ truy xuất
        let lop;
        if (JSON.parse(localStorage.getItem("lop"+MKT))) {
            lop = JSON.parse(localStorage.getItem("lop"+MKT));
        } else {
            lop = danhSachLop(sinhVien["maKhoaTruong"]);
            localStorage.setItem("lop"+MKT, JSON.stringify(lop));
        }

        //end cache

        row += "<td><select name='maLop'>";
        for (let l of lop) {
            if (l.maLop == sinhVien["maLop"])
                row += "<option value='" + l.maLop + "' selected>" + l.tenLop + "</option>";
            else
                row += "<option value='" + l.maLop + "'>" + l.tenLop + "</option>";
        }
        row += "</select></td>";


        row += "<td><select name='khoa'>";
        for (let i = 45; i <= 50; i++) {
            if (("K" + i).toUpperCase() == sinhVien["khoa"].toUpperCase())
                row += "<option value='K" + i + "' selected>K" + i + "</option>"
            else
                row += "<option value='K" + i + "'>K" + i + "</option>"
        }

        row += "</select></td>";
        row += `<td onclick='toggle(this)'><input type='checkbox' class='checkBox' name='update' value=${sinhVien["MSSV"]}></td>`
        row += `<td onclick='toggle(this)'><input type='checkbox' class='checkBox' name='remove' value=${sinhVien["MSSV"]}></td></tr>`;
        stack.push(row);
        count++;
        if (count % 10 == 0) {
            pages.push(stack.join(""));
            stack = [];
        }
        
    }
    if (count % 10 != 0)
                pages.push(stack.join(""));
    document.getElementById("pagin").innerHTML = "";
    for (let i = 0; i < pages.length; i++) {
        const button = document.createElement("button");
        button.addEventListener("click", () => phanTrang(pages[i], i));
        button.innerText = `${i + 1}`;
        button.classList.add("pageButton");
        document.getElementById("pagin").appendChild(button);
    }
    if (pages.length > 0)
        phanTrang(pages[0], 0);
}







function toggle(target) {
    const btn = target.querySelector('input[type="checkbox"]');
    btn.checked = !btn.checked;
}

function selectAll(act_type) {
    const cols = document.getElementsByName(act_type);
    for (let col of cols)
        col.checked = true;
}

