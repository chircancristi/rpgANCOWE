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
    $play->updatePlayer2($_GET["caracter"],$_GET["username"],$_GET["skill1"],$_GET["skill2"],$_GET["skill3"],$_GET["skill4"]);  
    break;
    case 4:
    $play->giveRewards($_POST["win"]);
    $play->deleteRow();
    break; 

   
}
?>