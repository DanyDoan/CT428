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
                <th>Khoa / Trường </th>
                <th>Lớp cố vấn</th>
                <th>Email</th>
                <th>SĐT</th>
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
        for (let truong of khoaTruong) {
            if (truong.maKhoaTruong == canBo["maKhoaTruong"]){
                row += "<td>" + truong.tenKhoaTruong + "</td>";
                MKT = truong.maKhoaTruong;
            }
        }
        
        row += `<td>${canBo["tenLop"] ?? "..."}</td>`;
        row += `<td>${canBo["email"] ?? "..."}</td>`;
        row += `<td>${canBo["soDienThoai"] ?? "..."}</td>`;

        row += "</tr>";

        stack.push(row);
        count++;

        if (count % 10 == 0) {
            pages.push(stack.join(""));
            stack = [];
        }
    }

    // Nếu còn dữ liệu lẻ trang
    if (count % 10 != 0) {
        pages.push(stack.join(""));
    }

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

function toggle(target){
    const btn = target.querySelector('input[type="checkbox"]');
    btn.checked = !btn.checked;
}

function selectAll(act_type){
    const cols = document.getElementsByName(act_type);
    for (let col of cols)
        col.checked = true;
}
