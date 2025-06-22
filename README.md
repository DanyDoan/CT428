# CT428
# Kế hoạch dự án (dự kiến)

# I/ Chuẩn bị

# 1/ Thiết kế cơ sở dữ liệu (Làm chung)
#   - Xác định các bảng cần thiết
#   - Xác định kiểu dữ liệu, khóa, ràng buộc dữ liệu
#   - Tạo bảng
# 2/ Xây dựng câu trúc thư mục
# 3/ Xác định giao diện chung
#   - Chọn mẫu giao diện đơn giản
#   - Thống nhất template
#   - Quy ước style chung: màu sắc, font, bố cục

# II/ Tiến hành

# 4/ Xây dựng giao diện đăng ký (Tạo tài khoản quản trị)
#   Yêu cầu: 
#           - Sử dụng phương thức POST
#           - Mỗi username (MSSV) là duy nhất
#           - Ràng buộc và băm mật khẩu trước khi đưa lên database
#           - Giao diện đơn giản 
# 5/ Xây dựng giao diện đăng nhập
#   Yêu cầu:
#           - Sử dụng phương thức POST
#           - Nhận input của hai trường: username và password
#           - Dùng $_SESSION để lưu trạng thái đăng nhập
#           - Thông báo đăng nhập sai hoặc không tồn tại
#           - Giao diện đơn giản
# 6/ Xây dựng SideBar, Header và Footer
#   Yêu cầu:
#           - Sử dụng hàm require hoặc include để nhúng vào các trang => Dễ chỉnh sửa, đồng bộ hóa
# 7/ Xây dựng giao diện quản lý (Trang chủ)
#   Yêu cầu:
#           - Đọc và hiển thị danh sách sinh viên dạng bảng từ cơ sở dữ liệu
#           - Mỗi dòng dữ liệu có chức năng "Sửa", "Xóa", "Thêm mới"
#           - Có chức năng tìm kiếm sinh viên theo tên hoặc MSSV
# 8/ Xây dựng giao diện thêm sinh viên
#   Yêu cầu:
#           - Sử dụng phương thức POST
#           - Kiểm tra các ràng buộc về khóa chính, bảo mật trước khi đưa lên cơ sở dữ liệu
#           - Sau khi hoàn thành, thực hiện chuyển về trang chủ
# 9/ Xây dựng giao diện Sửa thông tin sinh viên
#   Yêu cầu:
#           - Tương tự giao diện thêm sinh viên
#           - Thông tin sinh viên sẽ được hiện sẵn 
#           - Có thể disable trường ma_sv
#           - Kiểm tra và cập nhật lên cơ sở dữ liệu
# 10/ Chức năng xóa sinh viên
# 11/ Chức năng tìm kiếm theo tên hoặc MSSV


