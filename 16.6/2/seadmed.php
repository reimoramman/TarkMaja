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
function myFunction(number) {
  var x = document.getElementById("myDiv"+number);
  if (x.style.display === "none") {
    x.style.display = "block";
  } else {
    x.style.display = "none";
  }
}
var array = <?php echo json_encode($array); ?>;

  
  var dataPoints = [];
	
function getDataPointsFromCSV(csv,device_id) {
    var dataPoints = csvLines = points = [];
	
    csvLines = csv.split(/[\r?\n|\r|\n]+/);
        
    for (var i = 0; i < csvLines.length; i++)
        if (csvLines[i].split(",")[0].localeCompare(device_id)) {
            points = csvLines[i].split(",").slice(1,-1);
			for (var j = 0; j < points.length/2; j++)
				dataPoints.push({ 
					x: new Date(points[j*2-1]), 
					y: parseFloat(points[j*2]) 		
	    });
	}
    return dataPoints;
}
var i;
for (i = 0; i < 1; i++)
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
</script>
<?php
for ($i= 0; $i < $linecount; $i++){
	echo ('<h2 onclick="myFunction(' .$array[$i][0] .')">' .$array[$i][4] .'</h2>');
	echo ('<div class="container" id="myDiv' .$array[$i][0] .'" style="display:none">');
	include("deviceunit.php");
	echo ('</div>');
	;
}
?>
	
    
</body>
</html>