<?php
    class SINHVIEN{

        //Thông tin có sẵn của bảng SINHVIEN
        private $MSSV;
        private $hoTen;
        private $ngaySinh;
        private $gioiTinh;
        private $diaChi;
        private $soDienThoai;
        private $email;
        private $khoa; //Khóa not Khoa!
        private $maLop;
        
        //Thông tin liên kết với bảng LOP, KHOATRUONG, CANBO
        private $tenLop;
        private $maKhoaTruong;
        private $tenKhoaTruong;


        //Hàm xây dựng nhận [kết nối] và [MSSV] để truy xuất và gán thông tin cho sinh vien
        public function __construct($conn, $mssv)
        {
            $query = "SELECT *
                      FROM SINHVIEN a 
                      JOIN LOP b ON a.maLop = b.maLop
                      JOIN KHOATRUONG c ON b.maKhoaTruong = c.maKhoaTruong
                      WHERE MSSV = '$mssv'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();

            //Thông tin từ bảng SINHVIEN
            $this->MSSV = $row["MSSV"];
            $this->hoTen = $row["hoTen"];
            $this->ngaySinh = $row["ngaySinh"];
            $this->gioiTinh = $row["gioiTinh"];
            $this->diaChi = $row["diaChi"];
            $this->soDienThoai = $row["soDienThoai"];
            $this->email = $row["email"];
            $this->khoa = $row["khoa"];
            $this->maLop = $row["maLop"];


            //Thông tin từ bảng LOP, KHOATRUONG, CANBO
            $this->tenLop = $row["tenLop"];
            $this->maKhoaTruong = $row["maKhoaTruong"];
            $this->tenKhoaTruong = $row["tenKhoaTruong"];
        }


        //Hàm sửa thông tin sinh viên sử dụng [kết nối] [field] và [newValue] để thay đổi thông tin trường cụ thể 
        public function sua($conn, $field, $newValue)
        {
            $stm = $conn->prepare("UPDATE SINHVIEN
                                   SET $field = ?
                                   WHERE MSSV = '$this->MSSV'");

            $stm->bind_param("s", $newValue);
            $stm->execute();
        }

        //Hàm truy xuất thông tin đối tượng sinh viên dựa trên [field]
        public function lay($field){
            return $this->$field;
        }

        //Hàm trả về toàn bộ thông tin đối tượng sinh viên (dùng để gửi dữ liệu cho javascript xử lý)
        public function layThongTin(){
            return [
                "MSSV"          => $this->MSSV ?? "",
                "hoTen"         => $this->hoTen ?? "",
                "diaChi"        => $this->diaChi ?? "",
                "khoa"          => $this->khoa ?? "",
                "soDienThoai"   => $this->soDienThoai ?? "",
                "email"         => $this->email ?? "",
                "ngaySinh"      => $this->ngaySinh ?? "",
                "gioiTinh"      => $this->gioiTinh ?? "",
                "maLop"         => $this->maLop ?? "",
                "tenLop"        => $this->tenLop ?? "",
                "maKhoaTruong"  => $this->maKhoaTruong ?? "",
                "tenKhoaTruong" => $this->tenKhoaTruong ?? ""
            ];
        }
    }
?>