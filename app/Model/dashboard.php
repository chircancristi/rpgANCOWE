<?php
session_start();
class dashboard{

    function eraseAccount($userName)    {
 
    $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_query($conn,"DELETE FROM asocchars WHERE username = '".$userName."'");
    mysqli_query($conn,"DELETE FROM asocitems WHERE username = '".$userName."'");
    mysqli_query($conn,"DELETE FROM userchr WHERE username = '".$userName."'");
    mysqli_query($conn,"DELETE FROM user WHERE username ='".$userName."'");

    return true;
    $conn->close();
}
function changeData ($user, $pass, $mail, $oldAcc, $conn){
    $sql = "INSERT INTO user VALUES ('".$user."','".$pass."','".$mail."',".$oldAcc["money"].",".$oldAcc["wins"].",".$oldAcc["losses"].",".$oldAcc["gamesPlayed"].")";
    mysqli_query($conn, $sql);
    
    mysqli_query($conn,"Update  asocchars set username='".$user."' WHERE username ='".$_SESSION["username"]."'");
    mysqli_query($conn,"Update  asocitems set username='".$user."' WHERE username ='".$_SESSION["username"]."'");
    mysqli_query($conn,"Update  userchr set username='".$user."' WHERE username ='".$_SESSION["username"]."'");
    mysqli_query($conn,"DELETE FROM user WHERE username ='".$_SESSION["username"]."'");
}

function updateData($pass, $mail, $conn){
    mysqli_query($conn,"Update user set password='".$pass."', email='".$mail."' where username = '".$_SESSION["username"]."'");
}

function checkUsernameAvailability($nume, $conn){
    $sql = "SELECT * FROM user where username = '".$nume."'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0){
        return false;
    }
    return true;
}

function checkEmailAvailability($mail, $conn){
    $sql = "SELECT * FROM user where email = '".$mail."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        return false;
    }
    return true;
}
function updateAccount($user,$pass,$comfirmPass,$mail){
    
  
    $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $data = mysqli_query($conn, "Select * from user where username='".$_SESSION["username"]."'");
    $oldAcc = mysqli_fetch_assoc($data);
    
    $changeToUser = false;
    $newMail = $oldAcc["email"];
    $newPass = $oldAcc["password"];
    $newUser = $oldAcc["username"];

    if($mail!=""){
        if($this->checkEmailAvailability($mail, $conn)){
            $newMail = $mail;
        } else {
            die("Emailul ".$mail." este deja folosit");
        }
    }

    if($pass!=""){
        if($pass == $comfirmPass){
            $newPass = $pass;
        } else {
            die("Parolele nu coincid!");
        }
    }

    if($user!=""){
        if($this->checkUsernameAvailability($user,$conn)){
            $changeToUser = true;
        } else {
            die("Usernameul ".$user." este deja folosit");
        }
    }

    if($changeToUser){
        $newUser = $user;
        $this->changeData($newUser, $newPass, $newMail, $oldAcc, $conn);
        $_SESSION["username"] = $newUser;
    } else {
        $this->updateData($newPass, $newMail, $conn);
    }
    
    $conn->close();
}
}
?>