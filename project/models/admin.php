<?php
class admin
{
    private $userID;
    private $userEmail;
    private $userName;
    private $userPassword;

    public function __construct($conn, $id)
    {
        $sql = "SELECT *
                    FROM user
                    WHERE userID = '$id'";
        $result = $conn->querry($sql);

        $row = $result->fetch_assoc();
        $this->userID = $id;
        $this->userEmail = $row["userEmail"];
        $this->userName = $row["userName"];
        $this->userPassword = $row["userPassword"];
    }


    public function update($conn, $field, $newValue)
    {
        $stm = $conn->prepare("UPDATE admin
                                       SET $field = '$newValue'
                                       WHERE userID = '$this->userID'");
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
    public function get($field)
    {
        return $this->$field;
    }
}
