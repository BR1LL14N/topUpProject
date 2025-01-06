<?php

require_once './model/transactionModel.php';
class transactionController{
    private $conn;

    public function handleRequest($fitur){
        switch($fitur){
            case 'addTransaction':
                $this->addTransaction($_POST);
                break;
        }
    }
    
    public function __construct() {
        $this->conn = mysqli_connect("localhost", "root", "", "webgame");
        if (!$this->conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    public function addTransaction($data) {

        // Debug input data
        // echo "<pre>";
        // print_r($data);
        // echo "</pre>";
        // die();

        $transaction = new transactionModel($this->conn);
        $gameID = $data['gameID'];
        $itemID = $data['item_id'];
        $userID = $data['userID'];
        $quantity = $data['item_quantity'];
        $paymentMethod = $data['payment_method'];
        $emailGame = $data['email'];
        $passGame = $data['password'];
        $idGame = $data['idGame'];
        $nicknameGame = $data['nicknameGame'];
        $levelGame = $data['levelGame'];
        $server = $data['server'];
        $status = $data['status'];
        $envoice = $this->creatEnvoice();

        $result = $transaction->addTransactionToDb($gameID, $itemID, $userID, $quantity, $paymentMethod, $emailGame, $passGame, $idGame, $nicknameGame, $levelGame, $server, $status, $envoice);

        // Debug result from model
        // echo "<pre>";
        // print_r($result);
        // echo "</pre>";
        // die();

        if($result){
            echo"<script>alert('Transaksi berhasil');</script>";
            header("Location: indexClient.php?modul=dashboard&fitur=display");
        }else{
            echo"<script>alert('Transaksi gagal');</script>";
            header("Location: indexClient.php?modul=dashboard&fitur=display");
        }
    }

    public function displayTransaction(){
        $transaction = new transactionModel($this->conn);
        $resultTransactions = $transaction->displayTransaction();
        return $resultTransactions;
        // include './views/displayTransactionAdmin.php';
    }

    public function getTransactionStructure(){
        $transaction = new transactionModel($this->conn);
        $resultTransactions = $transaction->getTransactionStructure();
        return $resultTransactions;
    }

    public function creatEnvoice(){
        $envoice = rand(100000,999999);
        return $envoice;
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

}

?>