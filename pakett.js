function textAll() {

	var radio = document.getElementById("1");
	var p2evahind = document.getElementById("p2evahind");
	var 66hind = document.getElementById("66hind");
	var tasu = document.getElementById("tasu");
	var marginaal = document.getElementById("marginaal");
	
	if (radio.checked == true){
	p2evahind.style.display = "block";
	66hind.style.display = "block";
	tasu.style.display = "block";
	marginaal.style.display = "block";
	} 
}

function textHide(){
	
	var radio = document.getElementById("2");
	var p2evahind = document.getElementById("p2evahind");
	var 66hind = document.getElementById("66hind");
	var tasu = document.getElementById("tasu");
	var marginaal = document.getElementById("marginaal");
	
	if (radio.checked == true){
	p2evahind.style.display = "none";
	66hind.style.display = "none";
	tasu.style.display = "block";
	marginaal.style.display = "block";
	}
}