<?php
require_once("../Model/play.php");
$play=new play();

switch ($_POST['status']){
    case 1:
    $index=intval($_POST['index']);
    $response=$play->sentUserData($index);
    echo $response;
   
}
?>