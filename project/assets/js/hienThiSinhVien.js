function phanTrang(danhSachSinhVien) {
    let theader = "<tr><th>MSSV</th><th>Họ Tên</th><th>Ngày Sinh</th><th>Giới Tính</th><th>Tên lớp</th><th>Trường</th><th>Khóa</th></th><th>Chức năng</th></tr>";
    document.getElementById("studentList").innerHTML = theader + danhSachSinhVien;
}

function hienThiSinhVien(danhSachSinhVien) {
    let pages = [];
    let stack = [];
    let count = 0;

    for (let sinhVien of danhSachSinhVien) {
        let row = "<tr>";
        for (let muc in sinhVien) {
            row += "<td>" + sinhVien[muc] + "</td>";
        }
        row += "<td><button type='button' onclick='suaSinhVien("+sinhVien["MSSV"]+")' class='icon'></button></button>"
        row += "<button type='button' onclick='xoaSinhVien("+sinhVien["MSSV"]+")' class='icon'></button></td></tr>";
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

