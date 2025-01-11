<?php

require_once './model/transactionModel.php';
class transactionController{
    private $conn;

    public function handleRequest($fitur){
        switch($fitur){
            case 'addTransaction':
                $this->addTransaction($_POST);
                break;
            case 'status':
                $this->getTransactionByUserID();
                break;
            case 'update':
                $this->updateTransactionStatus($_POST['status'], $_POST['transaksi_id']);
                break;
            case 'list':
                $this->getTransactionBerhasil();
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

    public function getTransactionByUserID(){
        $userID = $_SESSION['id'];
        $transaction = new transactionModel($this->conn);
        $resultTransactions = $transaction->getTransactionByUserID($userID);
        // return $resultTransactions;
        include './views/orderStatusClient.php';
    }

    public function getTransactionBerhasil(){
        $userID = $_SESSION['id'];
        $transaction = new transactionModel($this->conn);
        $resultTransactions = $transaction->getTransactionByUserID($userID);
        // return $resultTransactions;
        include './views/historisPesananClient.php';
    }

    public function updateTransactionStatus($status, $transactionID){
        // Debugging: Cek data yang diterima
        // echo "<pre>";
        // print_r([
        //     'status' => $status,
        //     'transactionID' => $transactionID,
        // ]);
        // echo "</pre>";
        // die();

        $transaction = new transactionModel($this->conn);
        $result = $transaction->updateTransactionStatus($status, $transactionID);
        if($result){
            // echo"<script>alert('Status transaksi berhasil diubah');</script>";
            header("Location: index.php?modul=paymentMethod&fitur=display");
        }else{
            echo"<script>alert('Status transaksi gagal diubah');</script>";
            header("Location: indexAdmin.php?modul=transaction&fitur=display");
        }
    }

    public function __destruct() {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

}

?>