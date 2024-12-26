<?php

class paymentMethodModel{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addPaymentToDb($paymentName,$paymentIcon){
        try{
            $query = "
                INSERT INTO payment (payment_name, payment_icon)
                VALUES (
                    '" . mysqli_real_escape_string($this->conn, $paymentName) . "',
                    '" . mysqli_real_escape_string($this->conn, $paymentIcon) . "'
                )";

            if (mysqli_query($this->conn, $query)) {
                return [
                    'success' => true,
                    'insert_id' => mysqli_insert_id($this->conn)
                ];
            } else {
                throw new Exception("Query Error: " . mysqli_error($this->conn));
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }

    }

    public function displayPayment(){
        $query = "SELECT * FROM payment";
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

    public function updatePayment($paymentId, $paymentName, $paymentIcon) {
        try {
            $query = "
                UPDATE payment 
                SET 
                    payment_name = '" . mysqli_real_escape_string($this->conn, $paymentName) . "',
                    payment_icon = '" . mysqli_real_escape_string($this->conn, $paymentIcon) . "'
                WHERE payment_id = " . mysqli_real_escape_string($this->conn, $paymentId);

            if (mysqli_query($this->conn, $query)) {
                return [
                    'success' => true
                ];
            } else {
                throw new Exception("Query Error: " . mysqli_error($this->conn));
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public function deletePayment($paymentId) {
        try {
            $query = "
                DELETE FROM payment
                WHERE payment_id = " . mysqli_real_escape_string($this->conn, $paymentId);

            if (mysqli_query($this->conn, $query)) {
                return [
                    'success' => true
                ];
            } else {
                throw new Exception("Query Error: " . mysqli_error($this->conn));
            }
        } catch (Exception $e) {
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public function searchPaymentByID($paymentId){
        $query = "SELECT * FROM payment WHERE payment_id = '$paymentId'";
        $result = mysqli_query($this->conn, $query);
        if (!$result) {
            die("Error executing query: " . mysqli_error($this->conn));
        }
        $row = mysqli_fetch_assoc($result);
        return $row;
    }


}
?>