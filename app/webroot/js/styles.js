 function switchToLogIn(divID,divID2){
	var item = document.getElementById(divID);
	var item2 = document.getElementById(divID2);
	item.classList.toggle('center-bottom');
	item.classList.toggle('go-bottom');
	item2.classList.toggle('go-bottom')
	item2.classList.toggle('center-bottom');
	
	
} 
function eraseAcc() {
	document.location.href = "../../Controller/eraseAccount.php";
}

function proprieties() {

	var aux2 = window.innerHeight / 2;

	document.getElementById("formularContainer").style.height = window.innerHeight + 'px';
	document.getElementById("formularId").style.height = aux2 + 'px';

}

function showSkill(divId) {
	var aux = document.getElementById(divId);
	if (aux.id != 'firstSkill') document.getElementById("firstSkill").style.display = "none";
	if (aux.id != "secondSkill") document.getElementById("secondSkill").style.display = "none";
	if (aux.id != "thirdSkill") document.getElementById("thirdSkill").style.display = "none";
	if (aux.id != "fourthSkill") document.getElementById("fourthSkill").style.display = "none";
	if (aux.id != "firstWeapon") document.getElementById("firstWeapon").style.display = "none";
	if (aux.id != "armor") document.getElementById("armor").style.display = "none";
	if (aux.style.display != "inline-block") {
		aux.style.display = 'inline-block';
	} else if (aux.style.display != "none") {
		aux.style.display = 'none';
	}
}


function changeSkill (divID, divID2) {
	var aux = document.getElementById(divID);
	var aux2 = document.getElementById(divID2);
	aux2.onclick = function () {
		showSkill(divID2);
	};
	aux.onclick = function () {
		changeSkill(divID, divID2);
	};
	document.getElementById(divID).className = 'char-details__abilities_item_dropDown';
	document.getElementById(divID2).className = 'char-details__abilities__item';
	aux.id = divID2;
	aux2.id = divID;
}

function changeSkillWeapons(divID, divID2) {
	var aux = document.getElementById(divID);
	var aux2 = document.getElementById(divID2);
	aux2.onclick = function () {
		showSkill(divID2);
	};
	aux.onclick = function () {
		changeSkillWeapons(divID, divID2);
	};
	document.getElementById(divID).className = 'char-details__items_item_dropDown';
	document.getElementById(divID2).className = 'char-details__items__item';
	aux.id = divID2;
	aux2.id = divID;
}

function showDescription(divId) {
	document.getElementById(divId).style.display = "block";
}

function hideDescription(divId) {
	document.getElementById(divId).style.display = "none";

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


function HighlightChar(nr){
	var items = document.getElementsByClassName('characters__item');
	
	for(i=0; i<items.length; i++) {
		items[i].style.backgroundColor = 'white';
		items[i].style.fontWeight = 'normal';
	  }
	  items[nr-1].style.backgroundColor = 'gold';
	  items[nr-1].style.fontWeight = 'bold';
	
	  if (nr == "") {
        document.getElementById("char-details").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
      
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("char-details");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("char-details").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../Controller/dashboardCharDetails.php?q="+nr,true);
        xmlhttp.send();
    }
	
}
function buyItems (nr){
	
	 var hr = new XMLHttpRequest();
	var url = "../../Controller/dashboardBuyItem.php";
	var fn = document.getElementById("buyItem"+nr).value;
	
	var vars = "itemId="+fn;
	hr.open("POST", url, true);
	hr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	hr.onreadystatechange = function() {
    if(hr.readyState == 4 && hr.status == 200) {
        var return_data = hr.responseText;
        document.getElementById("items").innerHTML = return_data;
    }
}
	hr.send(vars); 
	document.getElementById("items").innerHTML = "processing...";
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
	xmlhttp.open("GET","../../Controller/dashboardUserStats.php",true);
	xmlhttp.send();
	
}
