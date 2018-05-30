<?php
session_start();

$conn = mysqli_connect("localhost", "root", "", "sundaybrawl");

$sql = "SELECT * FROM char where charId = '".$_SESSION["caracter"]."'";

$row = mysqli_fetch_assoc(mysqli_query($conn, $sql));

$userData->index = 0;
$userData->username = $_SESSION["username"];
$userData->caracter = $_SESSION["character"];
$userData->skill1 = $_SESSION["stkill1"];
$userData->skill2 = $_SESSION["stkill2"];
$userData->skill3 = $_SESSION["stkill3"];
$userData->skill4 = $_SESSION["stkill4"];
$userData->att = $_SESSION["weapon"] + $row[att];
$userData->def = $_SESSION["armor"] + $row[def];

$myJSON = json_encode($userData);

echo $myJSON;
echo "<script> </script>"
?>