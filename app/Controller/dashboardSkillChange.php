<?php
// Start the session
session_start();
switch ($_GET['q']) {
    case 1:
         $_SESSION["skill1"]=intval($_GET['t']);
        break;
    case 2:
        $_SESSION["skill2"]=intval($_GET['t']);
        break;
    case 3:
        $_SESSION["skill3"]=intval($_GET['t']);
        break;
    case 4:
        $_SESSION["skill4"]=intval($_GET['t']);
        break;
    default:
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
                id=\"fourthSkill\" onclick=\"changeSkill('4,".$row["abilityId"]."')\">
                <img src=\"".$row["ImgUrl"]."\">
                <p id=\"skillDesc".$row["abilityId"]."\" class=\"char-details__skill_description\">".$row["name"]."<br>".$row["description"]."</p>
            </div>";
         echo "</div>";
        

echo "</div>";
        
}
?>

