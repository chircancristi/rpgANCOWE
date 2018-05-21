
<?php

    $servername = "localhost";
    $username = "root";
    $password = "your_password";
    $dbname = "sundaybrawl";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
    }
    $sql = "SELECT password FROM user where username=".$_POST["username"] ;
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while($row = mysqli_fetch_assoc($result)) {
          
            if ( $_POST["password"]==$row["password"]){
                header("Location: ../View/Pages/dashboard.html");
                }
            
        }
    } else {
        echo "Razvan avem nevoie de login fail trg ";
    }
  

?>    
</body>
</html>


