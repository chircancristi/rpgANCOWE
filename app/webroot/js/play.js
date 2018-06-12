var abilitiesP1 = document.getElementById('abilities--p1');
var abilitiesP2 = document.getElementById('abilities--p2');
var energyBar = document.getElementById('u-energy-bar');
var healthBar = document.getElementById('u-health-bar');
var opponentHealthBar= document.getElementById('o-health-bar');
var energyValue = energyBar.offsetWidth;
var energyTextValue = document.getElementById('u-energy');
var healthTextValue = document.getElementById('u-health');
var opponentHealthTextValue = document.getElementById('o-health');
var endTurnSkills = [0, 0, 0, 0];
var socket;
healthTextValue.innerHTML = "100";
opponentHealthTextValue.innerHTML = "100";
energyTextValue.innerHTML = "10";

for (let index = 0; index < abilitiesP1.children.length; index++) {
	const ability = abilitiesP1.children[index];
	
	ability.setAttribute("data-selected", "unselected");
}

function updateEnergy ( ability, abilityCost, type ) {
	if ( type === "restore" ) {
		energyValue += abilityCost;
		energyBar.style = "width: " + energyValue + "px";
		highlightAbility(ability);
		energyTextValue.innerHTML = `${energyValue}`;
	} else if (type === "deplete") {
		if( energyValue - abilityCost >= 0 ) {
			energyValue -= abilityCost;
			energyBar.style = "width: " + energyValue + "px";
			highlightAbility(ability);
			energyTextValue.innerHTML = `${energyValue}`;
	} else {
			var errorMsg = document.getElementById("ability-error");
			errorMsg.style = "opacity: 1;";
			
			setTimeout( () => {
				errorMsg.style = "opacity: 0;";
			}, 1500);
		}
	}
}


function highlightAbility ( ability ) {
	if( ability.getAttribute("data-selected" ) === "selected") {
		ability.setAttribute("data-selected", "unselected");
		ability.style = "";
	} else {
		ability.style = "transform: translateY(-5px); box-shadow: 0 3px 5px rgba(0, 0, 0, 0.5);";
		ability.setAttribute("data-selected", "selected");
	}
}

function selectAbility ( ability ) {
	if( ability.getAttribute( "data-selected" ) === "selected") {
		switch( ability.getAttribute("data-order") ) {
			case "first": 
				updateEnergy(ability, 10, "restore");
				break;
			case "second":
				updateEnergy(ability, 30, "restore");
				break;
			case "third":
				updateEnergy(ability, 50, "restore");
				break;
			case "fourth":
				updateEnergy(ability, 70, "restore");
				break;
		}
	} else {
		switch( ability.getAttribute("data-order") ) {
			case "first": 
				updateEnergy(ability, 10, "deplete");
				break;
			case "second":
				updateEnergy(ability, 30, "deplete");
				break;
			case "third":
				updateEnergy(ability, 50, "deplete");
				break;
			case "fourth":
				updateEnergy(ability, 70, "deplete");
				break;
		}
	}
}

function buildEndOfTurnSkillsArray () {
	for (let index = 0; index < abilitiesP1.children.length; index++) {
		const ability = abilitiesP1.children[index];
		
		if( ability.getAttribute( 'data-selected' ) === "selected" ) {
			endTurnSkills[index] = 1;
			energyValue+=10*(index+1);
			energyBar.style = "width: " + energyValue + "px";
			energyTextValue.innerHTML = `${energyValue}`
		}
	}
	var hr = new XMLHttpRequest();
	var url = "../../Controller/play.php";
	var vars = "status=8"+"&skill1="+endTurnSkills[0]+"&skill2="+endTurnSkills[1]+"&skill3="+endTurnSkills[2]+"&skill4="+endTurnSkills[3];
	hr.open("POST", url, true);
	console.log(vars);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
		if(hr.readyState == 4 && hr.status == 200) {
			var return_data = hr.responseText;
			console.log(return_data);
			var data= JSON.parse(return_data); 			
			socket.send(return_data);
			if (data.status=="endGame") 
					endGame(1);
			else{
				//def
				document.getElementById("u-def-value").innerHTML=data.def;
				//att
				document.getElementById("u-att-value").innerHTML=data.att;
				health=data.oppponentsHealth;
				oppponentsHealth=data.health;
				updateHealth(health,0);
				updateHealth(oppponentsHealth,1);
				endTurnButton();
				if(energyValue<100){
				energyValue += 10;
				energyBar.style = "width: " + energyValue + "px";
				energyTextValue.innerHTML = `${energyValue}`
				highlightAbility(ability);
				}
			}
		}
	}
	hr.send(vars);
	if (energyValue<100){
		energyValue=energyValue+10;
		energyBar.style = "width: " + energyValue + "px";
		energyTextValue.innerHTML = `${energyValue}`;
	}
	for (let index = 0; index < abilitiesP1.children.length; index++) {
		const ability = abilitiesP1.children[index];
		ability.setAttribute("data-selected", "unselected");
		ability.style = "";
		
	}
	endTurnSkills=[0,0,0,0];
}


function createSocket(){
		
	var websocket = new WebSocket("ws://127.0.0.1:1234/app/Socket/socket.php"); 
	socket=websocket;
		websocket.onerror=function(event){
			document.location.href = "dashboard.php";
		}
		websocket.onmessage = function(event) {
			
			var Data = JSON.parse(event.data);
			
			if (Data.status=='newConnection')
			{
			
				var hr = new XMLHttpRequest();
				var url = "../../Controller/play.php";
				var vars = "status=1 & index="+Data.index+"&turn="+Data.turn;
				hr.open("POST", url, true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						
						websocket.send(return_data);
					}
				}
				hr.send(vars);
				
			}
			 if (Data.status=='newMatch') 
			 {
				
				updateUsersCar();
				updateOpponentsCar(Data.caracter,Data.username,Data.skill1,Data.skill2,Data.skill3,Data.skill4,Data.att,Data.def);
				var body = document.getElementsByTagName('body');
				body[0].classList.add('loaded');
			}
			if (Data.status=="opponentsTurn")
			{
				updateHealth(Data.health,0);
				
			}
			 if (Data.status=='yourTurn') 
			 {
				 health=Data.health;
			     oppponentsHealth=Data.oppponentsHealth;
				 updateHealth(health,0);
				 updateHealth(oppponentsHealth,1);
				 updateAttDef(Data.att,Data.def);
				 setTimeout( () => {
					doDmg();
				}, 1500);
				endTurnButton();
			}
			 if (Data.status=="endGame")
			 {
				 endGame(0);
				 var hr = new XMLHttpRequest();
				var url = "../../Controller/play.php";
				var vars = "status=9";
				hr.open("POST", url, true);
				hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
				hr.onreadystatechange = function() {
					if(hr.readyState == 4 && hr.status == 200) {
						var return_data = hr.responseText;
						socket.send(return_data);
						}
					}
				hr.send(vars);
				 
			}
		}
			
			 
         
         websocket.onClose=function (event)
         {
            document.location.href = "dashboard.php";
		 }	


	;}
	function updateUsersCar(){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=2";
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				var data= JSON.parse(return_data);
				var skills=[data.skill1,data.skill2,data.skill3,data.skill4];	
				//username		
				document.getElementById("u-name").innerHTML=data.username;
				//url
				document.getElementById("u-c-img").setAttribute("src",data.imgUrl);
				//caracter name
				document.getElementById("u-c-name").innerHTML=data.caracter;
				//lvl
				document.getElementById("u-c-level").innerHTML=data.lvl;
				//def
				document.getElementById("u-def-value").innerHTML=data.def;
				//att
				document.getElementById("u-att-value").innerHTML=data.att;
				for (let index = 0; index < abilitiesP1.children.length; index++) {
					const ability = abilitiesP1.children[index];
					ability.children[0].setAttribute("src",skills[index]);
				}
	
				if (data.turn==0) endTurnButton();
				else  setTimeout( () => {
					doDmg();
				}, 1500);
			}
		}
		hr.send(vars);
	}
	function updateOpponentsCar(caracter,username,skill1,skill2,skill3,skill4,att,def){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=3&caracter="+caracter+"&username="+username+"&skill1="+skill1+"&skill2="+skill2+"&skill3="+skill3+"&skill4="+skill4
		+"&att="+att+"&def="+def;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.onreadystatechange = function() {
			if(hr.readyState == 4 && hr.status == 200) {
				var return_data = hr.responseText;
				console.log(return_data);			
				var data= JSON.parse(return_data);
				var skills=[data.skill1,data.skill2,data.skill3,data.skill4];	
				//username		
				document.getElementById("o-name").innerHTML=data.username;
				//url
				document.getElementById("o-c-img").setAttribute("src",data.imgUrl);
				//caracter name
				document.getElementById("o-c-name").innerHTML=data.caracter;
				//lvl
				document.getElementById("o-c-level").innerHTML=data.lvl;
				//def
				document.getElementById("o-def-value").innerHTML=data.def;
				//att
				document.getElementById("o-att-value").innerHTML=data.att;
				for (let index = 0; index < abilitiesP2.children.length; index++) {
					const ability = abilitiesP2.children[index];
					ability.children[0].setAttribute("src",skills[index]);
				}
				
			}
		}
		hr.send(vars);
	}
	function endGame(win){
		var hr = new XMLHttpRequest();
		var url = "../../Controller/play.php";
		var vars = "status=4 & win="+win;
		hr.open("POST", url, true);
		hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
		hr.send(vars);
		setTimeout( () => {
			document.location.href = "dashboard.php";
		}, 1500);
	

	}
	function updateHealth(health,type){
		if(type==1){
			opponentHealthTextValue.innerHTML=health;
			opponentHealthBar.style="width: " + health+ "px;"; 
		
		}
		else {
			healthTextValue.innerHTML=health;
			healthBar.style="width: " + health+ "px;"; 
			var hr = new XMLHttpRequest();
			var url = "../../Controller/play.php";
			var vars = "status=5 & health="+health;
			hr.open("POST", url, true);
			hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			hr.send(vars);
		}
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
				socket.send(return_data);
				console.log(return_data);
				var data= JSON.parse(return_data);
				updateHealth(data.health,1);
				var data= JSON.parse(return_data);
				if (data.status=="endGame")	endGame(1);	
			}
		}
		hr.send(vars);
	}
	function endTurnButton () {
	 if (document.getElementById("endTurn").style=="opacity: 1;" || document.getElementById("endTurn").style.opacity==1){	
		 document.getElementById("endTurn").style="opacity: 0; pointer-events: none;";
		 document.getElementById("player1").children[0].style = "";
		 document.getElementById("player2").children[0].style = "background-color: #F79F1F; color: white;";
	 } else {
		 document.getElementById("endTurn").style="opacity: 1;";
		 document.getElementById("player1").children[0].style = "background-color: #F79F1F; color: white;";
		 document.getElementById("player2").children[0].style = "";
	 }
	}