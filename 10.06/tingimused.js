function aeg(){
	
	var array = '<?=$jsarray?>';
	console.log(array); // STRING
	array = JSON.parse(array);
	console.log(array);
	
	var device = document.getElementById("deviceinput");
	var starttime = document.getElementById("startTime");
	var stoptime = document.getElementById("stopTime");
	var tingimus = document.getElementById("tingimus");

	starttime.value=array[device.value][1];
	stoptime.value=array[device.value][2];
	tingimus.value=array[device.value][3];
	
	var myInput = document.getElementById('deviceinput').value;  
    document.getElementById('abhijeet').innerHTML = myInput;

}