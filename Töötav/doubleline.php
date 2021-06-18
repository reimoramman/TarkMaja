<?php
	require("header.php");
	
	$hind= file_get_contents('https://dashboard.elering.ee/api/nps/price/EE/current');
	
	$ind=strpos($hind, "price");
	$v2lja = substr($hind, $ind+7, strlen($hind)-59);
	
	if (isset($_POST["price"])){
		$all_text=implode(',', $_POST);
		file_put_contents("pakett.txt", $all_text);
	}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="et">
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<script type="text/javascript">
    var dataPoints = [];
	var dataPoints2 = [];
	let today = new Date()
	var todaystr=today.getFullYear()+'-'+(today.getMonth()+1)+'-'+today.getDate();
function getDataPointsFromCSV(csv) {
    var dataPoints = csvLines = points = [];
    csvLines = csv.split(/[\r?\n|\r|\n]+/);
        
    for (var i = 0; i < csvLines.length-1; i++)
        if (csvLines[i+1].length > 0) {
            points = csvLines[i+1].split(";");
            dataPoints.push({ 
                x: Date.parse(points[1].replaceAll('"','').replaceAll('.','-').replace(' ','T').replace(':00',':00:00').substr(6,4)+points[1].replaceAll('"','').replaceAll('.','-').replace(' ','T').replace(':00',':00:00').substr(2,4)+points[1].replaceAll('"','').replaceAll('.','-').replace(' ','T').replace(':00',':00:00').substr(0,2)+points[1].replaceAll('"','').replaceAll('.','-').replace(' ','T').replace(':00',':00:00').substr(10,9)), 
                y: parseFloat(points[2].replaceAll('"','')) 		
	    });
	}
    return dataPoints;
}

function isDST(d) {
    let jan = new Date(d.getFullYear(), 0, 1).getTimezoneOffset();
    let jul = new Date(d.getFullYear(), 6, 1).getTimezoneOffset();
    return Math.max(jan, jul) != d.getTimezoneOffset(); 
}
function getData2(pakett) {
    var dataPoints2 = line = [];
    line = pakett.split(',');
		if (isDST(today)==false) {
			dataPoints2.push({ 
				x: Date.parse(todaystr+'T00:00:00'),
				y: parseFloat(line[2]+line[3]+line[4]+line[5]+line[7])
		});
			dataPoints2.push({
				x: Date.parse(todaystr+'T08:00:00'), 
				y: parseFloat(line[1]+line[3]+line[4]+line[5]+line[6])
		});
	}
		else {
			dataPoints2.push({
				x: Date.parse(todaystr+'T00:00:00'), 
				y: parseFloat(line[2]+line[3]+line[4]+line[5]+line[7])
		});
			dataPoints2.push({
				x: Date.parse(todaystr+'T07:00:00'), 
				y: parseFloat(line[1]+line[3]+line[4]+line[5]+line[6])
		});
			dataPoints2.push({
				x: Date.parse(todaystr+'T23:00:00'), 
				y: parseFloat(line[2]+line[3]+line[4]+line[5]+line[7])
		});
	}
    return dataPoints;
}
	 
$.get("hinnad.csv", function(data) {
    var chart = new CanvasJS.Chart("chartContainer", {
        title: {
	    text: "Börsihinnad",
        },
        data: [{
	    type: "stepLine",
		xValueType: "dateTime",
		xValueFormatString: "HH:mm",
	    dataPoints: getDataPointsFromCSV(data)
	},{
		type: "stepLine",  
		axisYType: "secondary",
		xValueFormatString: "",
		dataPoints: $.get("pakett.txt", function(data) {getData2(data)})
	}]
    });
		
    chart.render();
 
});
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="et">

<body>
<div class="container">
    <div id="pealkiri">
        <h1>Elektripakett</h1>
    </div>
        <div id="sissejuhatus">
        <form class="pakett" method="POST">
		<script src="pakett.js"></script>
            <legend>Fikseerimata hind, fikseeritud hind või börsihind?</legend>
			<br>
            <label class="radiobtn">Fikseerimata
                <input id="1" type="radio" name="price" value="fikseerimata" onclick="fikseerimata()">
                <span class="checkmark"></span>
            </label><br>
            <label class="radiobtn">Fikseeritud
                <input id="2" type="radio" name="price" value="fikseeritud" onclick="fikseeritud()">
                <span class="checkmark"></span>
            </label><br>
			<label class="radiobtn">Börsihind
                <input id="3" type="radio" name="price" value="b6rsihind" onclick="borsihind()">
                <span class="checkmark"></span><br>
            </label>
			<p id="text1" style="display:none">
            <legend>Päevahind (kWh)</legend>
                <input type="number" name="p2evahind" value="p2evahind"><br>
            <br></p>
			<p id="text2" style="display:none">
            <legend>Ööhind (kWh)</legend>
                <input type="number" name="66hind" value="66hind"><br>
            <br></p>
			<p id="text3" style="display:none">
            <legend>Kuutasu</legend>
                <input type="number" name="kuutasu" value="kuutasu"><br>
            <br></p>
			<p id="text4" style="display:none">
            <legend>Põhihind</legend>
                <input type="number" name="p6hihind" value="p6hihind"><br>
            <br></p>
			<div id="borsihinnad" style="display:none"><br>
				<p>Viimane börsihind on <?php echo $v2lja/10;?> senti/kWh</p>
				<p id="text7">
				<legend>Võrgutasu päeval (kWh)</legend>
					<input type="number" name="v6rkp2ev" value="v6rkp2aev"><br>
				<br></p>
				<p id="text8">
				<legend>Võrgutasu öösel (kWh)</legend>
					<input type="number" name="v6rk66" value="v6rk66"><br>
				<br></p>
			</div>
			<br>
            <div class="submit">
                <input type="submit" name="submit" value="Salvesta">
            </div>
        </form>
    </div>
	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>
</div>          
</body>
</html> 