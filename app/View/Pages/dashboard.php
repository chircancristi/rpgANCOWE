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
                            <php
                            <p>AT: 20</p>
                            <p>DEF: 23</p>
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
                          
                            <p>AT: 18</p>
                            <p>DEF:21</p>
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
                           
                            <p>AT:20</p>
                            <p>DEF:20</p>
                        </div>
                        <div class="characters__item__details__faction">
                            <h4>  COMICS </h4>
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
                               
                                <p>AT:21</p>
                                <p>DEF:24</p>
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
                                   
                                    <p>AT:15</p>
                                    <p>DEF:13</p>
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
                          
                            <p>AT:22</p>
                            <p>DEF:25</p>
                        </div>
                        <div class="characters__item__details__faction">
                            <h4> ANIME </h4>
                        </div>
                    </div>
                </div>
            </div>
            <div class="char-details" id="char-details">
                   <script> HighlightChar(1);</script> 
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
                        <script>  getStats(); </script> 
                       
                    </div>
                </div>

                <div class="acc__stats__settings">
                    <h2> Settings </h2>

                    <div class="acc-actions__info">
                        <p> Change username:
                                <input pattern="[A-Za-z1-9]" placeholder="Add new username " type="text" name="newUsername"></p>
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
                <a href="..\pages\about.html" > 
                        <img   src="../../webroot/img\logo.png" class="dashbord__header-logo">
                </a>

            </div>
        </div>
    </div>
</body>


</html>