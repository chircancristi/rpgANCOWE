<?php

class user{
    private $conn;

    public $username;
    public $password;
    public $email;
    public $money;
    public $wins;
    public $losses;
    public $gamesPlayed;

    public function __construct($db){
        $this->conn = $db;
    }
    


function search($where){

    $query = "SELECT username, money, wins, losses, gamesPlayed FROM `user` WHERE" . $where . " ORDER BY username asc";
    
    $stmt = $this->conn->prepare($query);
 


    $stmt->execute();
 
    return $stmt;

}
}

?>