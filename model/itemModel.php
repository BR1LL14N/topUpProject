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
                // Jika berhasil, kembalikan response sukses
                return [
                    'success' => true,
                    'insert_id' => mysqli_insert_id($this->conn) // Mengembalikan ID item yang baru saja dimasukkan
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
    
    

    // Menampilkan data item berdasarkan game_id
    public function displayItem($gameID = null) {
        $query = "
            SELECT 
                item.item_id, 
                item.item_name, 
                item.item_description, 
                item.item_icon, 
                item.item_price, 
                game.game_id, 
                game.game_name 
            FROM item
            INNER JOIN game ON item.game_id = game.game_id";

        // Jika gameID diberikan, tambahkan kondisi WHERE
        if ($gameID !== null) {
            $query .= " WHERE item.game_id = '" . mysqli_real_escape_string($this->conn, $gameID) . "'";
        }

        $result = mysqli_query($this->conn, $query);
        return $result; // Mengembalikan resource hasil query
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
