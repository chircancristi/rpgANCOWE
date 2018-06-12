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

    $sql=mysqli_prepare($conn,"DELETE FROM asocitems WHERE username = ?");
    mysqli_stmt_bind_param($sql, 's',$userName);
    $sql->execute();
    $sql=mysqli_prepare($conn,"DELETE FROM userchr WHERE username = ?");
    mysqli_stmt_bind_param($sql, 's',$userName);
    $sql->execute();
    $sql=mysqli_prepare($conn,"DELETE FROM user WHERE username = ?");
    mysqli_stmt_bind_param($sql, 's',$userName);
    $sql->execute();
    return true;
    $conn->close();
}
function changeData ($user, $pass, $mail, $oldAcc, $conn){
    $sql = "INSERT INTO user VALUES ('".$user."','".$pass."','".$mail."',".$oldAcc["money"].",".$oldAcc["wins"].",".$oldAcc["losses"].",".$oldAcc["gamesPlayed"].")";
    mysqli_query($conn, $sql);
    
   
    mysqli_query($conn,"Update  asocitems set username='".$user."' WHERE username ='".$_SESSION["username"]."'");
    mysqli_query($conn,"Update  userchr set username='".$user."' WHERE username ='".$_SESSION["username"]."'");
    mysqli_query($conn,"DELETE FROM user WHERE username ='".$_SESSION["username"]."'");
}

function updateData($pass, $mail, $conn){
    mysqli_query($conn,"Update user set password='".$pass."', email='".$mail."' where username = '".$_SESSION["username"]."'");
}

function checkUsernameAvailability($nume, $conn){
    $sql = mysqli_prepare($conn,"SELECT * FROM user where username = ?");
    mysqli_stmt_bind_param($sql, 's',$nume);
    $sql->execute();
    if ($sql->fetch()!=null){
        $sql->close();
        return false;
    }
    $sql->close();
    return true;
}

function checkEmailAvailability($mail, $conn){
   $sql = mysqli_prepare($conn,"SELECT * FROM user where email = ?");
    mysqli_stmt_bind_param($sql, 's',$mail);
    $sql->execute();
    if ($sql->fetch()!=null){
        $sql->close();
        return false;
    }
    $sql->close();
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
        
        $sql = mysqli_prepare($conn,"SELECT price FROM `items` where id = ?");
        $sql2 =  mysqli_prepare($conn,"SELECT money FROM `user` where username= ?");
        mysqli_stmt_bind_param($sql,'i',$itemId);
        mysqli_stmt_bind_param($sql2,'s',$_SESSION["username"]);
        $sql->execute();
        $sql->bind_result($price);
        $sql->fetch();
        $sql->close();
        $sql2->execute();
        $sql2->bind_result($money);
        $sql2->fetch();
        $sql2->close();

        if ($price<=$money){
            
            $rest=$money-$price;
           
            $sql2 = mysqli_prepare($conn,"UPDATE `user` SET money=? where username=?");
            mysqli_stmt_bind_param($sql2, 'is',$rest,$_SESSION["username"]);
            $sql2->execute();
            $sql2 =  mysqli_prepare($conn,"Insert into `asocitems` (`username`, `itemId`) values(?,?)");
            mysqli_stmt_bind_param($sql2, 'si',$_SESSION["username"],$itemId);
            $sql2->execute();
         
           
        }
        $sql2->close();
        $conn->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$con) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
       
        $sql="SELECT * FROM `items` ";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            $conn = mysqli_connect($servername, $username, $password, $dbname);
          $sqlUser=mysqli_prepare($conn,"SELECT * FROM asocitems where username=? and itemId=?");
          mysqli_stmt_bind_param($sqlUser, 'si',$_SESSION["username"],$row["id"]);
          $sqlUser->execute();
          $nr=1;
         if ($sqlUser->fetch()==null) {

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
    function changeWeapon(){
    echo  "<div class=\"char-details__abilities__container\">";
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "sundaybrawl";
    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $sql = mysqli_prepare($conn, "SELECT itemId FROM `asocitems` INNER JOIN `items` on `items`.id=`asocitems`.itemId  where username = ? and type=1");
    mysqli_stmt_bind_param($sql, 's',$_SESSION["username"]);
    $sql->execute();
    $sql->bind_result($itemId);

    if ($sql->fetch() == null ){
        echo " <div class=\"weapon__container\" id=\"weapon__container\">  <div class=\"char-details__items__item\" > <img src=\"../../webroot/img/weapon0.png\" alt=\"ability 1\"> </div> </div>";
     }
    else {
     $conn2 = mysqli_connect($servername, $username, $password, $dbname);
     if ( $_SESSION["weapon"]==0) 
     {
        $sql2 = mysqli_prepare($conn2,"SELECT id,imgUrl,name fROM  `items` where id=? and type=1") ;
        mysqli_stmt_bind_param($sql2, 'i',$itemId);
        $_SESSION["weapon"]=$itemId;
    }
     else 
     {
        $sql2 = mysqli_prepare($conn2,"SELECT id,imgUrl,name fROM  `items` where id=? and type=1") ;
        mysqli_stmt_bind_param($sql2, 'i',$_SESSION["weapon"]);
     }
     $sql2->execute();
     $sql2->bind_result($id,$imgUrl,$name);
     $sql2->fetch();

      echo "<div class=\"weapon__container\" id=\"weapon__container\">
     <div class=\"char-details__items__item\" onmouseover=\"showDescription('desc".$id."')\" onmouseout=\"hideDescription('desc".$id."')\"
          onclick=\"showWeapon()\">
         <img src=\"".$imgUrl."\" >
         <p id=\"desc".$id."\" class=\"char-details__item_description\">".$name."</p>
     </div>";
     do {
        $sql2->close();
        $conn2->close();   
        $conn2 = mysqli_connect($servername, $username, $password, $dbname);
      $sql2 = mysqli_prepare($conn2,"SELECT id,imgUrl,type,name fROM  `items` where id=? and type=1") ;
      mysqli_stmt_bind_param($sql2, 'i',$itemId);
      $sql2->bind_result($id,$imgUrl,$type,$name);
      $sql2->execute();
      $sql2->fetch();
      if ($type==1 && $id!=$_SESSION["weapon"]){
         
         echo "<div class=\"char-details__items_item_dropDown\" onmouseover=\"showDescription('desc".$itemId."')\" onmouseout=\"hideDescription('desc".$itemId."')\"
         id=firstWeapon onclick=\"changeWeapon(".$id.",1)\">
         <img src=\"".$imgUrl."\">
         <p id=\"desc".$id."\" class=\"char-details__item_description\">".$name."</p>
     </div>";
     } 
     }while($sql->fetch()==true);
     echo "</div>";
     $conn2->close();
    }
    echo  "<div class=\"armor__container\" id=\"armor__container\">";
    $conn->close();
    
    $conn = mysqli_connect($servername, $username, $password, $dbname);
    $sql = mysqli_prepare($conn, "SELECT itemId FROM `asocitems` INNER JOIN `items` on `items`.id=`asocitems`.itemId  where username = ? and type=0");
    mysqli_stmt_bind_param($sql, 's',$_SESSION["username"]);
    $sql->execute();
    $sql->bind_result($itemId);

    if ($sql->fetch() == null )
    {  
        echo "<div class=\"char-details__items__item\" ><img src=\"../../webroot/img/weapon0.png\" ></div>";
    }
    else {
    $conn2 = mysqli_connect($servername, $username, $password, $dbname);    
    if ( $_SESSION["armor"]==0) 
    { 
        $sql2 = mysqli_prepare($conn2,"SELECT id,imgUrl,name fROM  `items` where id=? and type=0") ;
        mysqli_stmt_bind_param($sql2, 'i',$itemId);
        $_SESSION["armor"]=$itemId;
    }
    else 
    {
        $sql2 = mysqli_prepare($conn2,"SELECT id,imgUrl,name fROM  `items` where id=? and type=0") ;
        mysqli_stmt_bind_param($sql2, 'i',$_SESSION["armor"]);
     
    } 
    $sql2->execute();
     $sql2->bind_result($id,$imgUrl,$name);
     $sql2->fetch();

    echo "<div class=\"char-details__items__item\"  onmouseover=\"showDescription('armorDesc".$id."')\" onmouseout=\"hideDescription('armorDesc".$id."')\"
    onclick=\"showArmor('')\">
    <img src=\"".$imgUrl."\" alt=\"ability 2\">
    <p id=\"armorDesc".$id."\" class=\"char-details__item_description\">".$name."</p>
    </div>";
    do {
        $sql2->close();
        $conn2->close();   
        $conn2 = mysqli_connect($servername, $username, $password, $dbname);
    $sql2 = mysqli_prepare($conn2,"SELECT id,imgUrl,type,name fROM  `items` where id=? and type=0") ;
    mysqli_stmt_bind_param($sql2, 'i',$itemId);
     $sql2->bind_result($id,$imgUrl,$type,$name);
     $sql2->execute();
     $sql2->fetch();
     if ($type==0 && $id!=$_SESSION["armor"]){
      echo  "<div class=\"char-details__items_item_dropDownArmor\" onmouseover=\"showDescription('desc".$itemId."')\" onmouseout=\"hideDescription('desc".$itemId."')\"
      onclick=\"changeWeapon(".$id.",0)\">
      <img src=\"".$imgUrl."\">
      <p id=\"desc".$id."\" class=\"char-details__item_description\">".$name."</p>
      </div>";
      
             }
         }while($sql->fetch());
        
     }
     echo "</div>";
     echo  "</div>";
     $conn->close();
     
    }
    function changeChar (){
    echo "<div class=\"char-details__bio__header\" id=\"char-details__bio__header\">";
    $q = $_SESSION["character"];
    $con = mysqli_connect('localhost','root','','sundaybrawl');
    if (!$con) {
                    die('Could not connect: ' . mysqli_error($con));
                }
    
    $sql = mysqli_prepare($con,"SELECT name,imgUrl,bio FROM `char` WHERE charId = ?");
    mysqli_stmt_bind_param($sql, 'i',$q);
    $sql->execute();
    $sql->bind_result($name,$imgUrl,$bio);
                
    while($sql->fetch() != null) {
        echo "<img src=\"".$imgUrl."\" alt=\"character portrait\" class=\"char-details__bio__portrait\">";
        echo "<h2>".$name."</h2>";
        echo " <p class=\"char-details__bio__description\">".$bio."</p>"; 
    }
    $sql->close();
    mysqli_close($con);
    echo  "</div>";
    }
    function updateCharStats(){
        $conn = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$conn) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
       
        $sql=mysqli_prepare($conn,"SELECT lvl FROM `userchr` WHERE charId = ? and username=?");
        mysqli_stmt_bind_param($sql, 'ss',$_SESSION["character"],$_SESSION["username"]);
        $sql->execute();
        $sql->bind_result($lvl);
        $sql->fetch();
        echo"<li>Level:
        <span>" .$lvl. "</span> </li>";
        $conn->close();
        $sql->close(); 
        $conn = mysqli_connect('localhost','root','','sundaybrawl');
        $sql=mysqli_prepare($conn,"SELECT att,def FROM `char` WHERE charId = ?")  ;
        mysqli_stmt_bind_param($sql, 'i',$_SESSION["character"]);
        $sql->execute();
        $sql->bind_result($att,$def);
        $sql->fetch();
        $conn->close();
        $sql->close(); 
        $conn = mysqli_connect('localhost','root','','sundaybrawl');
        $sql=mysqli_prepare($conn,"SELECT att,def FROM `items`   where id = ?");
        mysqli_stmt_bind_param($sql, 'i',$_SESSION["weapon"]);
        $sql->execute();
        $sql->bind_result($attWeapon,$defWeapon);
        $sql->fetch();
        $att=$att+$attWeapon;
        $def=$def+$defWeapon;
        $conn->close();
        $sql->close(); 
        $conn = mysqli_connect('localhost','root','','sundaybrawl');
        $sql=mysqli_prepare($conn,"SELECT att,def FROM `items`   where id = ?");
        mysqli_stmt_bind_param($sql, 'i',$_SESSION["armor"]);
        $sql->execute();
        $sql->bind_result($attWeapon,$defWeapon);
        $sql->fetch();
        $conn->close();
        $sql->close(); 
        $conn = mysqli_connect('localhost','root','','sundaybrawl');
        $att=$att+$attWeapon;
        $def=$def+$defWeapon;
        echo "<li>Attack:
        <span>".$att."</span>
        </li>";
         echo"<li>Defense:
        <span>".$def."</span>
         </li>";
        
        mysqli_close($conn);

    }
    function changeSkill()
    {

        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$con) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
       
        if ($_SESSION["skill1"]==0)
        {
        $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=1");
        mysqli_stmt_bind_param($sql, 's',$_SESSION["character"]);
        }
        else
        { 
        $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE abilityId = ? and type=1");
        mysqli_stmt_bind_param($sql, 's',$_SESSION["skill1"]);
        }
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
        echo
        "<div class=\"firstSkill__container\">
            <div class=\"char-details__abilities__item\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"firstSkillSelected\" onclick=\"showSkill('firstSkill')\">
                <img src=\"".$imgUrl."\" alt=\"ability 1\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
            </div>";
        $_SESSION["skill1"]=$abilityId;
        $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        $sql=mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=1 and abilityId!=?");
        mysqli_stmt_bind_param($sql, 'ss',$_SESSION["character"],$_SESSION["skill1"]);  
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
    
        echo    
        "<div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"firstSkill\" onclick=\"changeSkill(1,".$abilityId.")\">
                <img src=\"".$imgUrl."\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
            </div>";
        echo "</div>";
       
        $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if ($_SESSION["skill2"]==0) 
        {
            $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=2");
            mysqli_stmt_bind_param($sql, 's',$_SESSION["character"]);
        
        }
        else {
           $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE abilityId = ? and type=2");
            mysqli_stmt_bind_param($sql, 's',$_SESSION["skill2"]);
        }
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
        echo 
        "<div class=\"secondSkill__container\">
            <div class=\"char-details__abilities__item\" id=secondSkillSelected2 onmouseover=\"showDescription('skillDesc".$abilityId."')\"
                onmouseout=\"hideDescription('skillDesc".$abilityId."')\" onclick=\"showSkill('secondSkill')\">
                <img src=\"".$imgUrl."\" alt=\"ability 2\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
        </div>";
        $_SESSION["skill2"]=$abilityId;
        $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        $sql=mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=2 and abilityId!=?");
        mysqli_stmt_bind_param($sql, 'ss',$_SESSION["character"],$_SESSION["skill2"]);  
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
    
        echo  " <div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"secondSkill\" onclick=\"changeSkill(2,".$abilityId.")\">
                <img src=\"".$imgUrl."\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
            </div>";
         echo "</div>";
        
         $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
         if ($_SESSION["skill3"]==0) {
            $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=3");
            mysqli_stmt_bind_param($sql, 's',$_SESSION["character"]);
        
         } 
        else {
            $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE abilityId = ? and type=3");
            mysqli_stmt_bind_param($sql, 's',$_SESSION["skill3"]);
        }
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
        echo  "<div class=\"thirdSkill__container\">
            <div class=\"char-details__abilities__item\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"thirdSkillSelected\" onclick=\"showSkill('thirdSkill')\">
                <img src=\"".$imgUrl."\" alt=\"ability 3\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
        </div>";
        $_SESSION["skill3"]=$abilityId;
        $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');    
        $sql=mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=3 and abilityId!=?");
        mysqli_stmt_bind_param($sql, 'ss',$_SESSION["character"],$_SESSION["skill3"]);  
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
        echo  " <div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"thirdSkill\" onclick=\"changeSkill(3,".$abilityId.")\">
                <img src=\"".$imgUrl."\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
            </div>";
        echo "</div>";
        
        $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if ($_SESSION["skill4"]==0) 
        {
            $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=4");
            mysqli_stmt_bind_param($sql, 's',$_SESSION["character"]);
        
        }
        else {
            $sql= mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE abilityId = ? and type=4");
            mysqli_stmt_bind_param($sql, 's',$_SESSION["skill4"]);
        }
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
        echo  "<div class=\"thirdSkill__container\">
                <div class=\"char-details__abilities__item\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"fourthSkillSelected\" onclick=\"showSkill('fourthSkill')\">
                <img src=\"".$imgUrl."\" alt=\"ability 4\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
            </div>";    
        $_SESSION["skill4"]=$abilityId;
        $con->close();
        $sql->close();
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        $sql=mysqli_prepare($con,"SELECT imgUrl,abilityId,name,description FROM `abilities` WHERE charId = ? and type=4 and abilityId!=?");
        mysqli_stmt_bind_param($sql, 'ss',$_SESSION["character"],$_SESSION["skill4"]);  
        $sql->execute();
        $sql->bind_result($imgUrl,$abilityId,$name,$description);
        $sql->fetch() ;
        echo  " <div class=\"char-details__abilities_item_dropDown\" onmouseover=\"showDescription('skillDesc".$abilityId."')\" onmouseout=\"hideDescription('skillDesc".$abilityId."')\"
                id=\"fourthSkill\" onclick=\"changeSkill(4,".$abilityId.")\">
                <img src=\"".$imgUrl."\">
                <p id=\"skillDesc".$abilityId."\" class=\"char-details__skill_description\">".$name."<br>".$description."</p>
            </div>";
        echo "</div>";
        $con->close();
        $sql->close();
        

echo "</div>";
    }
    function userStats(){
       echo "<div class=\"acc-stats__info\" id=\"acc-stats__info\">";
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$con) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
        $sql=mysqli_prepare($con,"SELECT wins,losses,gamesPlayed,money FROM `user` WHERE username= ?");
        mysqli_stmt_bind_param($sql, 's',$_SESSION["username"]);
        $sql->execute();
        $sql->bind_result($wins,$losses,$gamesPlayed,$money);
        $sql->fetch();
        
        echo "<p> Number of won games: ". $wins ."</p>";
        echo  "<p> Number of lost games: ". $losses ."</p>";
        echo  "<p>  Number of played games: ". $gamesPlayed ."</p>";
        echo  "<p>  Money: ". $money."</p>";
    
        mysqli_close($con);
        $sql->close();
        echo "</div>";
    }
    function updateItemsToBuy(){
       
        $con = mysqli_connect('localhost','root','','sundaybrawl');
        if (!$con) {
                     die('Could not connect: ' . mysqli_error($con));
                    }
       
        $sql="SELECT * FROM `items` ";
        $result = mysqli_query($con,$sql);
        while($row = mysqli_fetch_array($result)) {
            $conn = mysqli_connect('localhost','root','','sundaybrawl');
          $sqlUser=mysqli_prepare($conn,"SELECT * FROM asocitems where username=? and itemId=?");
          mysqli_stmt_bind_param($sqlUser, 'si',$_SESSION["username"],$row["id"]);
          $sqlUser->execute();
          $nr=1;
         if ($sqlUser->fetch()==null) {

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
}}
function charDetailsAttDeff($index){
    $con = mysqli_connect('localhost','root','','sundaybrawl');
    if (!$con) {
        die('Could not connect: ' . mysqli_error($con));
    }
    $sql="SELECT att,def FROM `char` WHERE charId =".$index;
    $result = mysqli_query($con,$sql);
    while($row = mysqli_fetch_array($result)) {
    echo " <p>AT:".$row['att']." </p>";
    echo "<p>DEF:".$row['def']."</p>";
    
    }
   mysqli_close($con); 

}
}
?>