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
                <th>Trường / Khoa</th>
            </tr>
        </thead>
    `;
    document.getElementById("canBoList").innerHTML = theader + "<tbody>" + htmlRows + "</tbody>";
}

function hienThiCanBo(danhSachCanBo) {
    let pages = [];
    let stack = [];
    let count = 0;

    const obj = {
        "DI": "Trường CNTT&TT",
        "DA": "Viện CNSH&TP",
        "KT": "Trường Kinh Tế",
        "FL": "Khoa Ngoại Ngữ",
        "HG": "Khoa PTNT",
        "KH": "Khoa KHTN",
        "XH": "Khoa KHXH&NV",
        "LK": "Khoa Luật",
        "MT": "Khoa MT&TNTN",
        "ML": "Khoa Chính Trị",
        "NN": "Trường Nông Nghiệp",
        "SP": "Trường Sư Phạm",
        "TD": "Khoa Thể Chất",
        "TN": "Trường Bách Khoa",
        "TS": "Trường Thủy Sản"
    };

    for (let canBo of danhSachCanBo) {
        let row = "<tr>";
        row += `<td>${canBo["MSCB"]}</td>`;
        row += `<td>${canBo["hoTen"]}</td>`;
        row += `<td>${canBo["gioiTinh"]}</td>`;

        row += `<td>${obj[canBo["noiCongTac"]] || ""} (${canBo["noiCongTac"]})</td>`;
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
