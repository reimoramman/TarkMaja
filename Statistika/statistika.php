<?php 
function randomEntry(){
	$fp = fopen('stat.txt', 'a+');
	$lines = fread("stat.txt", filesize('stat.txt'));
	$statistika_id = $lines[-1].str_split(",")[0];
	$uus_statistika_id = (int)$statistika_id+1;
	$today = new DateTime("now");
	$stamp1 = time();
	$stamp2 = $stamp1 - 2592000000;
	$newdate = new DateTime($stamp2);
	$enddate = new DateTime(rand($stamp2, $stamp1));
	fwrite($fp, $uus_statistika_id ."," .$newdate ."," .$enddate ."," ."0" ."," .rand()*150);
	fclose($fp);
}
?>
<!DOCTYPE html>
<head>
	<meta charset="utf-8">
	<title>Statistika</title>
	<script type="text/javascript">
</script>
<script type="text/javascript"> 
  function handleClickA(myRadio) {
var selectedValueA = myRadio.value;

</script>
<script type="text/javascript">
function handleClickT(myRadio) {
var selectedValueT = myRadio.value;
}
</script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    var dataPoints = [];
 
function getDataPointsFromCSV(csv) {
    var dataPoints = csvLines = points = [];
    csvLines = csv.split(/[\r?\n|\r|\n]+/);
        
    for (var i = 0; i < csvLines.length; i++)
        if (csvLines[i].length > 0) {
            points = csvLines[i].split(",");
            dataPoints.push({ 
                x: new Date(points[0]), 
                y: parseFloat(points[1]) 		
	    });
	}
    return dataPoints;
}
	 
$.get("stat.csv", function(data) {
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
	    text: "Chart from CSV",
        },
        data: [{
	    type: "line",
	    dataPoints: getDataPointsFromCSV(data)
	}]
    });
		
    chart.render();
 
});
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
<html lang="et">
<body>
<h1></h1>
<label>Sisesta suvaline kirje</label><br>
<input type="submit" name="randomsubmit" value="Salvesta" onclick="randomEntry()">
<p>Vali näidatav periood:</p>
<input type="radio" id="p2ev" name="aeg" value="1" onclick="handleClickA(this)">
<label for="p2ev">Päev</label>
<input type="radio" id="n2dal" name="aeg" value="2" onclick="handleClickA(this)">
<label for="n2dal">Nädal</label>
<input type="radio" id="kuu" name="aeg" value="3" onclick="handleClickA(this)">
<label for="kuu">Kuu</label><br>
<p>Vali andmete tüüp:</p>
<input type="radio" id="elekter" name="tyyp" value="1" onclick="handleClickT(this)">
<label for="p2ev">Elekter</label>
<input type="radio" id="raha" name="tyyp" value="2" onclick="handleClickT(this)">
<label for="p2ev">Raha</label>
<input type="radio" id="kyte" name="tyyp" value="3" onclick="handleClickT(this)">
<label for="p2ev">Küte</label><br>
<br>
<br>
<div id="chartContainer" style="height: 300px; width: 100%;">
</div>
</body>
</html>