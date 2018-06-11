<?php
require_once dirname(__DIR__) . '/vendor/autoload.php';

use Chadicus\Marvel\Api\Client;

$publicApiKey = 'dd3809e92966ca52dd4b7bb01059d314';
$privateApiKey = '7310a9cbe6a1b82be9fb9a795201fee2b1d827e3';

$conn = mysqli_connect("localhost", "root", "", "sundaybrawl");

$client = new Client($privateApiKey, $publicApiKey);

//hulk
mysqli_query($conn, 
"UPDATE `char` SET `bio` = '"
.(($client->get('characters', 1009351))->getData()->getResults()[0])->getDescription().
 "' WHERE `char`.`charId` = 1");

 //spiderman
 mysqli_query($conn, 
 "UPDATE `char` SET `bio` = '"
 .(($client->get('characters', 1009610))->getData()->getResults()[0])->getDescription().
  "' WHERE `char`.`charId` = 3")
?>

