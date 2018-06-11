<?php

class playersInGame{
    private $conn;

    public $gameId;
    public $username;
    public $att;
    public $dff;
    public $health;
    public $charId;


    public function __construct($db){
        $this->conn = $db;
    }
    


function search($where){

    $query = "SELECT * FROM playersingame WHERE" . $where . " ORDER BY gameId asc";

    $stmt = $this->conn->prepare($query);


    $stmt->execute();
 
    return $stmt;

}
}

?>