<?php
session_start();
class play {
    function sentUserData ($index)
	{
		
		$_SESSION["health"]=100;
		$_SESSION["opponentsHealth"]=100;
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select id,usernamePlayer1,usernamePlayer2 from gamesinprogress");
		$sql->bind_result($game,$player1,$player2);
		if ($sql->execute()==false) die("Error creating account");
		$sql->fetch();
		$sql->close();
		$conn->close();

		if ($player1=="0"){
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =mysqli_prepare($conn,"Update  gamesinprogress set usernamePlayer1=? where id=?");
			mysqli_stmt_bind_param($sql, 'si',$_SESSION["username"],$game);
			if ($sql->execute()==false) die("Error creating account");
			$conn->close();
			$sql->close();
		}
		else{
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =mysqli_prepare($conn,"Update  gamesinprogress set usernamePlayer2=? where id=?");
			mysqli_stmt_bind_param($sql, 'si',$_SESSION["username"],$game);
			if ($sql->execute()==false) die("Error creating account");
			$conn->close();
			$sql->close();
		} 
		  
	
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql = mysqli_prepare($conn,"SELECT att,def FROM `char` where charId = ?");
		$idCh=$_SESSION["character"];
		mysqli_stmt_bind_param($sql, 'i',$idCh);
		$sql->execute();
		$sql->bind_result($att,$def);
		$sql->fetch();
		$sql->close();
		$sql = mysqli_prepare($conn,"SELECT att,def FROM `items` where id = ?");
		$idCh=$_SESSION["weapon"];
		mysqli_stmt_bind_param($sql, 'i',$idCh);
		$sql->execute();
		$sql->bind_result($attW,$defW);
		$sql->fetch();
		$sql->close();
		$sql = mysqli_prepare($conn,"SELECT att,def FROM `items` where id = ?");
		$idCh=$_SESSION["armor"];
		mysqli_stmt_bind_param($sql, 'i',$idCh);
		$sql->execute();
		$sql->bind_result($attA,$defA);
		$sql->fetch();
		$sql->close();
		$userData=array(
            'status'=> 'newMatch',
			'index'=> $index,
			'username' => $_SESSION["username"],
			'caracter'=>$_SESSION["character"],
			'skill1' => $_SESSION["skill1"],
			'skill2' => $_SESSION["skill2"],
			'skill3' => $_SESSION["skill3"],
			'skill4' => $_SESSION["skill4"],
			'att' =>  $attW+$attA+$att,
			'def' =>  $defA+$defW+$def
		);
		$_SESSION["index"]=$index;
		$att= $attW+$attA+$att;
		$def=$defA+$defW+$def;
		$userData=json_encode($userData);
		$_SESSION["att"]=$att;
		$_SESSION["def"]=$def;
		$conn->Close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select name from `char` where charId=?");
		mysqli_stmt_bind_param($sql, 'i',$_SESSION["character"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($characterName);
		$sql->fetch();
		$sql->close();  
		$conn->Close();
		
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"insert into playersingame values( ?,?,?,?,?)");
		mysqli_stmt_bind_param($sql, 'siiis',$_SESSION["username"],$att,$def,$_SESSION["opponentsHealth"],$characterName);
		if ($sql->execute()==false) die("2Error creating account");
		$sql->close();  
		$conn->Close();
		return $userData;
	}
	function updatePlayer1(){
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select name,imgUrl from `char` where charId=?");
		mysqli_stmt_bind_param($sql, 'i',$_SESSION["character"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($characterName,$imgUrl);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select lvl from `userchr` where charId=? and username=?");
		mysqli_stmt_bind_param($sql, 'is',$_SESSION["character"],$_SESSION["username"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($lvl);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill1"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill1url);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill2"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill2url);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill3"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill3url);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill4"]);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill4url);
		$sql->fetch();
		$sql->close();
		$conn->close();
	echo
		"<div class=\"player-card\">
		<p id=\"u-name\" class=\"username\">".$_SESSION["username"]."</p>
		<p id=\"u-level\" class=\"level\">Level 30</p>
		</div>
		<div class=\"character-container\">
		<div class=\"character-info\">
			<img src=\"".$imgUrl."\" alt=\"character-pic\" />
			<p id=\"c-name\"class=\"name\">".$characterName."</p>
			<p id=\"c-level\"class=\"level\">LEVEL".$lvl."</p>
		</div>

		<ul class=\"character__abilities\">
			<li class=\"abilities__item\"><img src=\"".$skill1url."\" alt=\"ability1\"></li>
			<li class=\"abilities__item\"><img src=\"".$skill2url."\" alt=\"ability2\"></li>
			<li class=\"abilities__item\"><img src=\"".$skill3url."\" alt=\"ability3\"></li>
			<li class=\"abilities__item\"><img src=\"".$skill4url."\" alt=\"ability4\"></li>
		</ul>
		";
	}
	function updatePlayer2($caracter,$username,$skill1,$skill2,$skill3,$skill4){
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select name,imgUrl from `char` where charId=?");
		mysqli_stmt_bind_param($sql, 'i',$caracter);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($characterName,$imgUrl);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select lvl from `userchr` where charId=? and username=?");
		mysqli_stmt_bind_param($sql, 'is',$caracter,$username);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($lvl);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$skill1);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill1url);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$skill2);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill2url);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$skill3);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill3url);
		$sql->fetch();
		$sql->close();
		$conn->close();
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"select imgUrl from `abilities` where abilityId=? ");
		mysqli_stmt_bind_param($sql, 'i',$skill4);
		if ($sql->execute()==false) die("1Error creating account");
		$sql->bind_result($skill4url);
		$sql->fetch();
		$sql->close();
		$conn->close();
	echo
		"<div class=\"player-card\">
		<p id=\"u-name\" class=\"username\">".$username."</p>
		<p id=\"u-level\" class=\"level\">Level 30</p>
		</div>
		<div class=\"character-container\">
		<div class=\"character-info\">
			<img src=\"".$imgUrl."\" alt=\"character-pic\" />
			<p id=\"c-name\"class=\"name\">".$characterName."</p>
			<p id=\"c-level\"class=\"level\">LEVEL".$lvl."</p>
		</div>

		<ul class=\"character__abilities\">
			<li class=\"abilities__item\"><img src=\"".$skill1url."\" alt=\"ability1\"></li>
			<li class=\"abilities__item\"><img src=\"".$skill2url."\" alt=\"ability2\"></li>
			<li class=\"abilities__item\"><img src=\"".$skill3url."\" alt=\"ability3\"></li>
			<li class=\"abilities__item\"><img src=\"".$skill4url."\" alt=\"ability4\"></li>
		</ul>
		";
	}	
	function giveRewards($win){
			if ($win==1){
				$moneyUpgrade=70;
				$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
				$sql =mysqli_prepare($conn,"select lvl from `userchr` where charId=? and username=?");
				mysqli_stmt_bind_param($sql, 'is',$_SESSION["character"],$_SESSION["username"]);
				if ($sql->execute()==false) die("1Error creating account");
				$sql->bind_result($lvl);
				$sql->fetch();
				$sql->close();
				$conn->close();
				$lvl=lvl+1;
				$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
				$sql =mysqli_prepare($conn,"update `userchr` set lvl=? where charId=? and username=?");
				mysqli_stmt_bind_param($sql, 'iis',$lvl,$_SESSION["character"],$_SESSION["username"]);
				if ($sql->execute()==false) die("1Error creating account");
				$sql->close();
				$conn->close();
			}
			else {
				$moneyUpgrade=20;
				}
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =  mysqli_prepare($conn,"SELECT money FROM `user` where username= ?");
			mysqli_stmt_bind_param($sql,'s',$_SESSION["username"]);
			$sql->execute();
			$sql->bind_result($money);
			$sql->fetch();
			$sql->close();
			$conn->close();
			$money=$money+$moneyUpgrade;
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql1 = mysqli_prepare($conn,"UPDATE `user` SET money=? where username=?");
            mysqli_stmt_bind_param($sql1, 'is',$money,$_SESSION["username"]);
            $sql1->execute();
			$sql->close();
			$conn->close();
	}

	function deleteRow(){
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"delete from playersingame where username=?");
		mysqli_stmt_bind_param($sql,'s',$_SESSION["username"]);
		if ($sql->execute()==false) die("Error creating account");
		$sql->close();  
		$conn->Close();
	}
	function healthBd($health){
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"Update  playersInGame set health=? where username=?");
		mysqli_stmt_bind_param($sql, 'is',$health,$_SESSION["username"]);
		if ($sql->execute()==false) die("Error creating account");
		$conn->close();
		$sql->close();

	}
	//Updateaza viata pe pagina de play a unui jucator 0-curent 1-opponent
	function updateHealth($health,$type){
		if ($type=0){
			this.healthBd($health);
		}
	}
	function updateAttDff(){
		$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
		$sql =mysqli_prepare($conn,"Update  playersInGame set att=? and dff=? where username=?");
		mysqli_stmt_bind_param($sql, 'iis',$_SESSION["att"],$_SESSION["dff"],$_SESSION["username"]);
		if ($sql->execute()==false) die("Error creating account");
		$conn->close();
		$sql->close();

	}
	function skill($skill1,$skill2,$skill3,$skill4){
		if ($skill1>0){
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =mysqli_prepare($conn,"select heal,dmg,def,att from `abilities` where abilityId=?");
			mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill1"]);
			if ($sql->execute()==false) die("1Error creating account");
			$sql->bind_result($heal,$dmg,$def,$att);
			$sql->fetch();
			$sql->close();
			$conn->close();
			$_SESSION["health"]=$_SESSION["health"]+$skill1*$heal;
			$_SESSION["opponentsHealth"]=$_SESSION["opponentsHealth"]+$skill1*$dmg;
			$_SESSION["att"]=$_SESSION["att"]+$skill1*$att;
			$_SESSION["def"]=$_SESSION["def"]+$skill1*$def;
		}
		if ($skill2>0){
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =mysqli_prepare($conn,"select heal,dmg,def,att from `abilities` where abilityId=?");
			mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill2"]);
			if ($sql->execute()==false) die("1Error creating account");
			$sql->bind_result($heal,$dmg,$def,$att);
			$sql->fetch();
			$sql->close();
			$conn->close();
			$_SESSION["health"]=$_SESSION["health"]+$skill2*$heal;
			$_SESSION["opponentsHealth"]=$_SESSION["opponentsHealth"]+$skill2*$dmg;
			$_SESSION["att"]=$_SESSION["att"]+$skill2*$att;
			$_SESSION["def"]=$_SESSION["def"]+$skill2*$def;
		}
		if ($skill3>0){
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =mysqli_prepare($conn,"select heal,dmg,def,att from `abilities` where abilityId=?");
			mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill3"]);
			if ($sql->execute()==false) die("1Error creating account");
			$sql->bind_result($heal,$dmg,$def,$att);
			$sql->fetch();
			$sql->close();
			$conn->close();
			$_SESSION["health"]=$_SESSION["health"]+$skill3*$heal;
			$_SESSION["opponentsHealth"]=$_SESSION["opponentsHealth"]+$skill3*$dmg;
			$_SESSION["att"]=$_SESSION["att"]+$skill3*$att;
			$_SESSION["def"]=$_SESSION["def"]+$skill3*$def;
		}
		if ($skill4>0){
			$conn = mysqli_connect('localhost', 'root', "", "sundaybrawl");
			$sql =mysqli_prepare($conn,"select heal,dmg,def,att from `abilities` where abilityId=?");
			mysqli_stmt_bind_param($sql, 'i',$_SESSION["skill4"]);
			if ($sql->execute()==false) die("1Error creating account");
			$sql->bind_result($heal,$dmg,$def,$att);
			$sql->fetch();
			$sql->close();
			$conn->close();
			$_SESSION["health"]=$_SESSION["health"]+$skill4*$heal;
			$_SESSION["opponentsHealth"]=$_SESSION["opponentsHealth"]+$skill4*$dmg;
			$_SESSION["att"]=$_SESSION["att"]+$skill4*$att;
			$_SESSION["def"]=$_SESSION["def"]+$skill4*$def;
		}
		if ($_SESSION["opponentsHealth"]<0)
		$userData=array(
            'status'=> 'endGame',
            'index'=>$_SESSION["index"]
		); 
		
		else $userData=array(
            'status'=> 'yourTurn',
			'health'=> $_SESSION["opponentsHealth"],
			'opponentsHealth' => $$_SESSION["health"], 
			'att' => $_SESSION["att"],
			'def' => $_SESSION["def"],
            'index'=>$_SESSION["index"]
        );
        $userData=json_encode($userData);
		this.updateAttDff();
		return $userData;
	}
}


?>