# CT428 - Website Quản Lý Sinh Viên

## Tổng quan
    Website Quản Lý Sinh Viên là ứng dụng web hỗ trợ nhà trường, cán bộ và giảng viên quản lý
thông tin sinh viên một cách thuận tiện, nhanh chóng và chính xác.  
    Hệ thống cho phép lưu trữ hồ sơ, quản lý lớp học, tìm kiếm và thống kê dữ liệu, đồng thời cung
cấp giao diện thân thiện giúp người dùng dễ dàng thao tác.

## Các chức năng chính
- **Kiểm soát truy cập**
  + **Đăng ký/Đăng nhập**: Quản lý phiên, cho phép người dùng được phân quyền truy cập vào hệ thống. Hệ thống hướng đến hai đối tượng chính: người dùng là cán bộ giảng viên và người dùng quản lý hệ thông với mã số cán bộ đặc biệt (000000).
  
- **Thao tác với dữ liệu sinh viên và cán bộ giảng viên(CRUD)**
  + **Create**: Thêm sinh viên, cán bộ giảng viên mới vào cơ sở dữ liệu.
  + **Read**: Xem và truy xuất thông tin sinh viên, cán bộ giảng viên.
  + **Update**: Cập nhật thông tin sinh viên, cán bộ giảng viên.
  + **Delete**: Xóa sinh viên khỏi cơ sở dữ liệu.

- **Bổ sung thông tin**
  + Cho phép bổ sung các thông tin tùy chọn sinh viên, cán bộ giảng viên.

- **Tìm kiếm & thống kê**
  + Tìm kiếm sinh viên theo mã sinh viên, tên, mã khoa/trường, tên lớp, giới tính, khóa học
  + Tìm kiếm sinh viên theo lớp của cán bộ cố vấn 
  + Thống kê cán bộ giảng viên của từng khoa/trường

- **Theo dõi và giám sát hoạt động của cán bộ giảng viên**
  + Ghi nhận những thao tác trên dữ liệu của sinh viên được thực hiện bởi cán bộ giảng viên

## Chức năng phụ
 - **Hộp thư đến**: Liên kết đến trang gmail.com
 - **Lịch công tác**: Liên kết đến trang lịch công tác của cit.ctu.edu.vn

## Công nghệ sử dụng
 - **Frontend**: HTML, CSS (Kết hợp Bootstrap), Javascript
 - **Backend**: PHP
 - **Cơ sở dữ liệu**: MySQL
 - **Kỹ thuật**: AJAX

## Yêu cầu hệ thống
 - **Web server**: XAMPP (Apache + PHP)
 - **CSDL**: MySQL
 - **Trình duyệt**: Chrome, Firefox hoặc Edge mới
nhất

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
────────────────────────────────────────
📁 project
├── 📁 assets/
│   ├── 📁 css/
│   ├── 📁 images/
│   └── 📁 js/
├── 📁 config/
├── 📁 controllers/
├── 📁 migrations/
├── 📁 models/
├── 📁 shared/
└── 📁 views/
────────────────────────────────────────

## Tài khoản quản trị (mặc định)
 - MSCB: 000000
 - Mật khẩu: superadmin