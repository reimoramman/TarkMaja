function fikseerimata() {

	var radio = document.getElementById("1");
	var bors = document.getElementById("borsihinnad");
	var text1 = document.getElementById("text1");
	var text2 = document.getElementById("text2");
	var text3 = document.getElementById("text3");
	var text4 = document.getElementById("text4");
	
	if (radio.checked == true){
	bors.style.display = "none";
	text1.style.display = "block";
	text2.style.display = "block";
	text3.style.display = "block";
	text4.style.display = "none";
	
	} 
}

function fikseeritud(){
	
	var radio = document.getElementById("2");
	var bors = document.getElementById("borsihinnad");
	var text1 = document.getElementById("text1");
	var text2 = document.getElementById("text2");
	var text3 = document.getElementById("text3");
	var text4 = document.getElementById("text4");
	
	if (radio.checked == true){
	bors.style.display = "none";
	text1.style.display = "none";
	text2.style.display = "none";
	text3.style.display = "block";
	text4.style.display = "block";
	}
}

function borsihind(){
	
	var radio = document.getElementById("3");
	var bors = document.getElementById("borsihinnad");
	var text1 = document.getElementById("text1");
	var text2 = document.getElementById("text2");
	var text3 = document.getElementById("text3");
	var text4 = document.getElementById("text4");
	
	if (radio.checked == true){
		
	bors.style.display = "block";
	text1.style.display = "none";
	text2.style.display = "none";
	text3.style.display = "none";
	text4.style.display = "none";
	}
}

function kohaletoimetamisetasu(){
	
	var radio = document.getElementById("tasu");
	var text6 = document.getElementById("text6");
	var text7 = document.getElementById("text7");
	var text8 = document.getElementById("text8");
	
	if (radio.checked == true){
	text6.style.display = "block";
	text7.style.display = "none";
	text8.style.display = "none";
	}
}

function vorgutasu(){
	
	var radio = document.getElementById("vork");
	var text6 = document.getElementById("text6");
	var text7 = document.getElementById("text7");
	var text8 = document.getElementById("text8");
	
	if (radio.checked == true){
	text6.style.display = "none";
	text7.style.display = "block";
	text8.style.display = "block";
	}
}