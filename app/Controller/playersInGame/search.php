<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../../Config/database.php';
include_once '../../Model/playersInGame.php';
 
$database = new Database();
$db = $database->getConnection();

$user = new playersInGame($db);
 

$where = "";

if(isset($_GET["id"])){
    $where.= "id = ".$_GET["id"];
}

if(isset($_GET["username"])){
    if(strcmp($where,"") != 0){
        $where .= " and";
    }
    $where.= " username like '%".$_GET["username"]."%'";
}

if(isset($_GET["charId"])){
    if(strcmp($where,"") != 0){
        $where .= " and";
    }
    $where.= " charId =".$_GET["charId"];
}

$stmt = $user->search($where);
$num = $stmt->rowCount();

if($num>0){
 
    $users_arr=array();
    $users_arr["records"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $single_user=array(
            "gameId" => $gameId,
            "username" => $username,
            "att" => $att,
            "dff" => $dff,
            "health" => $health,
            "charId" => $charId
        );
 
        array_push($users_arr["records"], $single_user);
    }
 
    echo json_encode($users_arr);
}
 
else{
    echo json_encode(
        array("message" => "No in-game players found.")
    );
}
?>