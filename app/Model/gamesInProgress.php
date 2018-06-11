<?php

class gamesinprogress{
    private $conn;

    public $id;
    public $usernameP1;
    public $usernameP2;


    public function __construct($db){
        $this->conn = $db;
    }
    


function search($where){

    $query = "SELECT * FROM gamesinprogress WHERE" . $where . " ORDER BY id asc";

    $stmt = $this->conn->prepare($query);
 


    $stmt->execute();
 
    return $stmt;

}
}

?>