
<?php
// Start the session
session_start();
?>
<?php

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

?>    
</body>
</html>


