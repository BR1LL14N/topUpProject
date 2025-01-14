<?php

interface UserInterface {
    public function addUserToDb($username, $email, $password, $role, $imagePath);
    public function searchUserByUsername($username);
    public function searchUserByEmail($email);
}

class userModel implements UserInterface {
    protected $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function addUserToDb($username, $email, $password, $role, $imagePath) {
        try {
            $query = "
                INSERT INTO users (username, password, email, role, user_icon) 
                VALUES (
                    '" . mysqli_real_escape_string($this->conn, $username) . "',
                    '" . mysqli_real_escape_string($this->conn, $password) . "',
                    '" . mysqli_real_escape_string($this->conn, $email) . "',
                    '" . mysqli_real_escape_string($this->conn, $role) . "',
                    '" . mysqli_real_escape_string($this->conn, $imagePath) . "'
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

    public function searchUserByUsername($username) {
        try {
            $query = "SELECT * FROM users WHERE username = '" . mysqli_real_escape_string($this->conn, $username) . "'";
            $result = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            } else {
                return null;
            }
        } catch (Exception $e) {
            return null;
        }
    }

    public function searchUserByEmail($email) {
        try {
            $query = "SELECT * FROM users WHERE email = '" . mysqli_real_escape_string($this->conn, $email) . "'";
            $result = mysqli_query($this->conn, $query);

            if (mysqli_num_rows($result) > 0) {
                return mysqli_fetch_assoc($result);
            } else {
                return null;
            }
        } catch (Exception $e) {
            return null;
        }
    }
}

?>
