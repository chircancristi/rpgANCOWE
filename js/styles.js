 
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