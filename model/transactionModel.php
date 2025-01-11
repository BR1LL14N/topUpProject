<?php

abstract class BaseTransactionModel {
    protected $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    abstract public function addTransactionToDb($gameID, $itemID, $userID, $quantity, $paymentMethod, $emailGame, $passGame, $idGame, $nicknameGame, $levelGame, $server, $status, $envoice);
    abstract public function displayTransaction();
    abstract public function getTransactionByEnvoice($envoice);
    abstract public function getTransactionStructure();
    abstract public function getTransactionByUserID($userID);
    abstract public function updateTransactionStatus($status, $transactionID);
}

class TransactionModel extends BaseTransactionModel {

    public function addTransactionToDb($gameID, $itemID, $userID, $quantity, $paymentMethod, $emailGame, $passGame, $idGame, $nicknameGame, $levelGame, $server, $status, $envoice) {
        try {
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

    public function getTransactionByEnvoice($envoice) {
        $query = "SELECT * FROM transactions WHERE envoice = '" . mysqli_real_escape_string($this->conn, $envoice) . "'";
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
                    g.game_icon,
                    i.item_name,
                    i.item_price,
                    u.username,
                    u.email,
                    u.user_id
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
                    $data[] = $row;
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
        $result = $this->getTransactionStructure();
        $data = $result['data'];
        $transactions = [];
        foreach ($data as $transaction) {
            if ($transaction['user_id'] == $userID) {
                $transactions[] = $transaction;
            }
        }
        return $transactions;
    }

    public function updateTransactionStatus($status, $transactionID) {
        try {
            $query = "UPDATE transactions SET status = '" . mysqli_real_escape_string($this->conn, $status) . "' WHERE transaksi_id = $transactionID";
            if (mysqli_query($this->conn, $query)) {
                return ['success' => true];
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
}
?>
