<?php
// Start the session
session_start();
?>

<?php
    // Create connection
    $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    // Check connection
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_query($conn,"DELETE FROM asocchars WHERE username = '"$_SESSION["username"]"'");
    mysqli_query($conn,"DELETE FROM asocitems WHERE username = '"$_SESSION["username"]"'");
    mysqli_query($conn,"DELETE FROM userchr WHERE username = '"$_SESSION["username"]"'");
    mysqli_query($conn,"DELETE FROM user WHERE username ='".$_SESSION["username"]."'");


    header("Location: ../View/Pages/index.html");  
    
    $conn->close();
?>