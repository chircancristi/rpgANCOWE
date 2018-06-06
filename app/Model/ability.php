<?php

class ability{
    private $conn;

    public $abilityId;
    public $charId;
    public $description;
    public $name;
    public $type;
    public $imgUrl;
    public $att;
    public $def;

    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){
 
    // select all query
    $query = "SELECT
                *
            FROM
                abilities
            ORDER BY
                abilityId ASC";


    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();
 
    return $stmt;
}
function search($where){
 
    // select all query
    $query = "SELECT
                *
            FROM
                abilities
            WHERE
                " . $where . "
            ORDER BY
                abilityId asc";

    //echo $query;
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 

    // execute query
    $stmt->execute();
 
    return $stmt;
}

}

?>