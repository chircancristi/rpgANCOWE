
function sendToUser(response )
{
//	document.location.href = "play.html?data="+response;

	//websocket.send(JSON.stringify(response) );

}
function charDetails(index){
	if (window.XMLHttpRequest) {
      
		xmlhttp = new XMLHttpRequest();
	} else {
		
		xmlhttp = new ActiveXObject("characters__item__details__description"+index);
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("characters__item__details__description"+index).innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","../../Controller/dashboard.php ?q="+"11"+"&index="+index,true);
	xmlhttp.send();
}
function createSocket(){
		
	var websocket = new WebSocket("ws://127.0.0.1:1234/app/Socket/socket.php"); 
		websocket.onerror=function(event){
			document.location.href = "dashboard.php";
		}
		websocket.onmessage = function(event) {
			
			var Data = JSON.parse(event.data);
			
			if (Data.status=='newConnection')
			{
			
				var hr = new XMLHttpRequest();
				var url = "../../Controller/play.php";
				var vars = "status=1 & index="+Data.index;
				hr.open("POST", url, true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;			
						console.log(return_data);
						websocket.send(return_data);
					}
				}
				hr.send(vars);
				
			}
			 if (Data.status=='newMatch') 
			 {
				 console.log( Data);
				updateUsersCar();
				updateOpponentsCar(Data.caracter,Data.username,Data.skill1,Data.skill2,Data.skill3,Data.skill4,Data.att,Data.def);
			 
			}
			if (Data.status=="opponentsTurn")
			{
				updateHealth(Data.health);
			}
			 if (Data.status=='yourTurn') 
			 {
				 updateHealth(Data.health);
				 updateAttDef(Data.att,Data.def);
				 doDmg();
			}
			 if (Data.status=="endGame")
			 {
				 endGame(0);
				 document.location.href = "dashboard.php";
			}
			
			 
 		}	
		
	/*
		$('#endTurn').on("submit",function(event){
			event.preventDefault();
			$('#chat-user').attr("type","hidden");		
			var messageJSON = {
				skill1: $('#chat-user').val(),
				skill2: $('#chat-message').val()
				skill3: $('#chat-user').val(),
				skill4: $('#chat-message').val()
			};
			var hr = new XMLHttpRequest();
			var url = "../../Controller/play.php";
			var vars = "status=8";
			hr.open("POST", url, true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.onreadystatechange = function() {
				if(hr.readyState == 4 && hr.status == 200) {
					var return_data = hr.responseText;			
				    websocket.send(return_data);
				}
			}
			hr.send(vars);
		
		});*/
	;}
	function updateUsersCar(){
		if (window.XMLHttpRequest) {
      
			xmlhttp = new XMLHttpRequest();
		} else {
			
			xmlhttp = new ActiveXObject("player1");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("player1").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","../../Controller/play.php?status=2",true);
		xmlhttp.send();
	}
	function updateOpponentsCar(caracter,username,skill1,skill2,skill3,skill4,att,def){
		if (window.XMLHttpRequest) {
      
			xmlhttp = new XMLHttpRequest();
		} else {
			
			xmlhttp = new ActiveXObject("player2");
		}
		xmlhttp.onreadystatechange = function() {
			if (this.readyState == 4 && this.status == 200) {
				document.getElementById("player2").innerHTML = this.responseText;
			}
		};
		xmlhttp.open("GET","../../Controller/play.php?status=3&caracter="+caracter+
		"&username="+username+"&skill1="+skill1+"&skill2="+skill2+"&skill3="+skill3+"&skill4="+skill4
		+"&att="+att+"&def="+def,true);
		xmlhttp.send();
	}
	function endGame(win){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=4 & win="+win;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.send(vars);
	

	}
	function updateHealth(health){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=5 & health="+health;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.send(vars);
	}
	function updateAttDef(att,def){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=6 & att="+att+"&def="+def;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.send(vars);
	}
	function doDmg(){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=7";
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;			
				if (return_data!="noDmg")
						websocket.send(return_data);
			}
		}
		hr.send(vars);
	}