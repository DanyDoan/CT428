# 📚 CT428 - Website Quản Lý Sinh Viên

## 📌 Giới thiệu
Website Quản Lý Sinh Viên là ứng dụng web hỗ trợ nhà trường, cán bộ và giảng viên quản lý thông tin sinh viên một cách **thuận tiện, nhanh chóng và chính xác**.  

Hệ thống cho phép:  
- Lưu trữ hồ sơ sinh viên và cán bộ giảng viên.  
- Quản lý lớp học, tìm kiếm và thống kê dữ liệu.  
- Giao diện thân thiện, dễ thao tác.  

---

## ⚙️ Chức năng chính

### 1. Kiểm soát truy cập
- **Đăng ký / Đăng nhập**: Quản lý phiên đăng nhập và phân quyền người dùng.  
- Hệ thống có 2 loại tài khoản:  
  - **Cán bộ giảng viên**  
  - **Quản trị hệ thống** (MSCB = `000000`)  

### 2. Quản lý dữ liệu sinh viên & cán bộ giảng viên (CRUD)
- **Create**: Thêm mới  
- **Read**: Xem và truy xuất thông tin  
- **Update**: Cập nhật thông tin  
- **Delete**: Xóa sinh viên khỏi hệ thống  

### 3. Bổ sung thông tin
- Cho phép thêm thông tin tùy chọn cho sinh viên và cán bộ giảng viên  

### 4. Tìm kiếm & thống kê
- Tìm kiếm sinh viên theo: mã SV, tên, khoa/trường, lớp, giới tính, khóa học  
- Tìm sinh viên theo lớp của cán bộ cố vấn  
- Thống kê cán bộ giảng viên theo từng khoa/trường  

### 5. Theo dõi hoạt động
- Ghi nhận các thao tác trên dữ liệu sinh viên được thực hiện bởi cán bộ giảng viên  

---

## 🛠️ Chức năng phụ
- **Hộp thư đến**: Liên kết đến [Gmail](https://mail.google.com)  
- **Lịch công tác**: Liên kết đến trang lịch của [CIT - CTU](https://cit.ctu.edu.vn)  

---

## 🧰 Công nghệ sử dụng
- **Frontend**: HTML, CSS (Bootstrap), JavaScript  
- **Backend**: PHP  
- **Cơ sở dữ liệu**: MySQL  
- **Kỹ thuật**: AJAX  

---

## 💻 Yêu cầu hệ thống
- **Web Server**: [XAMPP](https://www.apachefriends.org/) (Apache + PHP) - Ứng dụng tích hợp đa thành phần dùng để tạo, kiểm thử, phát triển ứng dụng web
- **CSDL**: MySQL  
- **Trình duyệt**: Chrome, Firefox hoặc Edge (phiên bản mới nhất)  

---

## Hướng dẫn cài đặt
 - **Clone dự án**
    git clone https://github.com/
 - **Import file dữ liệu đính kèm**
 - **Mở file config/db.php và thiết lập kết nối**
 - **Chạy website**
    + Di chuyển toàn bộ dự án vào thư mục htdocs của XAMPP
    + Khởi động Apache và MySQL
    + Mở trình duyệt và truy cập
        http://localhost/CT428/project/views

## Cấu trúc thư mục
──────────────────
**project/**
**├── assets/**
**│   ├── css/**
**│   ├── images/**
**│   └── js/**
**├── config/**
**├── controllers/**
**├── migrations/**
**├── models/**
**├── shared/**
**└── views/**
──────────────────

## Tài khoản quản trị (mặc định)
 - MSCB: 000000
 - Mật khẩu: superadmin