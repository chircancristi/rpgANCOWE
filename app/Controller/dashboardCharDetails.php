<!DOCTYPE html>
<html>
<head>
<style>

</style>
</head>
<body>

 <div class="char-details" >
                <div class="char-details__bio" >
                    <div class="char-details__bio__header">
                        
                        <?php
                        $q = intval($_GET['q']);
                        $con = mysqli_connect('localhost','root','','sundaybrawl');
                        if (!$con) {
                                     die('Could not connect: ' . mysqli_error($con));
                                    }
                       
                        $sql="SELECT name,imgUrl,bio FROM `char` WHERE charId = '".$q."'";
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
                        
                        <li>Level:
                            <span>20</span>
                        </li>
                        <li>Attack:
                            <span>90</span>
                        </li>
                        <li>Defense:
                            <span>30</span>
                        </li>
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
</body>
</html>