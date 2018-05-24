<?php
// Start the session
session_start();
?>
    <!DOCTYPE html>
    <html>

    <head>
        <style>
        </style>
    </head>

    <body>

                <div class="char-details__bio__header" id="char-details__bio__header">

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
                            echo " <p class=\"char-details__bio__description\">".$row['bio']."</p>"; 
                        }
                        mysqli_close($con);
                        ?>

                </div>
               
          
    </body>

    </html>
    <?php
$q = intval($_GET['q']);
$_SESSION["character"]=$q;
?>