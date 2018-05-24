<?php
// Start the session
session_start();
if (intval($_GET['t'])==1) $_SESSION["weapon"] = intval($_GET['q']);
if (intval($_GET['t'])==0) $_SESSION["armor"] = intval($_GET['q']);
?>
 <div class="char-details__abilities__container">;
<?php
 
 $servername = "localhost";
 $username = "root";
 $password = "";
 $dbname = "sundaybrawl";
 // Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);

 $sql = "SELECT * FROM `asocitems` INNER JOIN `items` on `items`.id=`asocitems`.itemId  where username = '".$_SESSION["username"]."' and type=1";
 
 $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) == 0 ){
    echo " <div class=\"weapon__container\" id=\"weapon__container\">  <div class=\"char-details__items__item\" > <img src=\"../../webroot/img/weapon0.png\" alt=\"ability 1\"> </div> </div>";
     }
    else {
    
    
     if ( $_SESSION["weapon"]==0) { $row = mysqli_fetch_assoc($result);$sql2 = "SELECT * fROM  `items` where id=".$row["itemId"]." and type=1" ;$_SESSION["weapon"]=$row["itemId"];}
     else $sql2 = "SELECT * fROM  `items` where id=".$_SESSION["weapon"];
     $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
      echo "<div class=\"weapon__container\" id=\"weapon__container\">
     <div class=\"char-details__items__item\" onmouseover=\"showDescription('desc".$row2["id"]."')\" onmouseout=\"hideDescription('desc".$row2["id"]."')\"
          onclick=\"showWeapon()\">
         <img src=\"".$row2["imgUrl"]."\" >
         <p id=\"desc".$row2["id"]."\" class=\"char-details__item_description\">".$row2["name"]."</p>
     </div>";
     
     while($row = mysqli_fetch_assoc($result)) {
     
     $sql2 = "SELECT * fROM  `items` where id=".$row["itemId"];
     
     $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
     if ($row2["type"]==1 && $row["itemId"]!=$_SESSION["weapon"]){
         
         echo "<div class=\"char-details__items_item_dropDown\" onmouseover=\"showDescription('desc".$row["itemId"]."')\" onmouseout=\"hideDescription('desc".$row["itemId"]."')\"
         id=firstWeapon onclick=\"changeWeapon(".$row2["id"].",1)\">
         <img src=\"".$row2["imgUrl"]."\">
         <p id=\"desc".$row2["id"]."\" class=\"char-details__item_description\">".$row2["name"]."</p>
     </div>";
     }
     }
     echo "</div>";
    }
    echo  "<div class=\"armor__container\" id=\"armor__container\">";
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = "SELECT * FROM `asocitems` INNER JOIN `items` on `items`.id=`asocitems`.itemId  where username = '".$_SESSION["username"]."' and type=0";
    $result = mysqli_query($conn, $sql);

 if (mysqli_num_rows($result) == 0 ){  echo "<div class=\"char-details__items__item\" ><img src=\"../../webroot/img/weapon0.png\" ></div>";}
     else {
         if ( $_SESSION["armor"]==0) { $row = mysqli_fetch_assoc($result);$sql2 = "SELECT * fROM  `items` where id=".$row["itemId"]." and type=0";$_SESSION["armor"]=$row["itemId"];}
         else $sql2 = "SELECT * fROM  `items` where id=".$_SESSION["armor"];
         $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
         echo "<div class=\"char-details__items__item\"  onmouseover=\"showDescription('armorDesc".$row2["id"]."')\" onmouseout=\"showDescription('armorDesc".$row2["id"]."')\"
         onclick=\"showArmor('')\">
         <img src=\"".$row2["imgUrl"]."\" alt=\"ability 2\">
         <p id=\"armorDesc".$row2["id"]."\" class=\"char-details__item_description\">".$row2["name"]."</p>
         </div>";
         while($row = mysqli_fetch_assoc($result)) {
     
             $sql2 = "SELECT * fROM  `items` where id=".$row["itemId"];
             $row2 = mysqli_fetch_assoc(mysqli_query($conn, $sql2));
             if ($row2["type"]==0 && $row["itemId"]!=$_SESSION["armor"]){
                 echo  "<div class=\"char-details__items_item_dropDownArmor\" onmouseover=\"showDescription('desc".$row["itemId"]."')\" onmouseout=\"hideDescription('desc".$row["itemId"]."')\"
                      onclick=\"changeWeapon(".$row2["id"].",0)\">
                     <img src=\"".$row2["imgUrl"]."\">
                     <p id=\"desc".$row2["id"]."\" class=\"char-details__item_description\">".$row2["name"]."</p>
                     </div>";
 
             }
         } 
     }
     echo "</div>";
?>


</div>