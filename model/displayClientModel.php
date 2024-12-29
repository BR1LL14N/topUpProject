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

    public function displayItemClient($gameID = null) {
        $itemModel = new itemModel($this->conn);
        $result = $itemModel->displayItem($gameID);
        return $result;
    }

    public function displayPayment() {
        $paymentModel = new paymentMethodModel($this->conn);
        $result = $paymentModel->displayPayment();
        return $result;
    }
}
?>