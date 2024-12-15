<?php
require_once './model/displayClientModel.php';
class clientController {
    private $conn;

    public function handleRequest($fitur) {
        $gameID = $_GET['game_id'] ?? null;

        switch ($fitur) {
            case 'display':
                // $this->displayGameClient();
                break;
            default:
                echo "Fitur tidak valid.";
                break;
        }
    }

    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "webgame");
        if(!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function displayGameClient() {
        $gameModel = new displayClientModel($this->conn);
        $result = $gameModel->displayClient();
        return $result;
        // include './views/displayClient.php';
    }
}



?>