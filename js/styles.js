 function switchToLogIn(divID,divID2){
	var item = document.getElementById(divID);
	var item2 = document.getElementById(divID2);
	item.classList.toggle('center-bottom');
	item.classList.toggle('go-bottom');
	item2.classList.toggle('go-bottom')
	item2.classList.toggle('center-bottom');
	
	
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
	  items[nr].style.backgroundColor = 'gold';
	  items[nr].style.fontWeight = 'bold';
	
	var chars = document.getElementsByClassName('char-details');
	for(i=0; i<chars.length; i++) {
		chars[i].style.display = 'none';
	  }

	  if(nr==2 || nr==3){
		chars[1].style.display = 'block';
	  }

	  chars[nr].style.display = 'block';
}