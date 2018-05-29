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
    $sql = "SELECT password FROM user where username = '".$username."'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0) {
       
        while($row = mysqli_fetch_assoc($result)){
          
            if ( $password==$row["password"]) return true;
            
        }
        
        
    }
    return false;
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

function addNewUser($nume, $parola, $mail, $conn){
    
    $sql = "Insert into user values('".$nume."','".$parola."','".$mail."',0,0,0,0)";
    mysqli_query($conn, $sql);
    echo $sql;

    for($i = 1; $i <= 6; $i++){
        $sqlUserchr = "Insert into userchr values('".$nume."',".$i.",0,0,0,0)";
        mysqli_query($conn, $sqlUserchr);
        
        $sqlAsocchars = "INSERT INTO `asocchars`(`charId`, `username`) values(".$i.",'".$nume."')";
        mysqli_query($conn, $sqlAsocchars);
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