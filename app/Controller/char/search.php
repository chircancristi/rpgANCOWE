<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Config/database.php';
include_once '../../Model/char.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$char = new char($db);
 
// get keywords

$where = "1=1";

if(isset($_GET["charIdBoundUpp"]) || isset($_GET["charIdBoundLow"])){
    if(isset($_GET["charIdBoundUpp"]) && isset($_GET["charIdBoundLow"])){
        $where .= " and charId between " . $_GET["charIdBoundLow"] . " and " . $_GET["charIdBoundUpp"];
    } else if (isset($_GET["charIdBoundUpp"])){
        $where .= " and charId <= ". $_GET["charIdBoundUpp"];
    } else {
        $where .= " and charId >= ". $_GET["charIdBoundLow"];
    }
} else {
    if(isset($_GET["charId"])){
        $where.= " and charId = " . $_GET["charId"];
    }
}

if(isset($_GET["name"])){
     $where.= " and name like '%".$_GET["name"]."%'";
}
 
if(isset($_GET["bio"])){
    $where.= " and bio like '%".$_GET["bio"] . "%'";
}

if(isset($_GET["imgUrl"])){
    $where.= " and imgUrl like '%".$_GET["imgUrl"]."%'";
}

if(isset($_GET["attBoundUpp"]) || isset($_GET["attBoundLow"])){
    if(isset($_GET["attBoundUpp"]) && isset($_GET["attBoundLow"])){
        $where .= " and att between " . $_GET["attBoundLow"] . " and " . $_GET["attBoundUpp"];
    } else if (isset($_GET["attBoundUpp"])){
        $where .= " and att <= ". $_GET["attBoundUpp"];
    } else {
        $where .= " and att >= ". $_GET["attBoundLow"];
    }
} else {
    if(isset($_GET["att"])){
        $where.= " and att = " . $_GET["att"];
    }
}

if(isset($_GET["defBoundUpp"]) || isset($_GET["defBoundLow"])){
    if(isset($_GET["defBoundUpp"]) && isset($_GET["defBoundLow"])){
        $where .= " and def between " . $_GET["defBoundLow"] . " and " . $_GET["defBoundUpp"];
    } else if (isset($_GET["defBoundUpp"])){
        $where .= " and def <= ". $_GET["defBoundUpp"];
    } else {
        $where .= " and def >= ". $_GET["defBoundLow"];
    }
} else {
    if(isset($_GET["def"])){
        $where.= " and def = " . $_GET["def"];
    }
}
// query products
$stmt = $char->search($where);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $chars_arr=array();
    $chars_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $single_char=array(
            "charId" => $charId,
            "name" => $name,
            "imgUrl" => $imgUrl,
            "att" => $att,
            "def" => $def
        );
 
        array_push($chars_arr["records"], $single_char);
    }
 
    echo json_encode($chars_arr);
}
 
else{
    echo json_encode(
        array("message" => "No character found.")
    );
}
?>