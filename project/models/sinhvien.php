<?php
    class SINHVIEN{
        private $MSSV;
        private $hoTen;
        private $ngaySinh;
        private $gioiTinh;
        private $tenLop;
        private $tenKhoaTruong;
        private $khoa; //Khóa

        function __construct($conn, $mssv)
        {
            $query = "SELECT * 
                      FROM SINHVIEN JOIN LOP
                      ON SINHVIEN.maLop = LOP.maLop
                      WHERE MSSV = '$mssv'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
            $this->MSSV = $row["MSSV"];
            $this->hoTen = $row["hoTen"];
            $this->ngaySinh = $row["ngaySinh"];
            $this->gioiTinh = $row["gioiTinh"];
            $this->tenLop = $row["tenLop"];
            $this->tenKhoaTruong = $row["tenKhoaTruong"];
            $this->khoa = $row["khoa"];
        }

        public function sua($conn, $field, $newValue)
        {
            $stm = $conn->prepare("UPDATE SINHVIEN
                                   SET $field = ?
                                   WHERE MSSV = '$this->MSSV'");

            $stm->bind_param("s", $newValue);
            $stm->execute();
        }

        function lay($field){
            return $this->$field;
        }
    }
?>