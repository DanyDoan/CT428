<?php
    class SINHVIEN{

        //Thông tin có sẵn
        private $MSSV;
        private $hoTen;
        private $ngaySinh;
        private $gioiTinh;
        private $diaChi;
        private $soDienThoai;
        private $email;
        private $khoa; //Khóa not Khoa!
        private $maLop;
        
        //Thông tin liên kết
        private $tenLop;
        private $maKhoaTruong;
        private $tenKhoaTruong;

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

            //Thông tin từ bảng LOP+KHOATRUONG
            $this->tenLop = $row["tenLop"];
            $this->maKhoaTruong = $row["maKhoaTruong"];
            $this->tenKhoaTruong = $row["tenKhoaTruong"];
        }


        public function sua($conn, $field, $newValue)
        {
            $stm = $conn->prepare("UPDATE SINHVIEN
                                   SET $field = ?
                                   WHERE MSSV = '$this->MSSV'");

            $stm->bind_param("s", $newValue);
            $stm->execute();
        }

        public function lay($field){
            return $this->$field;
        }

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