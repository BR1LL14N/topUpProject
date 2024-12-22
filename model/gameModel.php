<?php

class gameModel {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    // Method untuk menambah game ke database
    public function addGameToDb($gameName, $gameDescription, $releaseDate, $gameIcon) {
        try {
            // Query untuk memasukkan data
            $query = "
                INSERT INTO game (game_name, game_description, release_date, game_icon) 
                VALUES (
                    '" . mysqli_real_escape_string($this->conn, $gameName) . "',
                    '" . mysqli_real_escape_string($this->conn, $gameDescription) . "',
                    '" . mysqli_real_escape_string($this->conn, $releaseDate) . "',
                    '" . mysqli_real_escape_string($this->conn, $gameIcon) . "'
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

    public function displayGame() {
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

    public function updateGame($gameId, $gameName, $gameDescription, $releaseDate, $gameIcon) {
        try {
            // Query untuk memperbarui data
            $query = "
                UPDATE game 
                SET game_name = '" . mysqli_real_escape_string($this->conn, $gameName) . "',
                    game_description = '" . mysqli_real_escape_string($this->conn, $gameDescription) . "',
                    release_date = '" . mysqli_real_escape_string($this->conn, $releaseDate) . "',
                    game_icon = '" . mysqli_real_escape_string($this->conn, $gameIcon) . "'
                WHERE game_id = '" . mysqli_real_escape_string($this->conn, $gameId) . "'";
            
            // Eksekusi query
            if (mysqli_query($this->conn, $query)) {
                // Jika berhasil, kembalikan response sukses
                return [
                    'success' => true
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

    public function searchGameByID($gameId){
        // echo "Searching for Game ID: " . $gameId;
        $query = "SELECT * FROM game WHERE game_id = '$gameId'";
        $result = mysqli_query($this->conn, $query);
    
        if (!$result) {
            die("Error executing query: " . mysqli_error($this->conn));
        }
    
        // Ambil hanya satu hasil, karena game_id seharusnya unik
        $row = mysqli_fetch_assoc($result);
        
        return $row;  // Mengembalikan satu baris data
    }

    public function deleteGame($gameId) {
        try {
            // Query untuk menghapus data
            $query = "
                DELETE FROM game
                WHERE game_id = '" . mysqli_real_escape_string($this->conn, $gameId) . "'";
            
            // Eksekusi query
            if (mysqli_query($this->conn, $query)) {
                // Jika berhasil, kembalikan response sukses
                return [
                    'success' => true
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

    
}

?>
