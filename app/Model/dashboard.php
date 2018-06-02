<?php
session_start();
class dashboard{

    function eraseAccount($userName)    {
 
    $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    mysqli_query($conn,"DELETE FROM asocchars WHERE username = '".$userName."'");
    mysqli_query($conn,"DELETE FROM asocitems WHERE username = '".$userName."'");
    mysqli_query($conn,"DELETE FROM userchr WHERE username = '".$userName."'");
    mysqli_query($conn,"DELETE FROM user WHERE username ='".$userName."'");

    return true;
    $conn->close();
}
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
function updateAccount($user,$pass,$comfirmPass,$mail){
    
  
    $conn = mysqli_connect("localhost", "root", "", "sundaybrawl");
    if (mysqli_connect_errno()){
        echo "Failed to connect to MySQL: " . mysqli_connect_error();
    }
  
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $data = mysqli_query($conn, "Select * from user where username='".$_SESSION["username"]."'");
    $oldAcc = mysqli_fetch_assoc($data);
    
    $changeToUser = false;
    $newMail = $oldAcc["email"];
    $newPass = $oldAcc["password"];
    $newUser = $oldAcc["username"];

    if($mail!=""){
        if($this->checkEmailAvailability($mail, $conn)){
            $newMail = $mail;
        } else {
            die("Emailul ".$mail." este deja folosit");
        }
    }

    if($pass!=""){
        if($pass == $comfirmPass){
            $newPass = $pass;
        } else {
            die("Parolele nu coincid!");
        }
    }

    if($user!=""){
        if($this->checkUsernameAvailability($user,$conn)){
            $changeToUser = true;
        } else {
            die("Usernameul ".$user." este deja folosit");
        }
    }

    if($changeToUser){
        $newUser = $user;
        $this->changeData($newUser, $newPass, $newMail, $oldAcc, $conn);
        $_SESSION["username"] = $newUser;
    } else {
        $this->updateData($newPass, $newMail, $conn);
    }
    
    $conn->close();
}
    function buyItem ($itemId){
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
        $sql = "SELECT * FROM `items` where id = '".$itemId."'";
        $sql2 = "SELECT * FROM `user` where username= '".$_SESSION["username"]."'";
        
        $result = mysqli_query($conn, $sql);
        $result2 = mysqli_query($conn, $sql2);  
        $row = mysqli_fetch_assoc($result);
        $row2 = mysqli_fetch_assoc($result2);
        if ($row["price"]<=$row2["money"]){
            
            $rest=$row2["money"]-$row["price"];
           
            $sql2 = "UPDATE `user` SET money=".$rest." where username='".$_SESSION["username"]."'";
           
            mysqli_query($conn, $sql2);
            $sql2 =  "Insert into `asocitems` (`username`, `itemId`) values('".$_SESSION["username"]."','".$itemId."')";
          
            mysqli_query($conn, $sql2);
           
        }
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
    }
    function changeWeapon($id,$type){
    echo  "<div class=\"char-details__abilities__container\">";
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
     echo  "</div>";

    }
    function changeChar ($id){
                        echo "<div class=\"char-details__bio__header\" id=\"char-details__bio__header\">";
                        $q = $id;
                        $con = mysqli_connect('localhost','root','','sundaybrawl');
                        if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                       
                        $sql="SELECT name,imgUrl,bio FROM `char` WHERE charId = '".$q."'";
                        $result = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<img src=\"".$row['imgUrl']." \" alt=\"character portrait\" class=\"char-details__bio__portrait\">";
                            echo "<h2>".$row['name']."</h2>";
                            echo " <p class=\"char-details__bio__description\">".$row['bio']."</p>"; 
                        }
                        mysqli_close($con);
                        echo  "</div>";
    }
    function updateCharStats(){
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$con) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
       
        $sql="SELECT lvl FROM `userchr` WHERE charId = '".$_SESSION["character"]."' and username='".$_SESSION["username"]."'";
        
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            echo"<li>Level:
            <span>" .$row['lvl']. "</span> </li>";
        }
          
        $sql="SELECT att,def FROM `char` WHERE charId = '".$_SESSION["character"]."'"  ;
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {

            $att=$row["att"];
            $def=$row["def"];
           
            $sql = "SELECT * FROM `items`   where id = ".$_SESSION["weapon"];
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) != 0 ) 
            {
                $row = mysqli_fetch_array($result);
                $att=$att+$row["att"];
                $def=$def+$row["def"];
            }
            $sql = "SELECT * FROM `items`   where id = ".$_SESSION["armor"];
            $result = mysqli_query($con, $sql);
            if (mysqli_num_rows($result) != 0 ) 
            {
                $row = mysqli_fetch_array($result);
                $att=$att+$row["att"];
                $def=$def+$row["def"];
            }
        echo "<li>Attack:
        <span>".$att."</span>
        </li>";
         echo"<li>Defense:
        <span>".$def."</span>
         </li>";
        }
        mysqli_close($con);

    }
    function changeSkill()
    {
        echo " <div class=\"char-details__abilitie__skills__container\" id=\"char-details__abilities__skills__container\">";

        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$con) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
       
        if ($_SESSION["skill1"]==0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=1";
        else $sql="SELECT * FROM `abilities` WHERE abilityId = '".$_SESSION["skill1"]."' and type=1";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        echo
        "<div class=\"firstSkill__container\">
            <div class=\"char-details__abilities__item\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"firstSkillSelected\" onclick=\"showSkill('firstSkill')\">
                <img src=\"".$row["ImgUrl"]."\" alt=\"ability 1\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
       
        if ($_SESSION["skill1"]!=0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=1 and abilityId!=".$_SESSION["skill1"];
        if ($_SESSION["skill1"]!=0)  $result = mysqli_query($con,$sql);
        $_SESSION["skill1"]=$row["abilityId"];
        $row = mysqli_fetch_array($result);
        echo    
        "<div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"firstSkill\" onclick=\"changeSkill(1,".$row["abilityId"].")\">
                <img src=\"".$row["ImgUrl"]."\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
        echo "</div>";
       
        
        if ($_SESSION["skill2"]==0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=2";
        else $sql="SELECT * FROM `abilities` WHERE abilityId = '".$_SESSION["skill2"]."' and type=2";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        echo 
        "<div class=\"secondSkill__container\">
            <div class=\"char-details__abilities__item\" id=secondSkillSelected2 onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\"
                onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\" onclick=\"showSkill('secondSkill')\">
                <img src=\"".$row["ImgUrl"]."\" alt=\"ability 2\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
            if ($_SESSION["skill2"]!=0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=2 and abilityId!=".$_SESSION["skill2"];
            if ($_SESSION["skill2"]!=0)  $result = mysqli_query($con,$sql);
            $_SESSION["skill2"]=$row["abilityId"];
        $row = mysqli_fetch_array($result);
        echo  " <div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"secondSkill\" onclick=\"changeSkill(2,".$row["abilityId"].")\">
                <img src=\"".$row["ImgUrl"]."\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
         echo "</div>";
        
         
         if ($_SESSION["skill3"]==0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=3";
         else $sql="SELECT * FROM `abilities` WHERE abilityId = '".$_SESSION["skill3"]."' and type=3";
         $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        echo  "<div class=\"thirdSkill__container\">
            <div class=\"char-details__abilities__item\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"thirdSkillSelected\" onclick=\"showSkill('thirdSkill')\">
                <img src=\"".$row["ImgUrl"]."\" alt=\"ability 3\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
        if ($_SESSION["skill3"]!=0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=3 and abilityId!=".$_SESSION["skill3"];
        if ($_SESSION["skill3"]!=0)  $result = mysqli_query($con,$sql);
        $_SESSION["skill3"]=$row["abilityId"];
        $row = mysqli_fetch_array($result);
        echo  " <div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"thirdSkill\" onclick=\"changeSkill(3,".$row["abilityId"].")\">
                <img src=\"".$row["ImgUrl"]."\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
        echo "</div>";
        

        if ($_SESSION["skill4"]==0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=4";
        else $sql="SELECT * FROM `abilities` WHERE abilityId = '".$_SESSION["skill4"]."' and type=4";
        $result = mysqli_query($con,$sql);
        $row = mysqli_fetch_array($result);
        echo  "<div class=\"thirdSkill__container\">
            <div class=\"char-details__abilities__item\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"fourthSkillSelected\" onclick=\"showSkill('fourthSkill')\">
                <img src=\"".$row["ImgUrl"]."\" alt=\"ability 4\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";    
        if ($_SESSION["skill4"]!=0) $sql="SELECT * FROM `abilities` WHERE charId = '".$_SESSION["character"]."' and type=4 and abilityId!=".$_SESSION["skill4"];
        if ($_SESSION["skill4"]!=0)  $result = mysqli_query($con,$sql);
        $_SESSION["skill4"]=$row["abilityId"];
        $row = mysqli_fetch_array($result);
         echo  " <div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$row["abilityId"]."')\" onmouseout=\"hideDescription('skillDesc".$row["abilityId"]."')\"
                id=\"fourthSkill\" onclick=\"changeSkill(4,".$row["abilityId"].")\">
                <img src=\"".$row["ImgUrl"]."\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
         echo "</div>";
        

echo "</div>";
    }
    function userStats(){
       echo "<div class=\"acc-stats__info\" id=\"acc-stats__info\">";
        
    
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
           echo  "<p>  Money: ". $row['money'] ."</p>";
        }
        mysqli_close($con);
        echo "</div>";
    }
}
?>