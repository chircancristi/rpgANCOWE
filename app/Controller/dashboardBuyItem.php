
<?php
// Start the session
session_start();
$q = $_POST['itemId'];
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
$sql = "SELECT * FROM `items` where id = '".$q."'";
$sql2 = "SELECT * FROM `user` where username= '".$_SESSION["username"]."'";

$result = mysqli_query($conn, $sql);
$result2 = mysqli_query($conn, $sql2);  
$row = mysqli_fetch_assoc($result);
$row2 = mysqli_fetch_assoc($result2);
if ($row["price"]<=$row2["money"]){
    
    $rest=$row2["money"]-$row["price"];
   
    $sql2 = "UPDATE `user` SET money=".$rest." where username='".$_SESSION["username"]."'";
   
    mysqli_query($conn, $sql2);
    $sql2 =  "Insert into `asocitems` (`username`, `itemId`) values('".$_SESSION["username"]."','".$q."')";
  
    mysqli_query($conn, $sql2);
   
}
?>
 
                    <?php
                      $con = mysqli_connect('localhost','root','','sundaybrawl');
                      if (!$con) {
                                   die('Could not connect: ' . mysqli_error($con));
                                  }
                     
                      $sql="SELECT * FROM `items` ";
                      $result = mysqli_query($con,$sql);
                      while($row = mysqli_fetch_array($result)) {
                    
                        $sqlUser="SELECT * FROM asocitems where username='".$_SESSION["username"]."' and itemId=".$row["id"];
                        
                        $resultUser = mysqli_query($con,$sqlUser);
                        $nr=1;
                       if ($resultUser->num_rows==0) {

                        echo"
                            <div class=\"items__item__container\">
                            <div class=\"items__item\">
                                <div class=\"items__item__icon\">
                                    <img src=\"".$row["imgUrl"]."\">
                                </div>
                                <div class=\"items__item__details\">
                                    <div class=\"items__item__details__name\">
                                        <h4>".$row["name"]."</h4>
                                    </div>
                                    <div class=\"items__item__details__description\">
                                        <p>AT:".$row["att"]."</p>
                                        <p>DEF:".$row["def"]."</p>
                                    </div>
                                </div>
                            </div>
                            <div class=\"items__item__buy\">
                                <p class=\"items__item__buy__cost\">
                                    ".$row["price"]."
                                    <span>
                                        <img src=\"../../webroot/img\money-bag.png\">
                                    </span>
                                </p>
                                <button id=buyItem".$row["id"]." value=".$row["id"]." type=\"button\" onclick=\"buyItems(".$row["id"].",".$row["type"].")\" class=\"btn btn--buy\">BUY</button>
                            </div>
                            </div>
                      ";
                      $nr=$nr+1;
                       }
                      }
                       ?>
               