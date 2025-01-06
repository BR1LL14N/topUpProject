<?php

class transactionModel{
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function addTransactionToDb($gameID,$itemID,$userID,$quantity,$paymentMethod,$emailGame,$passGame,$idGame,$nicknameGame,$levelGame,$server,$status,$envoice) {
        try {
            // Query untuk memasukkan data
            $query = "
                INSERT INTO transactions (game_id, item_id, user_id, item_quantity, payment_method, email_game, pass_game, id_game, nickname_game, level_game, server, status, envoice) 
                VALUES (
                    '" . mysqli_real_escape_string($this->conn, $gameID) . "',
                    '" . mysqli_real_escape_string($this->conn, $itemID) . "',
                    '" . mysqli_real_escape_string($this->conn, $userID) . "',
                    '" . mysqli_real_escape_string($this->conn, $quantity) . "',
                    '" . mysqli_real_escape_string($this->conn, $paymentMethod) . "',
                    '" . mysqli_real_escape_string($this->conn, $emailGame) . "',
                    '" . mysqli_real_escape_string($this->conn, $passGame) . "',
                    '" . mysqli_real_escape_string($this->conn, $idGame) . "',
                    '" . mysqli_real_escape_string($this->conn, $nicknameGame) . "',
                    '" . mysqli_real_escape_string($this->conn, $levelGame) . "',
                    '" . mysqli_real_escape_string($this->conn, $server) . "',
                    '" . mysqli_real_escape_string($this->conn, $status) . "',
                    '" . mysqli_real_escape_string($this->conn, $envoice) . "'
                )";

            // Eksekusi query
            if (mysqli_query($this->conn, $query)) {
                // Jika berhasil, kembalikan response sukses
                return [
                    'success' => true,
                    'insert_id' => mysqli_insert_id($this->conn) // Mengembalikan ID game yang baru saja dimasukkan
                ];
            } else {
                // Jika query gagal, ambil error dari mysqli
                throw new Exception("Query Error: " . mysqli_error($this->conn));
            }
        } catch (Exception $e) {
            // Tangani exception dan kembalikan pesan error
            return [
                'success' => false,
                'error' => $e->getMessage()
            ];
        }
    }

    public function displayTransaction() {
        $query = "SELECT * FROM transactions";
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

    public function getTrancsactionByEnvoice($envoice) {
        $query = "SELECT * FROM transactions WHERE envoice = '$envoice'";
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

    public function getTransactionStructure() {
        try {
            $query = "
                SELECT 
                    t.transaksi_id,
                    t.item_quantity,
                    t.payment_method,
                    t.email_game,
                    t.pass_game,
                    t.id_game,
                    t.nickname_game,
                    t.level_game,
                    t.server,
                    t.status,
                    t.envoice,
                    t.date,
                    g.game_name,
                    i.item_name,
                    i.item_price,
                    u.username,
                    u.email
                FROM 
                    transactions AS t
                LEFT JOIN 
                    game AS g ON t.game_id = g.game_id
                LEFT JOIN 
                    item AS i ON t.item_id = i.item_id
                LEFT JOIN 
                    users AS u ON t.user_id = u.user_id
                ORDER BY 
                    t.transaksi_id DESC
            ";
    
            $result = mysqli_query($this->conn, $query);
    
            if ($result) {
                $data = [];
                while ($row = mysqli_fetch_assoc($result)) {
                    $data[] = $row; // Menyimpan data hasil query ke dalam array
                }
                return [
                    'success' => true,
                    'data' => $data
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
    

    public function getTransactionByUserID($userID) {
        $query = "SELECT * FROM transactions WHERE user_id = '$userID'";
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