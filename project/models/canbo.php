<?php

class canbo
{
    private $MSCB;
    private $email;
    private $matKhau;
    private $hoTen;
    private $ngaySinh;
    private $gioiTinh;
    private $tenLop;
    private $noiCongTac;

    public function __construct($conn, $id)
    {
        $sql = "SELECT *
                FROM user
                WHERE MSCB = '$id'";

        $result = $conn->querry($sql);
        $row = $result->fetch_assoc();

        $this->MSCB = $id;
        $this->email = $row["email"];
        $this->matKhau = $row["matKhau"];
        $this->hoTen = $row["hoTen"];
        $this->ngaySinh = $row["ngaySinh"];
        $this->gioiTinh = $row["gioiTinh"];
        $this->tenLop = $row["maLopCoVan"];
        $this->noiCongTac = $row["noiCongTac"];
    }


    public function sua($conn, $field, $newValue)
    {
        $stm = $conn->prepare("UPDATE CANBO
                               SET $field = '$newValue'
                               WHERE MSCB = '$this->MSCB'");
        $typeExchange = array(
            "integer" => "i",
            "string" => "s"
        );
        $stm->bind_param("$typeExchange[$field]", $newValue);
        if ($stm->execute())
            echo "<script>
                    alert('$field updated to $newValue')
                  </script>";
        else
            echo $stm->error;
    }

    public function lay($field)
    {
        return $this->$field;
    }
}
