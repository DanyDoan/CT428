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
        $query .= "INSERT INTO KHOATRUONG VALUES ('DA', 'Viện CNSH & TP');";        
        $query .= "INSERT INTO KHOATRUONG VALUES ('DI', 'Trường CNTT&TT');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('FL', 'Khoa Ngoại Ngữ');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('HG', 'Khoa PTNT');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('KH', 'Khoa KHTN');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('KT', 'Trường Kinh Tế');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('KL', 'Khoa Luật');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('ML', 'Khoa Chính Trị');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('MT', 'Khoa Môi Trường');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('NN', 'Trường Nông Nghiệp');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('SP', 'Trường Sư Phạm');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('TD', 'Khoa GDTC');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('TN', 'Trường Bách Khoa');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('TS', 'Trường Thủy Sản');";
        $query .= "INSERT INTO KHOATRUONG VALUES ('XH', 'Khoa KHXH&NV');";

        if ($conn->multi_query($query)) {
            do {
                if ($result = $conn->store_result()) {
                    $result->free();
                }
        } while ($conn->next_result());
    }
    } catch (mysqli_sql_exception) {
        // echo $conn->error."<br><br>";
    }

?>
