<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php
    $username="alex";
    $password="123";
    echo $_POST["Username"]  ;
    if ($_POST["username"]==$username  &&  $_POST["password"]==$password){
    header("Location: ./dashboard.html");
    }
?>    
</body>
</html>


