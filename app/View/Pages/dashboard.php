<?php
// Start the session
session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Sunday Brawl</title>
        <link rel="stylesheet" href="../../webroot/css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Itim" rel="stylesheet">
    </head>
    <script src="../../webroot/js/styles.js"></script>

    <body class="dashboard-body">
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
                        <div class="char-details__bio__header">

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
                            echo "</div> <p class=\"char-details__bio__description\">".$row['bio']."</p>"; 
                        }
                        mysqli_close($con);
                        ?>

                        </div>
                        <div class="char-details__stats">
                            <h2>Stats</h2>
                            <ul class="char-details__stats__info">

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
                        echo "<li>Attack:
                        <span>".$row["att"]."</span>
                        </li>";
                         echo"<li>Defense:
                        <span>".$row["def"]."</span>
                         </li>";
                        }
                        mysqli_close($con);
                        ?>

                            </ul>
                        </div>
                        <div class="char-details__abilities">
                            <h2>Abilities</h2>
                            <div class="char-details__abilities__container">
                                <div class="firstSkill__container">
                                    <div class="char-details__abilities__item" onmouseover="showDescription('selection1__firstSkill__desc2')" onmouseout="hideDescription('selection1__firstSkill__desc2')"
                                        id="firstSkillSelected2" onclick="showSkill('firstSkill2')">
                                        <img src="../../webroot/img/ability1.png" alt="ability 1">
                                        <p id="selection1__firstSkill__desc2" class="char-details__skill_description">First skill description</p>
                                    </div>
                                    <div class="char-details__abilities_item_dropDown" onmouseover="showDescription('selection1__secondSkill__desc2')" onmouseout="hideDescription('selection1__secondSkill__desc2')"
                                        id="firstSkill2" onclick="changeSkill('firstSkillSelected2','firstSkill2')">
                                        <img src="../../webroot/img/ability4.png">
                                        <p id="selection1__secondSkill__desc2" class="char-details__skill_description">Second skill description</p>
                                    </div>
                                </div>
                                <div class="secondSkill__container">
                                    <div class="char-details__abilities__item" id=secondSkillSelected2 onmouseover="showDescription('selection2__firstSkill__desc2')"
                                        onmouseout="hideDescription('selection2__firstSkill__desc2')" onclick="showSkill('secondSkill2')">
                                        <img src="../../webroot/img/ability2.png" alt="ability 2">
                                        <p id="selection2__firstSkill__desc2" class="char-details__skill_description">First skill description</p>
                                    </div>
                                    <div class="char-details__abilities_item_dropDown" onmouseover="showDescription('selection2__secondSkill__desc2')" onmouseout="hideDescription('selection2__secondSkill__desc2')"
                                        id="secondSkill2" onclick="changeSkill('secondSkillSelected2','secondSkill2')">
                                        <img src="../../webroot/img/ability4.png">
                                        <p id="selection2__secondSkill__desc2" class="char-details__skill_description">Second skill description</p>
                                    </div>
                                </div>
                                <div class="thirdSkill__container">
                                    <div class="char-details__abilities__item" onmouseover="showDescription('selection3__firstSkill__desc2')" onmouseout="hideDescription('selection3__firstSkill__desc2')"
                                        id="thirdSkillSelected2" onclick="showSkill('thirdSkill2')">
                                        <img src="../../webroot/img/ability3.png" alt="ability 3">
                                        <p id="selection3__firstSkill__desc2" class="char-details__skill_description">First skill description</p>
                                    </div>
                                    <div class="char-details__abilities_item_dropDown" onmouseover="showDescription('selection3__secondSkill__desc2')" onmouseout="hideDescription('selection3__secondSkill__desc2')"
                                        id="thirdSkill2" onclick="changeSkill('thirdSkillSelected2','thirdSkill2')">
                                        <img src="../../webroot/img/ability4.png">
                                        <p id="selection3__secondSkill__desc2" class="char-details__skill_description">Second skill description</p>
                                    </div>
                                </div>
                                <div class="thirdSkill__container">
                                    <div class="char-details__abilities__item" onmouseover="showDescription('selection4__firstSkill__desc2')" onmouseout="hideDescription('selection4__firstSkill__desc2')"
                                        id="fourthSkillSelected2" onclick="showSkill('fourthSkill2')">
                                        <img src="../../webroot/img/ability4.png" alt="ability 4">
                                        <p id="selection4__firstSkill__desc2" class="char-details__skill_description">First skill description</p>
                                    </div>

                                    <div class="char-details__abilities_item_dropDown" onmouseover="showDescription('selection4__secondSkill__desc2')" onmouseout="hideDescription('selection4__secondSkill__desc2')"
                                        id="fourthSkill2" onclick="changeSkill('fourthSkillSelected2','fourthSkill2')">
                                        <img src="../../webroot/img/ability2.png">
                                        <p id="selection4__secondSkill__desc2" class="char-details__skill_description">Second skill description</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="char-details__equipped-items">
                            <h2>Equipped Items</h2>
                            <div class="char-details__abilities__container">
                                <div class="weapon__container">
                                    <div class="char-details__items__item" onmouseover="showDescription('selection1__firstWeapon__desc')" onmouseout="hideDescription('selection1__firstWeapon__desc')"
                                        id=firstWeaponSelected onclick="showSkill('firstWeapon')">
                                        <img src="../../webroot/img/weapon1.jpg" alt="ability 1">
                                        <p id="selection1__firstWeapon__desc" class="char-details__item_description">Knife item</p>
                                    </div>
                                    <div class="char-details__items_item_dropDown" onmouseover="showDescription('selection1__secondWeapon__desc')" onmouseout="hideDescription('selection1__secondWeapon__desc')"
                                        id=firstWeapon onclick="changeSkillWeapons('firstWeaponSelected','firstWeapon')">
                                        <img src="../../webroot/img/weapon2.jpg">
                                        <p id="selection1__secondWeapon__desc" class="char-details__item_description">Hammer item</p>
                                    </div>
                                </div>
                                <div class="armor__container">
                                    <div class="char-details__items__item" id=armorSelected onmouseover="showDescription('selection2__firstArmor__desc')" onmouseout="hideDescription('selection2__firstArmor__desc')"
                                        onclick="showSkill('armor')">
                                        <img src="../../webroot/img/armor.jpg" alt="ability 2">
                                        <p id="selection2__firstArmor__desc" class="char-details__item_description">Armor 1</p>
                                    </div>
                                    <div class="char-details__items_item_dropDown" onmouseover="showDescription('selection2__secondArmor__desc')" onmouseout="hideDescription('selection2__secondArmor__desc')"
                                        id=armor onclick="changeSkillWeapons('armorSelected','armor')">
                                        <img src="../../webroot/img/armor2.jpg">
                                        <p id="selection2__secondArmor__desc" class="char-details__item_description">Armor 2</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="items">
                        <div class="items__item__container">
                            <div class="items__item">
                                <div class="items__item__icon">
                                    <img src="../../webroot/img\item_icon.png">
                                </div>
                                <div class="items__item__details">
                                    <div class="items__item__details__name">
                                        <h4> NAME </h4>
                                    </div>
                                    <div class="items__item__details__description">
                                        <p>AT:</p>
                                        <p>DEF:</p>
                                    </div>
                                </div>
                            </div>
                            <div class="items__item__buy">
                                <p class="items__item__buy__cost">
                                    835
                                    <span>
                                        <img src="../../webroot/img\money-bag.png">
                                    </span>
                                </p>
                                <button class="btn btn--buy">BUY</button>
                            </div>
                        </div>
                        <div class="items__item__container">
                            <div class="items__item">
                                <div class="items__item__icon">
                                    <img src="../../webroot/img\item_icon.png">
                                </div>
                                <div class="items__item__details">
                                    <div class="items__item__details__name">
                                        <h4> NAME </h4>
                                    </div>
                                    <div class="items__item__details__description">
                                        <p>AT:</p>
                                        <p>DEF:</p>
                                    </div>
                                </div>
                            </div>
                            <div class="items__item__buy">
                                <p class="items__item__buy__cost">
                                    835
                                    <span>
                                        <img src="../../webroot/img\money-bag.png">
                                    </span>
                                </p>
                                <button class="btn btn--buy">BUY</button>
                            </div>
                        </div>
                    </div>
                    <div class="acc__stats">
                        <div class="start__row">
                            <a href="../page/play.html" class="btn btn--play">PLAY</a>
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
                    }
                    mysqli_close($con);
                    ?>

                            </div>
                        </div>

                        <div class="acc__stats__settings">
                            <h2> Settings </h2>

                            <div class="acc-actions__info">
                                <p> Change username:
                                    <input pattern="[A-Za-z1-9]" placeholder="Add new username " type="text" name="newUsername">
                                </p>
                                <p> Change email:
                                    <input pattern="[A-Za-z1-9]" placeholder="Add new mail " type="text" name="newMail"> </p>
                                <p> Change password:
                                    <input pattern="[A-Za-z1-9]" placeholder="Add new password " type="password" name="newPassword"> </p>
                                <p> Comfirm password:
                                    <input pattern="[A-Za-z1-9]" placeholder="Add new password " type="password" name="newPasswordComfirm"> </p>
                            </div>

                            <div class="acc-actions__info--mobile">
                                <input pattern="[A-Za-z1-9]" placeholder="Add new username " type="text" name="newUsername">
                                <input pattern="[A-Za-z1-9]" placeholder="Add new mail " type="text" name="newMail">
                                <input pattern="[A-Za-z1-9]" placeholder="Add new password " type="password" name="newPassword">
                                <input pattern="[A-Za-z1-9]" placeholder="Add new password " type="password" name="newPasswordComfirm">
                            </div>
                            <div class="acc-actions">
                                <button class="btn"> Submit Changes </button>
                                <button class="btn btn--danger"> Erase Account </button>
                            </div>
                        </div>
                        <div class="account__utility__row">
                            <form action="../../Controller/logOut.php" class="account__utility__logOut">
                                <button type="submit" class="account__utility__logOutbutton"> Log out </button>
                            </form>
                        </div>
                        <a href="..\pages\about.html">
                            <img src="../../webroot/img\logo.png" class="dashbord__header-logo">
                        </a>

                    </div>
                </div>
            </div>
    </body>


    </html>