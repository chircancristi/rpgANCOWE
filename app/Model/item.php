<?php

class item{
    private $conn;

    public $id;
    public $name;
    public $type;
    public $imgUrl;
    public $price;
    public $att;
    public $def;

    public function __construct($db){
        $this->conn = $db;
    }

// read products
function read(){
 
    // select all query
    $query = "SELECT
                id, name, type, imgUrl, price, att, def
            FROM
                items
            ORDER BY
                id ASC";
 
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 
    // execute query
    $stmt->execute();
 
    return $stmt;
}
function search($where){
 
    // select all query
    $query = "SELECT
                id, name, type, imgUrl, price, att, def
            FROM
                items
            WHERE
                " . $where . "
            ORDER BY
                id asc";

    //echo $query;
    // prepare query statement
    $stmt = $this->conn->prepare($query);
 

    // execute query
    $stmt->execute();
 
    return $stmt;
}

}

?>