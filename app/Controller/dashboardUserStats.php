<?php
// Start the session
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

  <div class="acc-stats__info" id="acc-stats__info">
                        <?php
                    
                        $con = mysqli_connect('localhost','root','','sundaybrawl');
                        if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                       
                        $sql="SELECT * FROM `user` WHERE username= '".$_SESSION["username"]."'";
                       
                        $result = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($result)) {
                           echo "<p> Number of won games: ". $row['wins'] ."</p>";
                           echo  "<p> Number of lost games: ". $row['losses'] ."</p>";
                           echo  "<p>  Number of played games: ". $row['gamesPlayed'] ."</p>";
                        }
                        mysqli_close($con);
                        ?>         
  </div>
</body>
</html>