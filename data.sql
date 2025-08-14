
-- Tạo cơ sở dữ liệu
CREATE DATABASE PROJECT;

-- Chỉ định sử dụng cơ sở dữ liệu PROJECT
USE PROJECT;

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

-- Tạo bảng KHOATRUONG
CREATE TABLE KHOATRUONG(
            maKhoaTruong varchar(5) PRIMARY KEY,
            tenKhoaTruong varchar(50)
            );

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

-- Tạo bảng LOP
CREATE TABLE LOP(
            maLop varchar(50) PRIMARY KEY,
            tenLop varchar(255),
            maKhoaTruong varchar(50),
            FOREIGN KEY (maKhoaTruong) REFERENCES khoatruong(maKhoaTruong));
    
-- Tạo bảng LOG
CREATE TABLE LOG(
                id int PRIMARY KEY AUTO_INCREMENT,
                thoiGian TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
                MSCB varchar(50) NOT NULL,
                moTa varchar(255) NOT NULL,
                MSSV varchar(50) NOT NULL);
                

-- Dữ liệu sinh viên
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
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200038", "Lê Hoàng Hôn", "Nam", "7220201", "K49");







-- DỮ liệu cán bộ giảng viên
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









