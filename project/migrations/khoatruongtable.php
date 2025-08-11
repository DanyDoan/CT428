 <?php
    $query = "CREATE TABLE KHOATRUONG(
                maKhoaTruong varchar(5) PRIMARY KEY,
                tenKhoaTruong varchar(50)
            );";
    try{
        $conn->query($query);
    }catch(mysqli_sql_exception){
    //    echo $conn->error."<br>";
    }

    try {
        $query = "";
        $query .= "USE PROJECT;";
        $query .= "INSERT INTO TRUONG VALUES ('DA', 'Viện CNSH & TP');";        
        $query .= "INSERT INTO TRUONG VALUES ('DI', 'Trường CNTT&TT');";
        $query .= "INSERT INTO TRUONG VALUES ('FL', 'Khoa Ngoại Ngữ');";
        $query .= "INSERT INTO TRUONG VALUES ('HG', 'Khoa PTNT');";
        $query .= "INSERT INTO TRUONG VALUES ('KH', 'Khoa KHTN');";
        $query .= "INSERT INTO TRUONG VALUES ('KT', 'Trường Kinh Tế');";
        $query .= "INSERT INTO TRUONG VALUES ('LK', 'Khoa Luật');";
        $query .= "INSERT INTO TRUONG VALUES ('ML', 'Khoa Chính Trị');";
        $query .= "INSERT INTO TRUONG VALUES ('MT', 'Khoa Môi Trường');";
        $query .= "INSERT INTO TRUONG VALUES ('NN', 'Trường Nông Nghiệp');";
        $query .= "INSERT INTO TRUONG VALUES ('SP', 'Trường Sư Phạm');";
        $query .= "INSERT INTO TRUONG VALUES ('TD', 'Khoa GDTC');";
        $query .= "INSERT INTO TRUONG VALUES ('TN', 'Trường Bách Khoa');";
        $query .= "INSERT INTO TRUONG VALUES ('TS', 'Trường Thủy Sản');";
        $query .= "INSERT INTO TRUONG VALUES ('XH', 'Khoa KHXH&NV');";

        if ($conn->multi_query($query)) {
            do {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
        } while ($conn->next_result());
    }
    } catch (mysqli_sql_exception $e) {
        // echo $e->getMessage();
    }

?>
