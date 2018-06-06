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

// read products
function read(){
 
    // select all query
    $query = "SELECT
                username, password, email, money, wins, losses, gamesPlayed
            FROM
                user
            ORDER BY
                username ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}

// search products
function search($where){
 
    // select all query
    $query = "SELECT
                username, password, email, money, wins, losses, gamesPlayed
            FROM
                user
            WHERE
                " . $where . "
            ORDER BY
                username asc";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 

    // execute query
    $stmt->execute();
 
    return $stmt;
}
}

?>