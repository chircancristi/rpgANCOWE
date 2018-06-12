<?php
// Start the session
session_start();
if(!isset($_SESSION['username']) && empty($_SESSION['username'])) {
    header("Location: ../Pages/index.html");
 }


$now = time();
if (isset($_SESSION['discard_after']) && $now > $_SESSION['discard_after']) {

    session_unset();
    session_destroy();
    session_start();
}
$_SESSION['discard_after'] = $now + 3600;
?>
    <!DOCTYPE html>
    <html>

    <head>
        <title>Sunday Brawl</title>
        <link rel="stylesheet" href="../../webroot/css/styles.css">
        <link href="https://fonts.googleapis.com/css?family=Indie+Flower|Itim" rel="stylesheet">
        <script src="../../webroot/js/styles.js"></script>
        
  </head>

  
    <body class="dashboard-body" id="dashboard" onload=" userStats();CharStats();characterBio();updateSkill();showWeapons(); showWeaponsToBuy(); charDetails(1); charDetails(2); charDetails(3); charDetails(4); charDetails(5); charDetails(6)" >
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
                            <div class="characters__item__details__description" id=characters__item__details__description1>
                                
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
                            <div class="characters__item__details__description" id=characters__item__details__description2>
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
                            <div class="characters__item__details__description"  id=characters__item__details__description3>
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
                            <div class="characters__item__details__description"  id=characters__item__details__description4>
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
                            <div class="characters__item__details__description"  id=characters__item__details__description5>
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> COMICS </h4>
                            </div>
                        </div>
                    </div>
                    <div class="characters__item" onclick="HighlightChar(6)" style="cursor: pointer;">
                        <div class="characters__item__portrait">
                            <img src="../../webroot/img/char_portrait_6.jpg">
                        </div>
                        <div class="characters__item__details">
                            <div class="characters__item__details__name">
                                <h4> Goku </h4>
                            </div>
                            <div class="characters__item__details__description"  id=characters__item__details__description6> 
                            </div>
                            <div class="characters__item__details__faction">
                                <h4> ANIME </h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="char-details" id="char-details">
                    <div class="char-details__bio" >
                        <div  class="char-details__bio__header" id="char-details__bio__header" >
                                                     
                        </div>
                    </div>
                    <div class="char-details__stats">
                        <h2>Stats</h2>
                        <ul class="char-details__stats__info" id="char-details__stats__info">

                            
                        </ul>
                    </div>
                    <div class="char-details__abilities">
                        <h2>Abilities</h2>
                        <div class="char-details__abilitie__skills__container" id="char-details__abilities__skills__container">
                        </div>
                    </div>
                    <div class="char-details__equipped-items">
                        <h2>Equipped Items</h2>
                        <div class="char-details__abilities__container" id="char-details__abilities__container">
                        </div>
                    </div>

                </div>
                <div class="items" id="items">
                  
                </div>
                <div class="acc__stats">
                    <a href="..\pages\about.html">
                        <img src="../../webroot/img\logo.png" class="dashbord__header-logo">
                    </a>
                    <div class="start__row">
                        <a onclick="play()" id="play" class="btn btn--play">PLAY</a>
                    </div>
                    <div class="account__stats__row">
                        <h2> Account stats</h2>
                        <div class="acc-stats__info" id="acc-stats__info">
                        </div>
                    </div>

                    <div class="acc__stats__settings">
                        <h2> Settings </h2>

                        <form action="../../Controller/dashboard.php ?q=1" method="post" class="acc-actions__info">
                            <p> Change username:
                                <input pattern="[A-Za-z0-9]+" placeholder="Add new username " type="text" name="newUsername">
                            </p>
                            <p> Change email:
                                <input pattern="[A-Za-z0-9._]+@[a-zA-Z]+\.[a-zA-Z]+" placeholder="Add new email " type="text" name="newMail"> </p>
                            <p> Change password:
                                <input pattern="[A-Za-z0-9]+" placeholder="Add new password " type="password" name="newPassword"> </p>
                            <p> Confirm password:
                                <input pattern="[A-Za-z0-9]+" placeholder="Confirm password " type="password" name="newPasswordComfirm"> </p>

                            <span class="acc-actions">
                                <button type="submit" class="btn"> Submit Changes </button>

                                <button type="button" class="btn btn--danger" onclick="eraseAcc(<?php echo "'".$_SESSION['username']."'";?>)"> Erase Account </button>
                            </span>
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
                            <button type="submit" class="btn btn--danger account__utility__logOutbutton"> Log out </button>
                        </form>
                    </div>
                    
                </div>
            </div>
        </div>
       
    </body>


    </html>