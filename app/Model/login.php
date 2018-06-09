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
    
        
        if($password != $comfirmPassword){
            die("Parolele nu se potrivesc!");
        }
    
        if(!$this->checkUsernameAvailability($username, $conn)){
            die("Numele de utilizator nu este disponibil!");
        }
    
        if(!$this->checkEmailAvailability($mail, $conn)){
            die("Email-ul nu este disponibil");
        }
    
        $this->addNewUser($username,$password,$mail, $conn);
    }

}
?>