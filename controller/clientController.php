<?php
require_once './model/displayClientModel.php';
class clientController {
    private $conn;

    public function handleRequest($fitur) {
        $gameID = $_GET['gameID'] ?? null;

        switch ($fitur) {
            // case 'dashboard':
            //     include './client.php';
            //     break;

            case 'display':
                $this->displayGameClient();
                break;
            case 'displayItem':
                $this->displayItemClient($gameID);
                break;
            case 'transaksi':
                include './views/transaksi.php';
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


    public function displayItemClient($gameID = null) {
        $itemModel = new displayClientModel($this->conn);
        $result = $itemModel->displayItemClient($gameID);
        // return $result;
        include './views/displayDetailItemClient.php';
    }

    
}



?>