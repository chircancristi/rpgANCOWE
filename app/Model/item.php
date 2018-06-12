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

function read(){
 
    $query = "SELECT
                id, name, type, imgUrl, price, att, def
            FROM
                items
            ORDER BY
                id ASC";
 
    
    $stmt = $this->conn->prepare($query);
 

    $stmt->execute();
 
    return $stmt;
}
function search($where){
 

    $query = "SELECT
                id, name, type, imgUrl, price, att, def
            FROM
                items
            WHERE
                " . $where . "
            ORDER BY
                id asc";

    $stmt = $this->conn->prepare($query);

    $stmt->execute();
 
    return $stmt;
}

}

?>