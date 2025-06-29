// Bắt sự kiện khi người dùng thay đổi lựa chọn tên trường/khoa
ganDanhSachNganh();
document.getElementById("tenTruong").onchange = function(){
    ganDanhSachNganh();
}

//Lấy danh sách tên lớp thuộc trường/khoa 
function layTenNganh(maTruong) {
    const maNganh = {
        "DA": [
            "Công nghệ sinh học",
            "Công nghệ thực phẩm",
            "Công nghệ sau thu hoạch"
        ],
        "DI": [
            "Truyền thông đa phương tiện",
            "Khoa học máy tính",
            "Mạng máy tính và truyền thông dữ liệu",
            "Kỹ thuật phần mềm",
            "Hệ thống thông tin",
            "Công nghệ thông tin",
            "An toàn thông tin"
        ],
        "FL": [
            "Sư phạm Tiếng Anh",
            "Sư phạm Tiếng Pháp",
            "Ngôn ngữ Anh",
            "Ngôn ngữ Pháp",
            "Ngôn ngữ Anh - học tại Hòa An"
        ],
        "HG": [
            "Quản trị kinh doanh - học tại Hòa An",
            "Luật - học tại Hòa An",
            "Công nghệ thông tin - học tại Hòa An",
            "Kinh doanh nông nghiệp - học tại Hòa An",
            "Kinh tế nông nghiệp - học tại Hòa An",
            "Du lịch - học tại Hòa An"
        ],
        "KH": [
            "Sinh học",
            "Hóa học",
            "Toán ứng dụng",
            "Thống kê",
            "Vật lý kỹ thuật",
            "Hóa dược"
        ],
        "KT": [
            "Kinh tế",
            "Quản trị kinh doanh",
            "Marketing",
            "Kinh doanh quốc tế",
            "Kinh doanh thương mại",
            "Tài chính - Ngân hàng",
            "Kế toán",
            "Kiểm toán",
            "Kinh tế nông nghiệp",
            "Quản trị dịch vụ du lịch và lữ hành",
            "Kinh tế tài nguyên thiên nhiên"
        ],
        "LK": [
            "Luật",
            "Luật kinh tế"
        ],
        "ML": [
            "Giáo dục Công dân",
            "Triết học",
            "Chính trị học"
        ],
        "MT": [
            "Khoa học môi trường",
            "Kỹ thuật môi trường",
            "Quy hoạch vùng và đô thị",
            "Kỹ thuật cấp thoát nước",
            "Quản lý tài nguyên và môi trường",
            "Quản lý đất đai"
        ],
        "NN": [
            "Sinh học ứng dụng",
            "Khoa học đất",
            "Chăn nuôi",
            "Nông học",
            "Khoa học cây trồng",
            "Bảo vệ thực vật",
            "Công nghệ rau hoa quả và cảnh quan",
            "Thú y"
        ],
        "SP": [
            "Giáo dục mầm non",
            "Giáo dục Tiểu học",
            "Sư phạm Toán học",
            "Sư phạm Tin học",
            "Sư phạm Vật lý",
            "Sư phạm Hóa học",
            "Sư phạm Sinh học",
            "Sư phạm Ngữ văn",
            "Sư phạm Lịch sử",
            "Sư phạm Địa lý",
            "Sư phạm Khoa học tự nhiên"
        ],
        "TD": [
            "Giáo dục Thể chất"
        ],
        "TN": [
            "Kỹ thuật máy tính",
            "Công nghệ kỹ thuật hóa học",
            "Quản lý công nghiệp",
            "Logistics và Quản lý chuỗi cung ứng",
            "Kỹ thuật cơ khí",
            "Kỹ thuật cơ điện tử",
            "Kỹ thuật ô tô",
            "Kỹ thuật điện",
            "Kỹ thuật điện tử - viễn thông",
            "Kỹ thuật y sinh",
            "Kỹ thuật điều khiển và tự động hóa",
            "Kỹ thuật vật liệu",
            "Kiến trúc",
            "Kỹ thuật xây dựng",
            "Kỹ thuật xây dựng công trình thủy",
            "Kỹ thuật xây dựng công trình giao thông"
        ],
        "TS": [
            "Công nghệ chế biến thủy sản",
            "Nuôi trồng thủy sản",
            "Bệnh học thủy sản",
            "Quản lý thủy sản"
        ],
        "XH": [
            "Văn học",
            "Xã hội học",
            "Báo chí",
            "Thông tin - thư viện",
            "Du lịch"
        ]
    };
    return maNganh[maTruong];
};

// Gán danh sách ngành phù hợp với tên trường/khoa mà người dùng chọn
function ganDanhSachNganh() {
    let danhSachNganh = layTenNganh(document.getElementById("tenTruong").value);
    let output = "";
    for (let i = 0; i < danhSachNganh.length; i++) {
        if (i == 0)
            output += "<option value='" + danhSachNganh[i] + "'>" + danhSachNganh[i] + "</option>";
        else
            output += "<option value='" + danhSachNganh[i] + "'>" + danhSachNganh[i] + "</option>";


    }
    document.getElementById("tenLop").innerHTML = output;
}


