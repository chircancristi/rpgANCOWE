 function switchToLogIn(divID,divID2){
	var item = document.getElementById(divID);
	var item2 = document.getElementById(divID2);
	item.classList.toggle('center-bottom');
	item.classList.toggle('go-bottom');
	item2.classList.toggle('go-bottom')
	item2.classList.toggle('center-bottom');
	
	
} 
function eraseAcc(username) {
	document.location.href = "../../Controller/dashboard.php?q="+0+"&username="+username;
}

function proprieties() {

	var aux2 = window.innerHeight / 2;

	document.getElementById("formularContainer").style.height = window.innerHeight + 'px';
	document.getElementById("formularId").style.height = aux2 + 'px';

}

function showWeapon() {
	var items = document.getElementsByClassName('char-details__items_item_dropDown');
	
	for(i=0; i<items.length; i++) {
		if ( items[i].style.display!="none"){

		 items[i].style.display = "none";
		 items[i].style.top = "0%";
		}
		 else  {
			  items[i].style.display="inline-block";
			  items[i].style.top = "-" +(100+i*100) + "%";

		 }
		}

}

function showArmor() {
	var items = document.getElementsByClassName('char-details__items_item_dropDownArmor');
	
	for(i=0; i<items.length; i++) {
		if ( items[i].style.display!="none"){

		 items[i].style.display = "none";
		 items[i].style.top = "0%";
		}
		 else  {
			  items[i].style.display="inline-block";
			  items[i].style.top = "-" +(100+i*100) + "%";

		 }
		}

}
function showSkill(divId){
	var aux=document.getElementById(divId) ;
	 if (aux.style.display!="inline-block") aux.style.display="inline-block";
	  else aux.style.display="none";
}

function changeSkill (type , id) {

        if (window.XMLHttpRequest) {
      
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("char-details__abilities__skills__container");
        }

        xmlhttp.open("GET","../../Controller/dashboard.php?q=6"+"&type="+type+"&t="+id,true);
		xmlhttp.send();
		updateSkill();
	}

function updateSkill (){
	var type=-1;
	
        if (window.XMLHttpRequest) {
      
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("char-details__abilities__skills__container");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("char-details__abilities__skills__container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../Controller/dashboard.php?type="+type+"&q=6",true);
        xmlhttp.send();
	
}
function showWeapons(){
	if (window.XMLHttpRequest) {
      
		xmlhttp = new XMLHttpRequest();
	} else {
		
		xmlhttp = new ActiveXObject("char-details__abilities__container");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("char-details__abilities__container").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","../../Controller/dashboard.php?q=9",true);
	xmlhttp.send();
}
function changeWeapon(nr,type) {
	var hr = new XMLHttpRequest();
	var url = "../../Controller/dashboard.php";
	var vars = "id="+nr+"&t="+type+"&type=3";
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.send(vars);
	CharStats();
	showWeapons();
}

function showDescription(divId) {
	document.getElementById(divId).style.opacity="1";

}

function hideDescription(divId) {
	document.getElementById(divId).style.opacity="0";


}
function bringImg(pos){
	var pics = document.getElementsByClassName("container__Poza");
	var buttons = document.getElementsByClassName("about-button");
	pics[pos].style.animation = "shake 0.5s";
	pics[pos].style.animationIterationCount="infinite";
	buttons[pos].style.background = "linear-gradient( rgb(99, 87, 236), darkblue, rgb(99, 87, 236))";
}
function throwImg(pos){
	var pics = document.getElementsByClassName("container__Poza");
	var buttons = document.getElementsByClassName("about-button");
	pics[pos].style.animationIterationCount="0";
	buttons[pos].style.background = "rgb(99, 87, 236)";
}


function CharStats(){
	if (window.XMLHttpRequest) {
      
		xmlhttp = new XMLHttpRequest();
	} else {
		
		xmlhttp = new ActiveXObject("char-details__stats__info");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("char-details__stats__info").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","../../Controller/dashboard.php ?q="+"5",true);
	xmlhttp.send();

}
function  characterBio(){
	
        if (window.XMLHttpRequest) {
      
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("char-details__bio__header");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("char-details__bio__header").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../Controller/dashboard.php?q=8",true);
        xmlhttp.send();
	
}
function HighlightChar(nr){
	var items = document.getElementsByClassName('characters__item');
	
	for(i=0; i<items.length; i++) {
		items[i].style.backgroundColor = 'white';
		items[i].style.fontWeight = 'normal';
	  }
	  items[nr-1].style.backgroundColor = 'gold';
	  items[nr-1].style.fontWeight = 'bold';
	  var hr = new XMLHttpRequest();
	  var url = "../../Controller/dashboard.php";
	  var vars = "type=4 & id="+nr;
	  hr.open("POST", url, true);
	  hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	  hr.send(vars);
	characterBio();
	CharStats();
	updateSkill();	
}
function userStats(){
	
	if (window.XMLHttpRequest) {
      
		xmlhttp = new XMLHttpRequest();
	} else {
		
		xmlhttp = new ActiveXObject("acc-stats__info");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("acc-stats__info").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","../../Controller/dashboard.php?q=7",true);
	xmlhttp.send();
}
function buyItems (nr,type){
	
	 var hr = new XMLHttpRequest();
	var url = "../../Controller/dashboard.php";
	var fn = document.getElementById("buyItem"+nr).value;
	var vars = "itemId="+fn+"&type=2";
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("items").innerHTML = return_data;
    }
}
	hr.send(vars); 
	userStats();
	changeWeapon(nr,type);
	
}
function showWeaponsToBuy (){
	if (window.XMLHttpRequest) {
      
		xmlhttp = new XMLHttpRequest();
	} else {
		
		xmlhttp = new ActiveXObject("items");
	}
	xmlhttp.onreadystatechange = function() {
		if (this.readyState == 4 && this.status == 200) {
			document.getElementById("items").innerHTML = this.responseText;
		}
	};
	xmlhttp.open("GET","../../Controller/dashboard.php?q=10",true);
	xmlhttp.send();
}
function play (){
	
	document.location.href= "play.html";
	

}
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