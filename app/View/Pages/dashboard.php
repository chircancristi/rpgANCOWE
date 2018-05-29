<?php
// Start the session
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../Pages/index.html");
 }
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Sunday Brawl</title>
        <link rel="stylesheet" href="../../webroot/css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Itim" rel="stylesheet">
    </head>


    <body class="dashboard-body" id="dashboard">

        <div class="container">
            <div class="grid-container">
                <div class="characters">
                    <div class="characters__item" onclick="HighlightChar(1)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img\char_portrait_1.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> THE HULK </h4>
                            </div>
                            <div class="characters__item__details__description">
                                <?php
                                $con = mysqli_connect('localhost','root','','sundaybrawl');
                                 if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                                 $sql="SELECT att,def FROM `char` WHERE charId = 1";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_array($result)) {
                                    echo " <p>AT:".$row['att']." </p>";
                                    echo "<p>DEF:".$row['def']."</p>";
                                   
                                 }
                                mysqli_close($con);
                                ?>

                            </div>
                            <div class="characters__item__details__faction">
                                <h4> COMICS </h4>
                            </div>
                        </div>
                    </div>
                    <div class="characters__item" onclick="HighlightChar(2)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img\char_portrait_2.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> NARUTO </h4>
                            </div>
                            <div class="characters__item__details__description">
                                <?php
                                $con = mysqli_connect('localhost','root','','sundaybrawl');
                                 if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                                 $sql="SELECT att,def FROM `char` WHERE charId = 2";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_array($result)) {
                                    echo " <p>AT:".$row['att']." </p>";
                                    echo "<p>DEF:".$row['def']."</p>";
                                   
                                 }
                                mysqli_close($con);
                                ?>
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> ANIME </h4>
                            </div>
                        </div>
                    </div>
                    <div class="characters__item" onclick="HighlightChar(3)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img\char_portrait_3.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> SPIDERMAN </h4>
                            </div>
                            <div class="characters__item__details__description">
                                <?php
                                $con = mysqli_connect('localhost','root','','sundaybrawl');
                                 if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                                 $sql="SELECT att,def FROM `char` WHERE charId = 3";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_array($result)) {
                                    echo " <p>AT:".$row['att']." </p>";
                                    echo "<p>DEF:".$row['def']."</p>";
                                   
                                 }
                                mysqli_close($con);
                                ?>
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> COMICS </h4>
                            </div>
                        </div>
                    </div>
                    <div class="characters__item" onclick="HighlightChar(4)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img\char_portrait_4.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> SUPERMAN </h4>
                            </div>
                            <div class="characters__item__details__description">

                                <?php
                                $con = mysqli_connect('localhost','root','','sundaybrawl');
                                 if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                                 $sql="SELECT att,def FROM `char` WHERE charId = 4";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_array($result)) {
                                    echo " <p>AT:".$row['att']." </p>";
                                    echo "<p>DEF:".$row['def']."</p>";
                                   
                                 }
                                mysqli_close($con);
                                ?>
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> COMICS </h4>
                            </div>
                        </div>
                    </div>
                    <div class="characters__item" onclick="HighlightChar(5)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img\char_portrait_5.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> Eren Jaeger </h4>
                            </div>
                            <div class="characters__item__details__description">
                                <?php
                                $con = mysqli_connect('localhost','root','','sundaybrawl');
                                 if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                                 $sql="SELECT att,def FROM `char` WHERE charId = 5";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_array($result)) {
                                    echo " <p>AT:".$row['att']." </p>";
                                    echo "<p>DEF:".$row['def']."</p>";
                                   
                                 }
                                mysqli_close($con);
                                ?>
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> COMICS </h4>
                            </div>
                        </div>
                    </div>
                    <div class="characters__item" onclick="HighlightChar(6)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img\char_portrait_6.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> Goku </h4>
                            </div>
                            <div class="characters__item__details__description">
                                <?php
                                $con = mysqli_connect('localhost','root','','sundaybrawl');
                                 if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                                 $sql="SELECT att,def FROM `char` WHERE charId = 6";
                                 $result = mysqli_query($con,$sql);
                                 while($row = mysqli_fetch_array($result)) {
                                    echo " <p>AT:".$row['att']." </p>";
                                    echo "<p>DEF:".$row['def']."</p>";
                                   
                                 }
                                mysqli_close($con);
                                ?>
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> ANIME </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="char-details" id="char-details">
                    <div class="char-details__bio">
                        <div class="char-details__bio__header" id="char-details__bio__header">

                            <?php
                        
                        $con = mysqli_connect('localhost','root','','sundaybrawl');
                        if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                       
                        $sql="SELECT name,imgUrl,bio FROM `char` WHERE charId = '".$_SESSION["character"]."'";
                        $result = mysqli_query($con,$sql);
                        while($row = mysqli_fetch_array($result)) {
                            echo "<img src=\"".$row['imgUrl']." \" alt=\"character portrait\" class=\"char-details__bio__portrait\">";
                            echo "<h2>".$row['name']."</h2>";
                            echo " <p class=\"char-details__bio__description\">".$row['bio']."</p>"; 
                        }
                        mysqli_close($con);
                        ?>
                        </div>
                    </div>
                    <div class="char-details__stats">
                        <h2>Stats</h2>
                        <ul class="char-details__stats__info" id="char-details__stats__info">

                            <?php
                        
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
                        ?>

                        </ul>
                    </div>
                    <div class="char-details__abilities">
                        <h2>Abilities</h2>
                        <div class="char-details__abilitie__skills__container" id="char-details__abilities__skills__container">

                            <?php
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
                                ?>

                        </div>
                    </div>
                    <div class="char-details__equipped-items">
                        <h2>Equipped Items</h2>
                        <div class="char-details__abilities__container" id="char-details__abilities__container">
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
                                        echo "<div class=\"char-details__items__item\"  onmouseover=\"showDescription('armorDesc".$row2["id"]."')\" onmouseout=\"showDescription('armorDesc".$row2["id"]."')\" onclick=\"showArmor('')\">
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
                    </div>

                </div>
                <div class="items" id="items">
                    <?php
                      $con = mysqli_connect('localhost','root','','sundaybrawl');
                      if (!$con) {
                                   die('Could not connect: ' . mysqli_error($con));
                                  }
                     
                      $sql="SELECT * FROM `items` ";
                      $result = mysqli_query($con,$sql);
                      while($row = mysqli_fetch_array($result)) {
                    
                        $sqlUser="SELECT * FROM `asocitems`  where username='".$_SESSION["username"]."' and itemId=".$row["id"];
                        
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
                </div>
                <div class="acc__stats">
                    <div class="start__row">
                        <a onclick="play()" id="play" class="btn btn--play">PLAY</a>
                    </div>
                    <div class="account__stats__row">
                        <h2> Account stats</h2>
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
                       echo  "<p>  Money: ". $row['money'] ."</p>";
                    }
                    mysqli_close($con);
                    ?>

                        </div>
                    </div>

                    <div class="acc__stats__settings">
                        <h2> Settings </h2>

                        <form action="../../Controller/dashboard.php ?q=1" method="post" class="acc-actions__info">
                            <p> Change username:
                                <input pattern="[A-Za-z0-9]+" placeholder="Add new username " type="text" name="newUsername">
                            </p>
                            <p> Change email:
                                <input pattern="[A-Za-z0-9._]+@[a-zA-Z]+\.[a-zA-Z]+" placeholder="Add new mail " type="text" name="newMail"> </p>
                            <p> Change password:
                                <input pattern="[A-Za-z0-9]+" placeholder="Add new password " type="password" name="newPassword"> </p>
                            <p> Comfirm password:
                                <input pattern="[A-Za-z0-9]+" placeholder="Add new password " type="password" name="newPasswordComfirm"> </p>

                            <span class="acc-actions">
                                <button type="submit" class="btn"> Submit Changes </button>

                                <button type="button" class="btn btn--danger" onclick="eraseAcc(<?php echo "'".$_SESSION['username']."'";?>)"> Erase Account </button>
                        </form>

                        <form action="../../Controller/dashboard.php ?q=1" method="post" class="acc-actions__info--mobile">
                            <input pattern="[A-Za-z0-9]+" placeholder="Add new username " type="text" name="newUsername">
                            <input pattern="[A-Za-z0-9._]+@[a-zA-Z]+\.[a-zA-Z]+" placeholder="Add new mail " type="text" name="newMail">
                            <input pattern="[A-Za-z0-9]+" placeholder="Add new password " type="password" name="newPassword">
                            <input pattern="[A-Za-z0-9]+" placeholder="Add new password " type="password" name="newPasswordComfirm">

                            <span class="acc-actions">
                                <button type="submit" class="btn"> Submit Changes </button>
                                <button type="button" class="btn btn--danger" onclick="eraseAcc()"> Erase Account </button>
                            </span>
                        </form>

                    </div>
                    <div class="account__utility__row">
                        <form action="../../Controller/login.php" class="account__utility__logOut">
                            <button type="submit" class="account__utility__logOutbutton"> Log out </button>
                        </form>
                    </div>
                    <a href="..\pages\about.html">
                        <img src="../../webroot/img\logo.png" class="dashbord__header-logo">
                    </a>

                </div>
            </div>
        </div>
        <script src="../../webroot/js/styles.js"></script>
    </body>


    </html>