<?php
session_start();
class play {
    function sentUserData ($index)
	{
		
		
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
		$att= $attW+$attA+$att;
		$def=$defA+$defW+$def;
		$userData=json_encode($userData);
	
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
		<button class=\"btn btn--end-turn\">END TURN</button>";
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
		<button class=\"btn btn--end-turn\">END TURN</button>";
	}	
	

}

?>