USE PROJECT;

-- Dữ liệu sinh viên
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2000000","Võ Hoàng Linh", "Nữ", "7140201", "K45");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2100001","Trần Anh Tuấn", "Nam", "7480101", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2000002","Nguyễn Đinh Vũ", "Nam", "7580202", "K46");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2100003","Lý Thái Anh", "Nam", "7620110", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2307024","Lê Thị Tú Trinh", "Nữ", "7810101", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2400005","Trần Lê Anh Hùng", "Nam", "7850102", "K50");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2300206","Đặng Anh Thư", "Nữ", "7340201", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200007","Đỗ Gia Huy", "Nam", "7640101", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200008","Lê Hoàng Khải", "Nam", "7510401", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200009","Nguyễn Hoàng Thanh", "Nam", "7140210", "K48");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200010","Đoàn Công Chánh", "Nam", "7480103", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200011","Trần Quang Vũ", "Nam", "7480103", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200012","Mai Vũ Anh", "Nam", "7480103", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200013","Mai Vũ Anh", "Nam", "7480101", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200014","Ngô Hồng Hạnh", "Nữ", "7480101", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200015","Nguyễn Kim Trinh", "Nữ", "7480101", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200016","Lê Thị Cẩm Hồng", "Nữ", "7480101", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200017","Trần Đình Trọng", "Nam", "7480101", "K47");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200018","Trần Đình Trọng", "Nam", "7480201", "K50");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2100019","Phạm Kinh Oanh", "Nam", "7480202", "K48");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2000020","Ngô Gia Phát", "Nam", "7480202", "K48");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2400021","Phạm Thị Trúc Linh", "Nữ", "7480104", "K50");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200022","Lê Huỳnh Thái Oanh", "Nữ", "7480104", "K48");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200023","Đoàn Trung Dân", "Nam", "7480104", "K49");
INSERT INTO SINHVIEN(MSSV, hoTen, gioiTinh, maLop, khoa) VALUES ("B2200026","Võ Thái Hoàng Nam", "Nam", "7480103", "K49");

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









