<?php
    require("header.php");
?>
<!DOCTYPE html>
<html lang="et">
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
	    text: "Statistika",
        },
        data: [{
	    type: "line",
	    dataPoints: getDataPointsFromCSV(data)
	}]
    });
		
    chart.render();
 
});
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<body>



     <h1>Seadmed</h1>
	 <h2><?php echo $_GET["seadme_nimetus"]?></h2>
    <form method="POST">
        <div class="button">
            <input type="submit" value= "Lülita sisse" name="sisse" >
            <input type="submit" value= "Lülita välja" name = "v2lja">
            <span class="slider"></span>
        </div><br>
    </form>

	<div id="chartContainer" style="height: 300px; width: 30%;">
	</div>

    <div class="container">
        <h2>Seade</h2>
		<p>Seadme võimsus: <?php echo $_GET["seadme_voimsus"] ?></p>
		<a href=“tingimused.php”>
			<button>Tingimused</button>
		</a><br><br>
		<form method="POST">
           <div class="delete">
            <input type="button" value="Uuenda" name="uuenda" >
			<input type="button" value="Kustuta" name="kustuta" >			
           </div> 
        </form>
    
    </div>
    
</body>
</html>