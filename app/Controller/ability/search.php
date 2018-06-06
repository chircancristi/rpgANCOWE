<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
 
// include database and object files
include_once '../../Config/database.php';
include_once '../../Model/ability.php';
 
// instantiate database and product object
$database = new Database();
$db = $database->getConnection();
 
// initialize object
$ability = new ability($db);
 
// get keywords

$where = "1=1";
if(isset($_GET["abilityIdBoundUpp"]) || isset($_GET["abilityIdBoundLow"])){
    if(isset($_GET["abilityIdBoundUpp"]) && isset($_GET["abilityIdBoundLow"])){
        $where .= " and abilityId between " . $_GET["abilityIdBoundLow"] . " and " . $_GET["abilityIdBoundUpp"];
    } else if (isset($_GET["abilityIdBoundUpp"])){
        $where .= " and abilityId <= ". $_GET["abilityIdBoundUpp"];
    } else {
        $where .= " and abilityId >= ". $_GET["abilityIdBoundLow"];
    }
} else {
    if(isset($_GET["abilityId"])){
        $where.= " and abilityId = " . $_GET["abilityId"];
    }
}

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

if(isset($_GET["description"])){
    $where.= " and description like '%".$_GET["description"] . "%'";
}

if(isset($_GET["name"])){
     $where.= " and name like '%".$_GET["name"]."%'";
}
 

if(isset($_GET["imgUrl"])){
    $where.= " and imgUrl like '%".$_GET["imgUrl"]."%'";
}

if(isset($_GET["type"])){
    $where.= " and type = ".$_GET["type"];
}

if(isset($_GET["healBoundUpp"]) || isset($_GET["healBoundLow"])){
    if(isset($_GET["healBoundUpp"]) && isset($_GET["healBoundLow"])){
        $where .= " and heal between " . $_GET["healBoundLow"] . " and " . $_GET["healBoundUpp"];
    } else if (isset($_GET["healBoundUpp"])){
        $where .= " and heal <= ". $_GET["healBoundUpp"];
    } else {
        $where .= " and heal >= ". $_GET["healBoundLow"];
    }
} else {
    if(isset($_GET["heal"])){
        $where.= " and heal = " . $_GET["heal"];
    }
}

if(isset($_GET["dmgBoundUpp"]) || isset($_GET["dmgBoundLow"])){
    if(isset($_GET["dmgBoundUpp"]) && isset($_GET["dmgBoundLow"])){
        $where .= " and dmg between " . $_GET["dmgBoundLow"] . " and " . $_GET["dmgBoundUpp"];
    } else if (isset($_GET["dmgBoundUpp"])){
        $where .= " and dmg <= ". $_GET["dmgBoundUpp"];
    } else {
        $where .= " and dmg >= ". $_GET["dmgBoundLow"];
    }
} else {
    if(isset($_GET["dmg"])){
        $where.= " and dmg = " . $_GET["dmg"];
    }
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
$stmt = $ability->search($where);
$num = $stmt->rowCount();
 
// check if more than 0 record found
if($num>0){
 
    // products array
    $abilities_arr=array();
    $abilities_arr["records"]=array();
 
    // retrieve our table contents
    // fetch() is faster than fetchAll()
    // http://stackoverflow.com/questions/2770630/pdofetchall-vs-pdofetch-in-a-loop
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        // extract row
        // this will make $row['name'] to
        // just $name only
        extract($row);
 
        $single_ability=array(
            "abilityId" => $abilityId,
            "charId" => $charId,
            "description" => $description,
            "name" => $name,
            "type" => $type,
            "imgUrl" => $imgUrl,
            "heal" => $heal,
            "dmg" => $dmg,
            "att" => $att,
            "def" => $def
        );
 
        array_push($abilities_arr["records"], $single_ability);
    }
 
    echo json_encode($abilities_arr);
}
 
else{
    echo json_encode(
        array("message" => "No ability found.")
    );
}
?>