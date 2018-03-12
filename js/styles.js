 
function switchToLogIn(divID,divID2){
	var item = document.getElementById(divID);
	var item2 = document.getElementById(divID2);
	item.style.display='none';
	item2.style.display='block';
} 
function proprieties()
{

var aux2=window.innerHeight/2;
document.getElementById("formularContainer").style.height=window.innerHeight+'px';
document.getElementById("formularId").style.height=aux2+'px';

}