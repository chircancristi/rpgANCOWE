<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Config/database.php';
include_once '../../Model/item.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$item = new item($db);
 
// get keywords

$where = "1=1";

if(isset($_GET["idBoundUpp"]) || isset($_GET["idBoundLow"])){
    if(isset($_GET["idBoundUpp"]) && isset($_GET["idBoundLow"])){
        $where .= " and id between " . $_GET["idBoundLow"] . " and " . $_GET["idBoundUpp"];
    } else if (isset($_GET["idBoundUpp"])){
        $where .= " and id <= ". $_GET["idBoundUpp"];
    } else {
        $where .= " and id >= ". $_GET["idBoundLow"];
    }
} else {
    if(isset($_GET["id"])){
        $where.= " and id = " . $_GET["id"];
    }
}

if(isset($_GET["name"])){
     $where.= " and name like '%".$_GET["name"]."%'";
}
 
if(isset($_GET["type"])){
    $where.= " and type = ".$_GET["type"];
}

if(isset($_GET["imgUrl"])){
    $where.= " and imgUrl like '%".$_GET["imgUrl"]."%'";
}

if(isset($_GET["priceBoundUpp"]) || isset($_GET["priceBoundLow"])){
    if(isset($_GET["priceBoundUpp"]) && isset($_GET["priceBoundLow"])){
        $where .= " and price between " . $_GET["priceBoundLow"] . " and " . $_GET["priceBoundUpp"];
    } else if (isset($_GET["priceBoundUpp"])){
        $where .= " and price <= ". $_GET["priceBoundUpp"];
    } else {
        $where .= " and price >= ". $_GET["priceBoundLow"];
    }
} else {
    if(isset($_GET["price"])){
        $where.= " and price = " . $_GET["price"];
    }
}
if(isset($_GET["attBoundUpp"]) || isset($_GET["attBoundLow"])){
    if(isset($_GET["attBoundUpp"]) && isset($_GET["attBoundLow"])){
        $where .= " and att between " . $_GET["attBoundLow"] . " and " . $_GET["attBoundUpp"];
    } else if (isset($_GET["attBoundUpp"])){
        $where .= " and att <= ". $_GET["attBoundUpp"];
    } else {
        $where .= " and att >= ". $_GET["attBoundLow"];
    }
} else {
    if(isset($_GET["att"])){
        $where.= " and att = " . $_GET["att"];
    }
}

if(isset($_GET["defBoundUpp"]) || isset($_GET["defBoundLow"])){
    if(isset($_GET["defBoundUpp"]) && isset($_GET["defBoundLow"])){
        $where .= " and def between " . $_GET["defBoundLow"] . " and " . $_GET["defBoundUpp"];
    } else if (isset($_GET["defBoundUpp"])){
        $where .= " and def <= ". $_GET["defBoundUpp"];
    } else {
        $where .= " and def >= ". $_GET["defBoundLow"];
    }
} else {
    if(isset($_GET["def"])){
        $where.= " and def = " . $_GET["def"];
    }
}
// query products
$stmt = $item->search($where);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $items_arr=array();
    $items_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $single_item=array(
            "id" => $id,
            "name" => $name,
            "type" => $type,
            "imgUrl" => $imgUrl,
            "price" => $price,
            "att" => $att,
            "def" => $def
        );
 
        array_push($items_arr["records"], $single_item);
    }
 
    echo json_encode($items_arr);
}
 
else{
    echo json_encode(
        array("message" => "No items found.")
    );
}
?>