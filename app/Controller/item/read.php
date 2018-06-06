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
 
// query products
$stmt = $item->read();
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
        array("message" => "No products found.")
    );
}
?>