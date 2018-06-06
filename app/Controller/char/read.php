<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Config/database.php';
include_once '../../Model/char.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$char = new char($db);
 
// query products
$stmt = $char->read();
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $chars_arr=array();
    $chars_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $single_char=array(
            "charId" => $charId,
            "name" => $name,
            "imgUrl" => $imgUrl,
            "att" => $att,
            "def" => $def
        );
 
        array_push($chars_arr["records"], $single_char);
    }
 
    echo json_encode($chars_arr);
}
 
else{
    echo json_encode(
        array("message" => "No characters found.")
    );
}
?>