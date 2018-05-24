    <?php
                        session_start();
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
