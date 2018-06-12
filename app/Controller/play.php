<?php
require_once("../Model/play.php");
$play=new play();
if (count($_GET)>0) $check=intval($_GET['status']);
else  $check=$_POST['status']; 

switch ($check){
    case 1:
    $index=intval($_POST['index']);
    $_SESSION["turn"]=intval($_POST['turn']);
    $response=$play->sentUserData($index);
    echo $response;
    break;
    case 2:
    echo  $play->updatePlayer1();
    break;
    case 3:
    $_SESSION["oppAtt"]=$_POST["att"];
    $_SESSION["oppDef"]=$_POST["def"];
    echo $play->updatePlayer2($_POST["caracter"],$_POST["username"],$_POST["skill1"],$_POST["skill2"],$_POST["skill3"],$_POST["skill4"]);  
    break;
    case 4:
    $play->giveRewards($_POST["win"]);
    break; 
    case 5:
    $play->updateHealth($_POST["health"]);
    break;
    case 6:
    $_SESSION["oppAtt"]=$_GET["att"];
    $_SESSION["oppDef"]=$_GET["def"];
    break;
    case 7: 
    $dmg=$_SESSION["att"]-0.35*$_SESSION["oppDef"];
    if ($dmg>0){
        $_SESSION["opponentsHealth"]=$_SESSION["opponentsHealth"]-(5+$dmg*0.35);
        $_SESSION["opponentsHealth"]=round($_SESSION["opponentsHealth"]);
        if ($_SESSION["opponentsHealth"]<=0)
        $userData=array(
            'status'=> 'endGame',
            'username' => $_SESSION["username"],
            'index'=>$_SESSION["index"]
        ); 
         else $userData=array(
            'status'=> 'opponentsTurn',
            'health'=> $_SESSION["opponentsHealth"],
            'index'=>$_SESSION["index"]
        );
        $userData=json_encode($userData);
        echo $userData;
    }
    else return "noDmg";
    break;
    case 8:
    $response=$play->skill($_POST["skill1"],$_POST["skill2"],$_POST["skill3"],$_POST["skill4"]);
    echo $response;
    break;
    case 9:
    $userData=array(
        'status'=> 'terminate',
        'username' => $_SESSION["username"],
        
    ); 
    $userData=json_encode($userData);
    echo $userData;
    break;

   
}
?>