<?php
// Start the session
session_start();
$_SESSION["weapon"] = intval($_GET['q']);
?>
 <div class="char-details__abilities__container">;
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "sundaybrawl";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

$sql = "SELECT * FROM `asocitems`  where username = '".$_SESSION["username"]."'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0 ){
   echo " <div class=\"weapon__container\" id=\"weapon__container\">  <div class=\"char-details__items__item\" > <img src=\"../../webroot/img/weapon0.png\" alt=\"ability 1\"> </div> </div>";
    }
   else {
   
 
    if ( $_SESSION["weapon"]==0) {$row = mysqli_fetch_assoc($result);$sql2 = "SELECT * fROM  `items` where id=".$row["itemId"];$_SESSION["weapon"]=$row["itemId"];}
    else $sql2 = "SELECT * fROM  `items` where id=".$_SESSION["weapon"];
    $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
     echo "<div class=\"weapon__container\" id=\"weapon__container".$row2["id"]."\">
    <div class=\"char-details__items__item\" onmouseover=\"showDescription('desc".$row2["id"]."')\" onmouseout=\"hideDescription('desc".$row2["id"]."')\"
         onclick=\"showSkill()\">
        <img src=\"".$row2["imgUrl"]."\" >
        <p id=\"desc".$row2["id"]."\" class=\"char-details__item_description\">".$row2["name"]."</p>
    </div>";
    
    while($row = mysqli_fetch_assoc($result)) {
    
    $sql2 = "SELECT * fROM  `items` where id=".$row["itemId"];
    
    $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
    if ($row2["type"]==1 && $row["itemId"]!=$_SESSION["weapon"]){
        
        echo "<div class=\"char-details__items_item_dropDown\" onmouseover=\"showDescription('desc".$row["itemId"]."')\" onmouseout=\"hideDescription('desc".$row["itemId"]."')\"
        id=firstWeapon onclick=\"changeSkillWeapons(".$row["itemId"].")\">
        <img src=\"".$row2["imgUrl"]."\">
        <p id=\"desc".$row["itemId"]."\" class=\"char-details__item_description\">".$row2["name"]."</p>
    </div>";
    }
    }
    echo "</div>";
   }
?>


</div>