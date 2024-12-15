<?php

class displayClientModel{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function displayClient(){
        $query = "SELECT * FROM game";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die("Error executing query: " . mysqli_error($this->conn));
        }
        $rows = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $rows[] = $row;
        }
        return $rows;
    }
}
?>