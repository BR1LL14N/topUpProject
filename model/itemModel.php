<?php
class itemModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambah item ke database
    public function addItemToDb($itemName, $itemDescription, $itemIcon, $gameID, $itemPrice) {
        try {
            // Query untuk memasukkan data
            $query = "
                INSERT INTO item (item_name, item_description, item_icon, game_id, item_price) 
                VALUES (
                    '" . mysqli_real_escape_string($this->conn, $itemName) . "',
                    '" . mysqli_real_escape_string($this->conn, $itemDescription) . "',
                    '" . mysqli_real_escape_string($this->conn, $itemIcon) . "',
                    '" . mysqli_real_escape_string($this->conn, $gameID) . "',
                    '" . mysqli_real_escape_string($this->conn, $itemPrice) . "'
                )";

            // Eksekusi query
            if (mysqli_query($this->conn, $query)) {
                return [
                    'success' => true,
                    'insert_id' => mysqli_insert_id($this->conn) // Mengembalikan ID item yang baru saja dimasukkan
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

    // Method untuk menampilkan semua item
    public function displayItem() {
        $query = "SELECT * FROM item";
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

    // Method untuk memperbarui data item
    public function updateItem($itemId, $itemName, $itemDescription, $itemIcon, $gameID, $itemPrice) {
        try {
            $query = "
                UPDATE item 
                SET item_name = '" . mysqli_real_escape_string($this->conn, $itemName) . "',
                    item_description = '" . mysqli_real_escape_string($this->conn, $itemDescription) . "',
                    item_icon = '" . mysqli_real_escape_string($this->conn, $itemIcon) . "',
                    game_id = '" . mysqli_real_escape_string($this->conn, $gameID) . "',
                    item_price = '" . mysqli_real_escape_string($this->conn, $itemPrice) . "'
                WHERE item_id = '" . mysqli_real_escape_string($this->conn, $itemId) . "'";

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
}
?>
