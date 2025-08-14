function phanTrang(htmlRows, pageIndex) {
    const btns = document.getElementsByClassName("pageButton");

    // Xóa class currentPage khỏi tất cả nút
    for (let btn of btns) {
        btn.classList.remove('currentPage');
    }
    if (btns[pageIndex]) {
        btns[pageIndex].classList.add('currentPage');
    }

    // Nếu trang rỗng
    if (!htmlRows || htmlRows.trim() === "") {
        document.getElementById("canBoList").innerHTML = "";
        document.getElementById("pagin").innerHTML = "";
        return;
    }

    // Tạo bảng
    let theader = `
        <thead>
            <tr>
                <th>Mã Số Cán Bộ</th>
                <th>Họ Tên Cán Bộ</th>
                <th>Giới Tính</th>
                <th>Trình độ học vấn</th>
                <th>Khoa / Trường </th>
                <th>Lớp cố vấn</th>
                <th>Email</th>
            </tr>
        </thead>
    `;
    document.getElementById("canBoList").innerHTML = theader + "<tbody>" + htmlRows + "</tbody>";
}

function hienThiCanBo(danhSachCanBo) {
    if (danhSachCanBo.length == 0) {
        phanTrang('', -1);
        return;
    }
    let pages = [];
    let stack = [];
    let count = 0;

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

    for (let canBo of danhSachCanBo) {
        let row = "<tr>";
        row += `<td>${canBo["MSCB"]}</td>`;
        row += `<td>${canBo["hoTen"]}</td>`;
        row += `<td>${canBo["gioiTinh"]}</td>`;
        if (canBo["chucVu"] == null)
            row += `<td>...</td>`;
        else
        row += `<td>${canBo["chucVu"]}</td>`;

        for (let truong of khoaTruong) {
            if (truong.maKhoaTruong == canBo["maKhoaTruong"]) {
                row += "<td>" + truong.tenKhoaTruong + "</td>";
                MKT = truong.maKhoaTruong;
            }
        }

        row += `<td>${canBo["tenLop"] ?? "..."}</td>`;
        row += `<td>${canBo["email"] ?? "..."}</td>`;
        row += "</tr>";

        stack.push(row);
        count++;

        if (count % 12 == 0) {
            pages.push(stack.join(""));
            stack = [];
        }
    }

    // Nếu còn dữ liệu lẻ trang
    if (count % 12 != 0) {
        pages.push(stack.join(""));
    }

    document.getElementById("pagin").innerHTML = "";
    for (let i = 0; i < pages.length; i++) {
        const button = document.createElement("button");
        button.addEventListener("click", () => phanTrang(pages[i], i));
        button.innerText = `${i + 1}`;
        // button.classList.add("pageButton");
        button.classList.add("btn");
        button.classList.add("btn-sm");
        button.classList.add("btn-light");

        document.getElementById("pagin").appendChild(button);
    }
    if (pages.length > 0)
        phanTrang(pages[0], 0);

}