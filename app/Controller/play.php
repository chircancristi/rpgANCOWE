<?php
require_once("../Model/play.php");
$play=new play();
if (count($_GET)>0) $check=intval($_GET['status']);
else  $check=$_POST['status']; 

switch ($check){
    case 1:
    $index=intval($_POST['index']);
    $response=$play->sentUserData($index);
    echo $response;
    break;
    case 2:
    $play->updatePlayer1();
    break;
    case 3:
    $_SESSION["oppAtt"]=$_GET["att"];
    $_SESSION["oppDef"]=$_GET["def"];
    $play->updatePlayer2($_GET["caracter"],$_GET["username"],$_GET["skill1"],$_GET["skill2"],$_GET["skill3"],$_GET["skill4"]);  
    break;
    case 4:
    $play->giveRewards($_POST["win"]);
    $play->deleteRow();
    break; 
    case 5:
    $play->updateHealth($_Post["health"],0);
    break;
    case 6:
    $_SESSION["oppAtt"]=$_GET["att"];
    $_SESSION["oppDef"]=$_GET["def"];
    break;
    case 7: 
    $dmg=$_SESSION["att"]-$_SESSION["oppDef"];
    if ($dmg>0){
        $_SESSION["opponentsHealth"]=$_SESSION["opponentsHealth"]-$dmg;
        if ($_SESSION["opponentsHealth"]<=0)
        $userData=array(
            'status'=> 'endGame',
            'index'=>$_SESSION["index"]
        ); 
         else $userData=array(
            'status'=> 'opponentsTurn',
            'health'=> $_SESSION["opponentsHealth"],
            'index'=>$_SESSION["index"]
        );
        $userData=json_encode($userData);
        return $userData;
    }
    else return "noDmg";
    break;
    case 8:
    $response=$play->skill($_POST["skill1"],$_POST["skill2"],$_POST["skill3"],$_POST["skill4"]);
    return $response;
    break;

   
}
?>