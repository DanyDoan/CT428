<?php    
    $query = "CREATE TABLE CANBO(
              MSCB varchar(50) PRIMARY KEY,
              hoTen varchar(50),
              matKhau varchar(255),
              ngaySinh date,
              gioiTinh varchar(5),
              maLop varchar(50),
              diaChi varchar(255),
              chucVu varchar(50),
              soDienThoai varchar(50),
              email varchar(50),
              isAdmin boolean DEFAULT false,
              FOREIGN KEY (maLop) REFERENCES lop(maLop));";
    try{
        $conn->query($query);
        // echo "Table adminList created<br>";
    }catch(mysqli_sql_exception){
        // echo $conn->error."<br>";
    }
    try{
        $hashedPassword = password_hash("superadmin", PASSWORD_DEFAULT);
        $query = "INSERT INTO CANBO(MSCB, hoTen, matKhau, isAdmin) VALUES('0', 'admin', '$hashedPassword', true)";
        $conn->query($query);
        // echo "Thêm thành công<br>";
    }catch(mysqli_sql_exception){
        // echo $conn->error."<br>";
    }
?>