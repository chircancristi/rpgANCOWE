<?php

require_once("../Model/dashboard.php");
$dashboard=new dashboard();

if (count($_GET)>0) $check=intval($_GET['q']);
else  $check=$_POST['type']; 

switch ($check) {
    case 0:
        //erase account
    
       
       $dashboard->eraseAccount($_GET['username']);
       header("Location: ../View/Pages/index.html");  
        break;
    case 1:
        $dashboard->updateAccount($_POST["newUsername"],$_POST["newPassword"],$_POST["newPasswordComfirm"],$_POST["newMail"]);
        header("Location: ../View/Pages/dashboard.php");  
        break;
    case 2: 
        $dashboard-> buyItem($_POST['itemId']);
        
        break;
    case 3:
        if ($_POST['t']==1) $_SESSION["weapon"] = $_POST['id'];
        if ($_POST['t']==0) $_SESSION["armor"] =  $_POST['id'];
        break;
    case 9:   
        $dashboard-> changeWeapon();
        break;
     case 4:
        $_SESSION["character"]=$_POST['id'];
        $_SESSION["skill1"] =0; 
        $_SESSION["skill2"] =0;
        $_SESSION["skill3"] =0;
        $_SESSION["skill4"] =0;
        break;
     case 8 :   
        $dashboard-> changeChar();
        break;
    case 5:
        $dashboard->updateCharStats();
       break;
    case 6:
        if ($_GET["type"]==1 )
             $_SESSION["skill1"]=intval($_GET['t']);
            
         if ($_GET["type"]==2 )
            $_SESSION["skill2"]=intval($_GET['t']);
            
         if ($_GET["type"]==3 )
            $_SESSION["skill3"]=intval($_GET['t']);
            
        if ($_GET["type"]==4 )
            $_SESSION["skill4"]=intval($_GET['t']);
        if ($_GET["type"]==-1) $dashboard->changeSkill();
         break;
    case 7: 
        $dashboard->userStats();
        break;
    case 10:
        $dashboard->updateItemsToBuy();
        break;
    case 11:
        $dashboard->charDetailsAttDeff($_GET['index']);
        break;    
   
}
?>