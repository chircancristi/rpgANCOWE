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
	if (id == "") {
        document.getElementById("char-details__abilities__skills__container").innerHTML = "";
        return;
    } else { 
        if (window.XMLHttpRequest) {
      
            xmlhttp = new XMLHttpRequest();
        } else {
            
            xmlhttp = new ActiveXObject("char-details__abilities__skills__container");
        }
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("cchar-details__abilities__skills__container").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","../../Controller/dashboardSkillChange.php?q="+type+"&t="+id,true);
		xmlhttp.send();
		updateSkill();
	}
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
        xmlhttp.open("GET","../../Controller/dashboardSkillChange.php?q="+type,true);
        xmlhttp.send();
	
}

function changeWeapon(nr,type) {
	if (nr == "") {
        document.getElementById("char-details__abilities__container").innerHTML = "";
        return;
    } else { 
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
        xmlhttp.open("GET","../../Controller/dashboardChangeWeapon.php?q="+nr+"&t="+type,true);
        xmlhttp.send();
	}
	CharStats();
	
	
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
	xmlhttp.open("GET","../../Controller/dashboardCharStats.php",true);
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
	
	  if (nr == "") {
        document.getElementById("char-details__bio__header").innerHTML = "";
        return;
    } else { 
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
        xmlhttp.open("GET","../../Controller/dashboardCharDetails.php?q="+nr,true);
        xmlhttp.send();
	}

	CharStats();
	updateSkill();	
}
function buyItems (nr,type){
	
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
	changeWeapon(nr,type);
	
}
