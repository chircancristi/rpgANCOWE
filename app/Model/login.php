<?php
class login{
    function checkCredentials($username,$password){
    
   
    $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $sql = mysqli_prepare($conn,"SELECT password FROM user where username = ?");
    mysqli_stmt_bind_param($sql, 's',$username);
    $sql->execute();
	$sql->bind_result($passwordBd);
	$sql->fetch();
	$sql->close();
    if ( $password==$passwordBd && $password!="") return true;    
    return false;
}
function checkUsernameAvailability($nume, $conn){
    $sql = mysqli_prepare($conn,"SELECT * FROM user where username = ?");
    mysqli_stmt_bind_param($sql, 's',$nume);
    $sql->execute();
    if ($sql->fetch()!=null){
        $sql->close();
        return false;
    }
    $sql->close();
    return true;
}

function checkEmailAvailability($mail, $conn){
    
    $sql = mysqli_prepare($conn,"SELECT * FROM user where email = ?");
    mysqli_stmt_bind_param($sql, 's',$mail);
    $sql->execute();
    if ($sql->fetch()!=null){
        $sql->close();
        return false;
    }
    $sql->close();
    return true;
}

function addNewUser($nume, $parola, $mail, $conn){
    
    $sql =mysqli_prepare($conn,"insert into user values( ?,?,?,0,0,0,0)");
    $parola=hash('sha256', $parola);
    mysqli_stmt_bind_param($sql, 'sss',$nume,$parola,$mail);
    if ($sql->execute()==false) die("Error creating account");
    $sql->close();
    for($i = 1; $i <= 6; $i++){
        $sql = mysqli_prepare($conn,"insert into `userchr` values(?,?,0,0,0,0)");
        mysqli_stmt_bind_param($sql, 'si',$nume,$i);
        $sql->execute();
        $sql->close();
    }
    
}
    function createAccount($username,$password,$comfirmPassword,$mail){
        $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
        if (mysqli_connect_errno())
        {
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
        }
       
        if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
        }
        
        if (strlen($password) <8){
            header("Location: ../View/Pages/login-fail.html");
            return false;
        }    
        if($password != $comfirmPassword){
            header("Location: ../View/Pages/login-fail.html");
            return false;
        }
    
        if(!$this->checkUsernameAvailability($username, $conn)){
            header("Location: ../View/Pages/login-fail.html");
            return false ;
        }
    
        if(!$this->checkEmailAvailability($mail, $conn)){
            header("Location: ../View/Pages/login-fail.html");
            return false ;
        }
    
        $this->addNewUser($username,$password,$mail, $conn);
        return true;
    }

}
?>