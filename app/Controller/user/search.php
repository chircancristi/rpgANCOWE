<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Config/database.php';
include_once '../../Model/user.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$user = new user($db);
 
// get keywords

$where = "";


if(isset($_GET["username"])){
    $where.= " username like '%".$_GET["username"]."%'";
}


if(isset($_GET["moneyBoundUpp"]) || isset($_GET["moneyBoundLow"])){
    if(strcmp($where,"") != 0){
        $where .= " and";
    }
    if(isset($_GET["moneyBoundUpp"]) && isset($_GET["moneyBoundLow"])){
        $where .= " money between " . $_GET["moneyBoundLow"] . " and " . $_GET["moneyBoundUpp"];
    } else if (isset($_GET["moneyBoundUpp"])){
        $where .= " money <= ". $_GET["moneyBoundUpp"];
    } else {
        $where .= " money >= ". $_GET["moneyBoundLow"];
    }
} else {
    if(isset($_GET["money"])){
        if(strcmp($where,"") != 0){
            $where .= " and";
        }
        $where.= " money = " . $_GET["money"];
    }
}

if(isset($_GET["winsBoundUpp"]) || isset($_GET["winsBoundLow"])){
    if(strcmp($where,"") != 0){
        $where .= " and";
    }
    if(isset($_GET["winsBoundUpp"]) && isset($_GET["winsBoundLow"])){
        $where .= " wins between " . $_GET["winsBoundLow"] . " and " . $_GET["winsBoundUpp"];
    } else if (isset($_GET["winsBoundUpp"])){
        $where .= " wins <= ". $_GET["winsBoundUpp"];
    } else {
        $where .= " wins >= ". $_GET["winsBoundLow"];
    }
} else {
    if(isset($_GET["wins"])){
        if(strcmp($where,"") != 0){
            $where .= " and";
        }
        $where.= " wins = " . $_GET["wins"];
    }
}

if(isset($_GET["lossesBoundUpp"]) || isset($_GET["lossesBoundLow"])){
    if(isset($_GET["lossesBoundUpp"]) && isset($_GET["lossesBoundLow"])){
        $where .= " and losses between " . $_GET["lossesBoundLow"] . " and " . $_GET["lossesBoundUpp"];
    } else if (isset($_GET["lossesBoundUpp"])){
        $where .= " and losses <= ". $_GET["lossesBoundUpp"];
    } else {
        $where .= " and losses >= ". $_GET["lossesBoundLow"];
    }
} else {
    if(isset($_GET["losses"])){
        $where.= " and losses = " . $_GET["losses"];
    }
}

if(isset($_GET["gamesPlayedBoundUpp"]) || isset($_GET["gamesPlayedBoundLow"])){
    if(isset($_GET["gamesPlayedBoundUpp"]) && isset($_GET["gamesPlayedBoundLow"])){
        $where .= " and gamesPlayed between " . $_GET["gamesPlayedBoundLow"] . " and " . $_GET["gamesPlayedBoundUpp"];
    } else if (isset($_GET["gamesPlayedBoundUpp"])){
        $where .= " and gamesPlayed <= ". $_GET["gamesPlayedBoundUpp"];
    } else {
        $where .= " and gamesPlayed >= ". $_GET["gamesPlayedBoundLow"];
    }
} else {
    if(isset($_GET["gamesPlayed"])){
        $where.= " and gamesPlayed = " . $_GET["gamesPlayed"];
    }
}
// query products
$stmt = $user->search($where);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $users_arr=array();
    $users_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $single_user=array(
            "username" => $username,
            "money" => $money,
            "wins" => $wins,
            "losses" => $losses,
            "gamesPlayed" => $gamesPlayed
        );
 
        array_push($users_arr["records"], $single_user);
    }
 
    echo json_encode($users_arr);
}
 
else{
    echo json_encode(
        array("message" => "No users found.")
    );
}
?>