-- Khởi tạo
-- Tạo cơ sở dữ liệu
CREATE DATABASE PROJECT;

-- Chỉ định sử dụng cơ sở dữ liệu PROJECT
USE PROJECT;

-- Tạo bảng KHOATRUONG
CREATE TABLE KHOATRUONG(
            maKhoaTruong varchar(5) PRIMARY KEY,
            tenKhoaTruong varchar(50)
            );

-- Tạo bảng LOG
CREATE TABLE LOG(
                id int PRIMARY KEY AUTO_INCREMENT,
                thoiGian TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                MSCB varchar(50) NOT NULL,
                moTa varchar(255) NOT NULL,
                MSSV varchar(50) NOT NULL);

-- Tạo bảng LOP
CREATE TABLE LOP(
            maLop varchar(50) PRIMARY KEY,
            tenLop varchar(255),
            maKhoaTruong varchar(50),
            FOREIGN KEY (maKhoaTruong) REFERENCES khoatruong(maKhoaTruong));

-- Tạo bảng CANBO
CREATE TABLE CANBO(
            MSCB varchar(50) PRIMARY KEY,
            hoTen varchar(50),
            matKhau varchar(255),
            ngaySinh date,
            gioiTinh varchar(5),
            noiCongTac varchar(50),
            maLop varchar(50),
            diaChi varchar(255),
            chucVu varchar(50),
            soDienThoai varchar(50),
            email varchar(50),
            isAdmin boolean DEFAULT false,
            FOREIGN KEY (maLop) REFERENCES lop(maLop));



-- Tạo bảng SINHVIEN
CREATE TABLE SINHVIEN(
            MSSV varchar(50) PRIMARY KEY,
            hoTen varchar(50) NOT NULL,
            ngaySinh date NOT NULL,
            gioiTinh varchar(5) NOT NULL,
            maLop varchar(50) NOT NULL,
            khoa varchar(5) NOT NULL,
            diaChi varchar(50),
            soDienThoai varchar(50) UNIQUE,
            email varchar(50) UNIQUE,
            FOREIGN KEY (maLop) REFERENCES lop(maLop));

-- Thêm Dữ liệu

-- Tạo dữ liệu cho bảng KHOATRUONG
INSERT INTO KHOATRUONG VALUES ('DA', 'Viện CNSH & TP');
INSERT INTO KHOATRUONG VALUES ('DI', 'Trường CNTT&TT');
INSERT INTO KHOATRUONG VALUES ('FL', 'Khoa Ngoại Ngữ');
INSERT INTO KHOATRUONG VALUES ('HG', 'Khoa PTNT');
INSERT INTO KHOATRUONG VALUES ('KH', 'Khoa KHTN');
INSERT INTO KHOATRUONG VALUES ('KT', 'Trường Kinh Tế');
INSERT INTO KHOATRUONG VALUES ('KL', 'Khoa Luật');
INSERT INTO KHOATRUONG VALUES ('ML', 'Khoa Chính Trị');
INSERT INTO KHOATRUONG VALUES ('MT', 'Khoa Môi Trường');
INSERT INTO KHOATRUONG VALUES ('NN', 'Trường Nông Nghiệp');
INSERT INTO KHOATRUONG VALUES ('SP', 'Trường Sư Phạm');
INSERT INTO KHOATRUONG VALUES ('TD', 'Khoa GDTC');
INSERT INTO KHOATRUONG VALUES ('TN', 'Trường Bách Khoa');
INSERT INTO KHOATRUONG VALUES ('TS', 'Trường Thủy Sản');
INSERT INTO KHOATRUONG VALUES ('XH', 'Khoa KHXH&NV');

-- Tạo dữ liệu cho bảng LOP
-- Khoa Luật
INSERT INTO LOP VALUES('7380101', 'Luật', 'KL');
INSERT INTO LOP VALUES('7380107', 'Luật kinh tế', 'KL');
INSERT INTO LOP VALUES('7380103', 'Luật dân sự và tố tụng dân sự', 'KL');

-- Khoa Sư phạm
INSERT INTO LOP VALUES('7140201', 'Giáo dục Mầm non', 'SP');
INSERT INTO LOP VALUES('7140202', 'Giáo dục Tiểu học', 'SP');
INSERT INTO LOP VALUES('7140209', 'Sư phạm Toán học', 'SP');
INSERT INTO LOP VALUES('7140210', 'Sư phạm Tin học', 'SP');
INSERT INTO LOP VALUES('7140211', 'Sư phạm Vật lý', 'SP');
INSERT INTO LOP VALUES('7140212', 'Sư phạm Hóa học', 'SP');
INSERT INTO LOP VALUES('7140213', 'Sư phạm Sinh học', 'SP');
INSERT INTO LOP VALUES('7140217', 'Sư phạm Ngữ văn', 'SP');
INSERT INTO LOP VALUES('7140218', 'Sư phạm Lịch sử', 'SP');
INSERT INTO LOP VALUES('7140219', 'Sư phạm Địa lý', 'SP');
INSERT INTO LOP VALUES('7140247', 'Sư phạm Khoa học tự nhiên', 'SP');

-- Khoa GDTC
INSERT INTO LOP VALUES('7140206', 'Giáo dục Thể chất', 'TD');

-- Khoa Ngoại ngữ
INSERT INTO LOP VALUES('7220201', 'Ngôn ngữ Anh', 'FL');
INSERT INTO LOP VALUES('7220201H', 'Ngôn ngữ Anh - Hòa An', 'FL');
INSERT INTO LOP VALUES('7220203', 'Ngôn ngữ Pháp', 'FL');
INSERT INTO LOP VALUES('7140231', 'Sư phạm Tiếng Anh', 'FL');
INSERT INTO LOP VALUES('7140233', 'Sư phạm Tiếng Pháp', 'FL');

-- Khoa Chính trị
INSERT INTO LOP VALUES('7229001', 'Triết học', 'ML');
INSERT INTO LOP VALUES('7310201', 'Chính trị học', 'ML');
INSERT INTO LOP VALUES('7140204', 'Giáo dục Công dân', 'ML');

-- Khoa KHXH&NV
INSERT INTO LOP VALUES('7229030', 'Văn học', 'XH');
INSERT INTO LOP VALUES('7320101', 'Báo chí', 'XH');
INSERT INTO LOP VALUES('7810101', 'Du lịch', 'XH');
INSERT INTO LOP VALUES('7310403', 'Tâm lý học giáo dục', 'XH');

-- Khoa Khoa học tự nhiên
INSERT INTO LOP VALUES('7420101', 'Sinh học', 'KH');
INSERT INTO LOP VALUES('7420203', 'Sinh học ứng dụng', 'KH');
INSERT INTO LOP VALUES('7440112', 'Hóa học', 'KH');
INSERT INTO LOP VALUES('7720203', 'Hóa dược', 'KH');
INSERT INTO LOP VALUES('7460112', 'Toán ứng dụng', 'KH');
INSERT INTO LOP VALUES('7460201', 'Thống kê', 'KH');
INSERT INTO LOP VALUES('7520401', 'Vật lý kỹ thuật', 'KH');

-- Trường Kinh Tế
INSERT INTO LOP VALUES('7340101', 'Quản trị kinh doanh', 'KT');
INSERT INTO LOP VALUES('7340115', 'Marketing', 'KT');
INSERT INTO LOP VALUES('7340120', 'Kinh doanh quốc tế', 'KT');
INSERT INTO LOP VALUES('7340121', 'Kinh doanh thương mại', 'KT');
INSERT INTO LOP VALUES('7340122', 'Thương mại điện tử', 'KT');
INSERT INTO LOP VALUES('7620114H', 'Kinh doanh nông nghiệp - Hòa An', 'KT');
INSERT INTO LOP VALUES('7310101', 'Kinh tế', 'KT');
INSERT INTO LOP VALUES('7620115', 'Kinh tế nông nghiệp', 'KT');
INSERT INTO LOP VALUES('7340201', 'Tài chính - Ngân hàng', 'KT');
INSERT INTO LOP VALUES('7340301', 'Kế toán', 'KT');
INSERT INTO LOP VALUES('7340302', 'Kiểm toán', 'KT');
INSERT INTO LOP VALUES('7810103', 'Quản trị dịch vụ du lịch và lữ hành', 'KT');

-- Trường CNTT&TT
INSERT INTO LOP VALUES('7320104', 'Truyền thông đa phương tiện', 'DI');
INSERT INTO LOP VALUES('7480101', 'Khoa học máy tính', 'DI');
INSERT INTO LOP VALUES('7480102', 'Mạng máy tính và truyền thông dữ liệu', 'DI');
INSERT INTO LOP VALUES('7480103', 'Kỹ thuật phần mềm', 'DI');
INSERT INTO LOP VALUES('7480104', 'Hệ thống thông tin', 'DI');
INSERT INTO LOP VALUES('7480107', 'Trí tuệ nhân tạo', 'DI');
INSERT INTO LOP VALUES('7480201', 'Công nghệ thông tin', 'DI');
INSERT INTO LOP VALUES('7480202', 'An toàn thông tin', 'DI');

-- Khoa Phát triển nông thôn
INSERT INTO LOP VALUES('7340101H', 'Quản trị kinh doanh - Hòa An', 'HG');
INSERT INTO LOP VALUES('7620115H', 'Kinh tế nông nghiệp - Hòa An', 'HG');
INSERT INTO LOP VALUES('7480201H', 'Công nghệ thông tin - Hòa An', 'HG');


-- Viện CNSH&TP
INSERT INTO LOP VALUES('7540101', 'Công nghệ thực phẩm', 'DA');
INSERT INTO LOP VALUES('7540104', 'Công nghệ sau thu hoạch', 'DA');
INSERT INTO LOP VALUES('7420201', 'Công nghệ sinh học', 'DA');

-- Trường Thủy sản
INSERT INTO LOP VALUES('7540105', 'Công nghệ chế biến thủy sản', 'TS');

-- Trường Bách khoa
INSERT INTO LOP VALUES('7520309', 'Kỹ thuật vật liệu', 'TN');
INSERT INTO LOP VALUES('7510601', 'Quản lý công nghiệp', 'TN');
INSERT INTO LOP VALUES('7510605', 'Logistics và Quản lý chuỗi cung ứng', 'TN');
INSERT INTO LOP VALUES('7520114', 'Kỹ thuật cơ điện tử', 'TN');
INSERT INTO LOP VALUES('7520130', 'Kỹ thuật ô tô', 'TN');
INSERT INTO LOP VALUES('7520201', 'Kỹ thuật điện', 'TN');
INSERT INTO LOP VALUES('7520212', 'Kỹ thuật y sinh', 'TN');
INSERT INTO LOP VALUES('7480106', 'Kỹ thuật máy tính', 'TN');
INSERT INTO LOP VALUES('7520207', 'Kỹ thuật điện tử-viễn thông', 'TN');
INSERT INTO LOP VALUES('7520216', 'Kỹ thuật điều khiển và tự động hóa', 'TN');
INSERT INTO LOP VALUES('7580101', 'Kiến trúc', 'TN');
INSERT INTO LOP VALUES('7580201', 'Kỹ thuật xây dựng', 'TN');
INSERT INTO LOP VALUES('7580202', 'Kỹ thuật xây dựng công trình thủy', 'TN');
INSERT INTO LOP VALUES('7580205', 'Kỹ thuật XD công trình giao thông', 'TN');
INSERT INTO LOP VALUES('7510401', 'Công nghệ kỹ thuật hóa học', 'TN');

-- Khoa TNTT&MT
INSERT INTO LOP VALUES('7580105', 'Quy hoạch vùng đô thị', 'MT');
INSERT INTO LOP VALUES('7580213', 'Kỹ thuật cấp thoát nước', 'MT');
INSERT INTO LOP VALUES('7620103', 'Khoa học đất', 'MT');
INSERT INTO LOP VALUES('7440301', 'Khoa học môi trường', 'MT');
INSERT INTO LOP VALUES('7520320', 'Kỹ thuật môi trường', 'MT');
INSERT INTO LOP VALUES('7850101', 'Quản lý tài nguyên và môi trường', 'MT');
INSERT INTO LOP VALUES('7850103', 'Quản lý đất đai', 'MT');
INSERT INTO LOP VALUES('7850102', 'Kinh tế tài nguyên thiên nhiên', 'MT');

-- Trường Nông nghiệp
INSERT INTO LOP VALUES('7620105', 'Chăn nuôi', 'NN');
INSERT INTO LOP VALUES('7620109', 'Nông học', 'NN');
INSERT INTO LOP VALUES('7620112', 'Bảo vệ thực vật', 'NN');
INSERT INTO LOP VALUES('7620110', 'Khoa học cây trồng', 'NN');
INSERT INTO LOP VALUES('7640101', 'Thú y', 'NN');
INSERT INTO LOP VALUES('7620113', 'Công nghệ hoa quả và cảnh quan', 'NN');

-- Trường Thủy sản
INSERT INTO LOP VALUES('7620301', 'Nuôi trồng thủy sản', 'TS');
INSERT INTO LOP VALUES('7620302', 'Bênh học thủy sản', 'TS');
INSERT INTO LOP VALUES('7620305', 'Quản lý thủy sản', 'TS');


-- Tạo dữ liệu cho bảng SINHVIEN
-- Khối Khoa học máy tính
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2000000","Võ Hoàng Linh", "Nữ", "7480101", "K45");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2100001","Trần Anh Tuấn", "Nam", "7480101", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2000002","Nguyễn Đinh Vũ", "Nam", "7480101", "K46");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2100003","Lý Thái Anh", "Nam", "7480101", "K47");

-- Khối Kỹ thuật phần mềm
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2400005","Trần Lê Anh Hùng", "Nam", "7480103", "K50");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2300206","Đặng Anh Thư", "Nữ", "7480103", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200007","Đỗ Gia Huy", "Nam", "7480103", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200008","Lê Hoàng Khải", "Nam", "7480103", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200009","Nguyễn Hoàng Thanh", "Nam", "7480103", "K48");

-- Khối An toàn thông tin
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200010","Đoàn Công Chánh", "Nam", "7480202", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200011","Trần Quang Vũ", "Nam", "7480202", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200012","Mai Vũ Anh", "Nam", "7480202", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200013","Mai Vũ Anh", "Nam", "7480202", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200014","Ngô Hồng Hạnh", "Nữ", "7480202", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200015","Nguyễn Kim Trinh", "Nữ", "7480202", "K49");

-- Khối Mạng máy tính và truyền thông dữ liệu
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200016","Lê Thị Cẩm Hồng", "Nữ", "7480102", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200017","Trần Đình Trọng", "Nam", "7480102", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200018","Trần Đình Trọng", "Nam", "7480102", "K50");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2100019","Phạm Kinh Oanh", "Nam", "7480102", "K48");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2000020","Ngô Gia Phát", "Nam", "7480102", "K48");

-- Khối Hệ thống thông tin
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2400021","Phạm Thị Trúc Linh", "Nữ", "7480104", "K50");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200022","Lê Huỳnh Thái Oanh", "Nữ", "7480104", "K48");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200023","Đoàn Trung Dân", "Nam", "7480104", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200024","Võ Thái Hoàng Nam", "Nam", "7480104", "K49");

-- Khối Công nghệ thông tin
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200025", "Võ Thái Hoàng Nữ", "Nữ", "7480201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200026", "Cao Quốc Huy", "Nam", "7480201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200027", "Nguyễn Hoàng Long", "Nam", "7480201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200028", "Nguyễn Hồng Anh", "Nữ", "7480201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200029", "Nguyễn Hoàng Long", "Nam", "7480201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200030", "Lê Mai Anh", "Nữ", "7480201", "K49");

-- Khối Luật Kinh Tế
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200031", "Lý Thị Tú Như", "Nữ", "7380107", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200032", "Nguyễn Vân Anh", "Nam", "7380107", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200033", "Trần Lê Như Ý", "Nữ", "7380107", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200034", "Mạnh Dũng", "Nữ", "7380107", "K49");

-- Khối Kỹ thuật ô tô
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200035", "Lê Thanh Tùng", "Nam", "7380107", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200036", "Nguyễn Minh Lợi", "Nam", "7380107", "K49");

-- Khối Ngoại ngữ
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200037", "Nguyễn Thị Thùy Dương", "Nữ", "7220201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200038", "Chung Tấn Nghị", "Nam", "7220201", "K49");

-- Khối Sư phạm
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200039", "Nguyễn Thị Ngân", "Nữ", "7220201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200040", "Lê Hoàng Hôn", "Nam", "7220201", "K49");


-- Dữ liệu cán bộ giảng viên
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000001', 'Đinh Tú Vân', 'password', 'Nữ', 'FL', '7220201', 'Tiến sĩ', 'tuvan@ctu.edu.vn','0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000002', 'Nguyễn Đình Toàn', 'password', 'Nam', 'FL', '7140231', 'Tiến sĩ', 'dinhtoan@ctu.edu.vn','0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000003', 'Cao Minh Tú', 'password', 'Nữ', 'KT', '7340120', 'Thạc sĩ', 'minhtu@ctu.edu.vn','0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000004', 'Trần Trung Hưng', 'password', 'Nam', 'TN', '7510605', 'Thạc sĩ', 'trunghung@ctu.edu.vn', '0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000005', 'Hoàng Lan Oanh', 'password', 'Nữ', 'DI', '7480202', 'Tiến sĩ', 'lanoanh@ctu.edu.vn', '0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000006', 'Nguyễn Thị Bé Ba', 'password', 'Nữ', 'DI', '7480102', 'Thạc sĩ', 'beba@ctu.edu.vn', '0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000007', 'Quách Ngọc Châu', 'password', 'Nữ', 'DI', '7480104', 'Tiến sĩ', 'minhchau@ctu.du.vn', '0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000008', 'Võ Thị Bảo Ngọc', 'password', 'Nữ', 'DI', '7480201', 'Tiến sĩ', 'baongoc@ctu.edu.vn', '0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000009', 'Nguyễn Huy Hoàng', 'password', 'Nam', 'DI', '7480201', 'Giáo sư', 'huyhoang@ctu.edu.vn', '0');
INSERT INTO CANBO(MSCB, hoTen, matKhau, gioiTinh, noiCongTac, maLop, chucVu, email, isAdmin) VALUES('000010', 'Mathew Andeson', 'password', 'Nam', 'DA', '7420201', 'Phó giáo sư', 'mathew@ctu.edu.vn', '0');









