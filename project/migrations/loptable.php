 <?php

    $query = "CREATE TABLE LOP(
                maLop varchar(10) PRIMARY KEY,
                tenLop varchar(50)
            );";
    try{
        $conn->query($query);
        echo "Table LOP created<br>";
    }catch(mysqli_sql_exception){
        // echo "LOP is already created<br>";
    }
?>