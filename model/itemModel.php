<?php
class itemModel{
    private $conn;

    public function __construct($conn){
        $this->conn = $conn;
    }

    public function addItemToDb($itemName, $itemDescription, $itemIcon, $gameID, $itemPrice){
        try{
            $query = "INSERT INTO item (item_name, item_description, item_icon, game_id, item_price) VALUES (?, ?, ?, ?, ?)";
            $stmt = $this->conn->prepare($query);
            $stmt->bind_param("sssss", $itemName, $itemDescription, $itemIcon, $gameID, $itemPrice);
            $stmt->execute();
            $stmt->close();
            return true;
        }catch(Exception $e){
            return false;
        }
    }

}


?>