<?php
class play {
    function sentUserData ($index)
	{
		session_start();
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
        $userData=json_encode($userData);
		
		return $userData;
	}

}

?>