<?php
// Start the session
session_start();
?>

<?php
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

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sundaybrawl";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $data = mysqli_query($conn, "Select * from user where username='".$_SESSION["username"]."'");
    $oldAcc = mysqli_fetch_assoc($data);
    
    $changeToUser = false;
    $newMail = $oldAcc["email"];
    $newPass = $oldAcc["password"];
    $newUser = $oldAcc["username"];

    if($_POST["newMail"]!=""){
        if(checkEmailAvailability($_POST["newMail"], $conn)){
            $newMail = $_POST["newMail"];
        } else {
            die("Emailul ".$_POST["newMail"]." este deja folosit");
        }
    }

    if($_POST["newPassword"]!=""){
        if($_POST["newPassword"] == $_POST["newPasswordComfirm"]){
            $newPass = $_POST["newPassword"];
        } else {
            die("Parolele nu coincid!");
        }
    }

    if($_POST["newUsername"]!=""){
        if(checkUsernameAvailability($_POST["newUsername"],$conn)){
            $changeToUser = true;
        } else {
            die("Usernameul ".$_POST["newUsername"]." este deja folosit");
        }
    }

    if($changeToUser){
        $newUser = $_POST["newUsername"];
        changeData($newUser, $newPass, $newMail, $oldAcc, $conn);
        $_SESSION["username"] = $newUser;
    } else {
        updateData($newPass, $newMail, $conn);
    }
    
    $conn->close();
?>