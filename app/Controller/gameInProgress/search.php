<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
include_once '../../Config/database.php';
include_once '../../Model/gamesInProgress.php';
 
$database = new Database();
$db = $database->getConnection();

$user = new gamesInProgress($db);
 

$where = "";

if(isset($_GET["id"])){
    $where.= "id = ".$_GET["id"];
}

if(isset($_GET["username"])){
    if(strcmp($where,"") != 0){
        $where .= " and";
    }
    $where.= " (usernamePlayer1 like '%".$_GET["username"]."%' or usernamePlayer2 like '%" . $_GET["username"] . "%')";
}




$stmt = $user->search($where);
$num = $stmt->rowCount();

if($num>0){
 
    $users_arr=array();
    $users_arr["records"]=array();
 
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
 
        $single_user=array(
            "id" => $id,
            "usernameP1" => $usernamePlayer1,
            "usernameP2" => $usernamePlayer2
        );
 
        array_push($users_arr["records"], $single_user);
    }
 
    echo json_encode($users_arr);
}
 
else{
    echo json_encode(
        array("message" => "No games found.")
    );
}
?>