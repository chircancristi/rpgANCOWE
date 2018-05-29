<?php
session_start();
require_once("../Model/dashboard.php");
$dashboard=new dashboard();
switch (intval($_GET['q'])) {
    case 0:
        //erase account
    
       
       $dashboard->eraseAccount($_GET['username']);
       header("Location: ../View/Pages/index.html");  
        break;
    case 1:
        $dashboard->updateAccount($_POST["newUsername"],$_POST["newPassword"],$_POST["newPasswordComfirm"],$_POST["newMail"]);
        header("Location: ../View/Pages/dashboard.php");  
        break;
    
    default:
        echo "Your favorite color is neither red, blue, nor green!";
}
?>