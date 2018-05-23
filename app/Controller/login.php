
<?php
// Start the session
session_start();
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
if (count($_POST)==2) $nr=0;
if (count($_POST)==4) $nr=1;
if (count($_POST)==0) $nr=2;
switch ($nr) {
    case 0:
    
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sundaybrawl";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT password FROM user where username = '".$_POST["username"]."'";
   
    $result = mysqli_query($conn, $sql);
    if ($result==NULl){
        die("Query error, conection is bad");
    }
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          
            if ( $_POST["password"]==$row["password"]){
                $_SESSION["username"] = $_POST["username"];
                $_SESSION["password"] = $_POST["password"];
                $_SESSION["character"] = 1; 
                $_SESSION["weapon"] = 0; 
                $_SESSION["armor"] = 0; 
                 if (mysqli_query($conn, $sql)) {
                    echo "New record created successfully";
                } else {
                    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
                }
                header("Location: ../View/Pages/dashboard.php");
              
                }
                else {
                    echo "Razvan avem nevoie de login fail trg ";
                }    
            
        }
    } else {
        echo "Razvan avem nevoie de login fail trg ";
    }
    $conn->close();
    break;
    
    case 1:
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sundaybrawl";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    if (mysqli_connect_errno())
    {
    echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }

    
    if($_POST["password"] != $_POST["confirmPassword"]){
        die("Parolele nu se potrivesc!");
    }

    if(!checkUsernameAvailability($_POST["username"], $conn)){
        die("Numele de utilizator nu este disponibil!");
    }

    if(!checkEmailAvailability($_POST["mail"], $conn)){
        die("Email-ul nu este disponibil");
    }

    addNewUser($_POST["username"],$_POST["password"],$_POST["mail"], $conn);
    

    
    header("Location: ../View/Pages/index.html");
    $conn->close();
    break; 
    case 2:
    // Unset all of the session variables.
    $_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
    if (isset($_COOKIE[session_name()])) {
    setcookie(session_name(), '', time()-42000, '/');
    }

// Finally, destroy the session.
    session_destroy(); 
    header("Location: ../View/Pages/index.html");
    break;  
    }
?>    



