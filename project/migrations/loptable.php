<?php
$query = "CREATE TABLE LOP(
              maLop varchar(50) PRIMARY KEY,
              tenLop varchar(255),
              maKhoaTruong varchar(50),
              FOREIGN KEY (maKhoaTruong) REFERENCES khoatruong(maKhoaTruong));";
try {
    $conn->query($query);
    // echo "Table adminList created<br>";
} catch (mysqli_sql_exception) {
    // echo "adminList is already created<br>";
}
try {
    $query = "";
    // Ảnh 1

    // Ảnh 2
    $query .= "INSERT INTO LOP VALUES('7380101', 'Luật', 'KL');";
    $query .= "INSERT INTO LOP VALUES('7380107', 'Luật kinh tế', 'KL');";
    $query .= "INSERT INTO LOP VALUES('7380103', 'Luật dân sự và tố tụng dân sự', 'KL');";

    // Ảnh 3
    $query .= "INSERT INTO LOP VALUES('7140201', 'Giáo dục Mầm non', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140202', 'Giáo dục Tiểu học', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140204', 'Giáo dục Công dân', 'ML');";
    $query .= "INSERT INTO LOP VALUES('7140206', 'Giáo dục Thể chất', 'TD');";
    $query .= "INSERT INTO LOP VALUES('7140209', 'Sư phạm Toán học', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140210', 'Sư phạm Tin học', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140211', 'Sư phạm Vật lý', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140212', 'Sư phạm Hóa học', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140213', 'Sư phạm Sinh học', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140217', 'Sư phạm Ngữ văn', 'SP');";

    // Ảnh 4
    $query .= "INSERT INTO LOP VALUES('7140218', 'Sư phạm Lịch sử', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140219', 'Sư phạm Địa lý', 'SP');";
    $query .= "INSERT INTO LOP VALUES('7140231', 'Sư phạm Tiếng Anh', 'FL');";
    $query .= "INSERT INTO LOP VALUES('7140233', 'Sư phạm Tiếng Pháp', 'FL');";
    $query .= "INSERT INTO LOP VALUES('7140247', 'Sư phạm Khoa học tự nhiên', 'SP');";

    // Ảnh 5
    $query .= "INSERT INTO LOP VALUES('7220201', 'Ngôn ngữ Anh', 'FL');";
    $query .= "INSERT INTO LOP VALUES('7220201H', 'Ngôn ngữ Anh - Hòa An', 'FL');";
    $query .= "INSERT INTO LOP VALUES('7220203', 'Ngôn ngữ Pháp', 'FL');";
    $query .= "INSERT INTO LOP VALUES('7229001', 'Triết học', 'ML');";
    $query .= "INSERT INTO LOP VALUES('7310201', 'Chính trị học', 'ML');";
    $query .= "INSERT INTO LOP VALUES('7310403', 'Tâm lý học giáo dục', 'XH');";
    $query .= "INSERT INTO LOP VALUES('7229030', 'Văn học', 'XH');";
    $query .= "INSERT INTO LOP VALUES('7320101', 'Báo chí', 'XH');";
    $query .= "INSERT INTO LOP VALUES('7810101', 'Du lịch', 'XH');";

    // Ảnh 6
    $query .= "INSERT INTO LOP VALUES('7420101', 'Sinh học', 'KH');";
    $query .= "INSERT INTO LOP VALUES('7420201', 'Công nghệ sinh học', 'DA');";
    $query .= "INSERT INTO LOP VALUES('7420203', 'Sinh học ứng dụng', 'KH');";
    $query .= "INSERT INTO LOP VALUES('7440112', 'Hóa học', 'KH');";
    $query .= "INSERT INTO LOP VALUES('7720203', 'Hóa dược', 'KH');";
    $query .= "INSERT INTO LOP VALUES('7460112', 'Toán ứng dụng', 'KH');";
    $query .= "INSERT INTO LOP VALUES('7460201', 'Thống kê', 'KH');";
    $query .= "INSERT INTO LOP VALUES('7520401', 'Vật lý kỹ thuật', 'KH');";

    // Ảnh 7
    $query .= "INSERT INTO LOP VALUES('7340101', 'Quản trị kinh doanh', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7340101H', 'Quản trị kinh doanh - Hòa An', 'HG');";
    $query .= "INSERT INTO LOP VALUES('7340115', 'Marketing', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7340120', 'Kinh doanh quốc tế', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7340121', 'Kinh doanh thương mại', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7340122', 'Thương mại điện tử', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7620114H', 'Kinh doanh nông nghiệp - Hòa An', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7310101', 'Kinh tế', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7620115', 'Kinh tế nông nghiệp', 'KT');";

    // Ảnh 8
    $query .= "INSERT INTO LOP VALUES('7620115H', 'Kinh tế nông nghiệp - Hòa An', 'HG');";
    $query .= "INSERT INTO LOP VALUES('7850102', 'Kinh tế tài nguyên thiên nhiên', 'MT');";
    $query .= "INSERT INTO LOP VALUES('7340201', 'Tài chính - Ngân hàng', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7340301', 'Kế toán', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7340302', 'Kiểm toán', 'KT');";
    $query .= "INSERT INTO LOP VALUES('7810103', 'Quản trị dịch vụ du lịch và lữ hành', 'KT');";

    // Ảnh 9
    $query .= "INSERT INTO LOP VALUES('7320104', 'Truyền thông đa phương tiện', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480101', 'Khoa học máy tính', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480102', 'Mạng máy tính và truyền thông dữ liệu', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480103', 'Kỹ thuật phần mềm', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480104', 'Hệ thống thông tin', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480107', 'Trí tuệ nhân tạo', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480201', 'Công nghệ thông tin', 'DI');";
    $query .= "INSERT INTO LOP VALUES('7480201H', 'Công nghệ thông tin - Hòa An', 'HG');";
    $query .= "INSERT INTO LOP VALUES('7480202', 'An toàn thông tin', 'DI');";

    $query .= "INSERT INTO LOP VALUES('7510401', 'Công nghệ kỹ thuật hóa học', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7540101', 'Công nghệ thực phẩm', 'DA');";
    $query .= "INSERT INTO LOP VALUES('7540104', 'Công nghệ sau thu hoạch', 'DA');";
    $query .= "INSERT INTO LOP VALUES('7540105', 'Công nghệ chế biến thủy sản', 'TS');";
    $query .= "INSERT INTO LOP VALUES('7520309', 'Kỹ thuật vật liệu', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7510601', 'Quản lý công nghiệp', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7510605', 'Logistics và Quản lý chuỗi cung ứng', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7520114', 'Kỹ thuật cơ điện tử', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7520130', 'Kỹ thuật ô tô', 'TN');";

    $query .= "INSERT INTO LOP VALUES('7520201', 'Kỹ thuật điện', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7520212', 'Kỹ thuật y sinh', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7480106', 'Kỹ thuật máy tính', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7520207', 'Kỹ thuật điện tử-viễn thông', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7520216', 'Kỹ thuật điều khiển và tự động hóa', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7580105', 'Quy hoạch vùng đô thị', 'MT');";

    $query .= "INSERT INTO LOP VALUES('7580101', 'Kiến trúc', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7580201', 'Kỹ thuật xây dựng', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7580202', 'Kỹ thuật xây dựng công trình thủy', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7580205', 'Kỹ thuật XD công trình giao thông', 'TN');";
    $query .= "INSERT INTO LOP VALUES('7580213', 'Kỹ thuật cấp thoát nước', 'MT');";
    $query .= "INSERT INTO LOP VALUES('7620103', 'Khoa học đất', 'MT');";

    $query .= "INSERT INTO LOP VALUES('7620105', 'Chăn nuôi', 'NN');";
    $query .= "INSERT INTO LOP VALUES('7620109', 'Nông học', 'NN');";
    $query .= "INSERT INTO LOP VALUES('7620112', 'Bảo vệ thực vật', 'NN');";
    $query .= "INSERT INTO LOP VALUES('7620110', 'Khoa học cây trồng', 'NN');";
    $query .= "INSERT INTO LOP VALUES('7640101', 'Thú y', 'NN');";
    $query .= "INSERT INTO LOP VALUES('7620113', 'Công nghệ hoa quả và cảnh quan', 'NN');";

    $query .= "INSERT INTO LOP VALUES('7620301', 'Nuôi trồng thủy sản', 'TS');";
    $query .= "INSERT INTO LOP VALUES('7620302', 'Bênh học thủy sản', 'TS');";
    $query .= "INSERT INTO LOP VALUES('7620305', 'Quản lý thủy sản', 'TS');";
    $query .= "INSERT INTO LOP VALUES('7440301', 'Khoa học môi trường', 'MT');";
    $query .= "INSERT INTO LOP VALUES('7520320', 'Kỹ thuật môi trường', 'MT');";
    $query .= "INSERT INTO LOP VALUES('7850101', 'Quản lý tài nguyên và môi trường', 'MT');";
    $query .= "INSERT INTO LOP VALUES('7850103', 'Quản lý đất đai', 'MT');";

    if ($conn->multi_query($query)) {
        do {
            if ($result = $conn->store_result()) {
                $result->free();
            }
    } while ($conn->next_result());
}
} catch (mysqli_sql_exception) {
    // echo $conn->error;
}
