<?php
	$file="tingimused.txt";
	$linecount = 0;
	$handle = fopen($file, "r");
	while(!feof($handle)){
	  $line = fgets($handle);
	  $linecount++;
	}

	fclose($handle);

	
	$file_handle = fopen("tingimused.txt", "r");
	$array = array($linecount);
	$line = 0;
	while (!feof($file_handle) ) {
		$line_of_text = fgets($file_handle);
		$parts = explode(',', $line_of_text);
		$array[$line]=$parts;
		$line++;
	}
	echo $array[0][0];
	fclose($file_handle);
    require("header.php");
?>
<!DOCTYPE html>
<html lang="et">

<body>
    <h1>Seadmed</h1><br><br>
	
	
	
	
	
	
<script type="text/javascript" src="https://canvasjs.com/assets/script/jquery-1.11.1.min.js"></script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript">
    var dataPoints = [];
	var array = <?php echo json_encode($array); ?>;
function getDataPointsFromCSV(csv,device_id) {
    var dataPoints = csvLines = points = [];
	
    csvLines = csv.split(/[\r?\n|\r|\n]+/);
        
    for (var i = 0; i < csvLines.length; i++)
        if (csvLines[i].split(",")[0].localeCompare(device_id)) {
            points = csvLines[i].split(",")[1:];
            for (var j = 0; j < points.length/2; j++)
				dataPoints.push({ 
					x: new Date(points[j*2]), 
					y: parseFloat(points[j*2-1]) 		
				});
			}
		}
	}
    return dataPoints;
}
var i;
for (i = 0; i < array.length; i++) {
  var device_id=array[i][0];
	$.get("sorted.csv", device_id, function(data,id) {
		var chart = new CanvasJS.Chart("chartContainer"+id, {
			title: {
			text: array[i][4],
			},
			data: [{
			type: "line",
			dataPoints: getDataPointsFromCSV(data,id)
		}]
		});
			
		chart.render();
	 
	});
}
	</script>
	<script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
	<script type="text/javascript">
function showText(id){
	var div = document.getElementById(id);
	if(div.style.display=="none"){
		id.style.display="block";
	}
	if (div.style.display=="block"){
		div.style.display="none";
	}
}
</script>
	<?php for ($i= 0; $i < $linecount; $i++){
	include("deviceunit.php");}?>
	
    
</body>
</html>