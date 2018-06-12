
<?php
// Start the session
session_start();

require_once("../Model/login.php");
if (count($_POST)==2) $nr=0;
if (count($_POST)==4) $nr=1;
if (count($_POST)==0) $nr=2;
switch ($nr) {
    case 0:
    $login=new login();
    if ($login-> checkCredentials($_POST["username"],hash('sha256',$_POST["password"]))==true)
     {
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION["character"] = 1; 
                $_SESSION["weapon"] = 0; 
                $_SESSION["armor"] = 0;
                $_SESSION["skill1"] =0;
                $_SESSION["opponent"]=0; 
                $_SESSION["skill2"] =0;
                $_SESSION["skill3"] =0;
                $_SESSION["skill4"]  =0;
                 if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                header("Location: ../View/Pages/dashboard.php");
              
        }
        else {
                header("Location: ../View/Pages/login-fail.html");
                }    
            
        break;
    
    case 1:
    $login=new login();
    $check=$login-> createAccount($_POST["username"],$_POST["password"],$_POST["confirmPassword"],$_POST["mail"]);
    if ($check==true)header("Location: ../View/Pages/index.html");
    
    break; 
    case 2:
   
    $_SESSION = array();
    if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
    }

// Finally, destroy the session.
    session_destroy(); 
    header("Location: ../View/Pages/index.html");
    break;  
    }
?>    



