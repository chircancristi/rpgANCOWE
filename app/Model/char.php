<?php

class char{
    private $conn;

    public $charId;
    public $name;
    public $bio;
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
                charId, name, bio, imgUrl, att, def
            FROM
                `char`
            ORDER BY
                charId ASC";


    // prepare query statement
    $stmt = $this->conn->prepare($query);

    // execute query
    $stmt->execute();
 
    return $stmt;
}
function search($where){
 
    // select all query
    $query = "SELECT
                charId, name, bio, imgUrl, att, def
            FROM
                `char`
            WHERE
                " . $where . "
            ORDER BY
                charId asc";

    //echo $query;
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 

    // execute query
    $stmt->execute();
 
    return $stmt;
}

}

?>