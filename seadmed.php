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
<div class="container">


    <div id="pealkiri">
    <h1>Seadmed</h1>
    </div>
    <div id="sissejuhatus">
	<h2><?php echo $_GET["seadme_nimetus"]?></h2>
    <form method="POST">
        <div class="button">
            <input type="submit" value= "LÃ¼lita sisse" name="sisse" style="background-color:rgba(161, 0, 161, 0.400)">
            <input type="submit" value= "LÃ¼lita vÃ¤lja" name = "vÃ¤lja" style="background-color:rgba(161, 0, 161, 0.400)">
            <span class="slider"></span>
        </div><br>
    </form>

	<div id="chartContainer" style="height: 300px; width: 100%;">
	</div>

        <h2>Seadme olek</h2>
		<p>Seadme vÃµimsus: <?php echo $_GET["seadme_voimsus"] ?></p>
		
            <!-- <h2>seadme logi</h2>
                    <?php
                    $lines = file('logfile.txt');
                    $first5 = array_slice($lines, 0, 5);
                    echo implode("<ul></ul>", $first5);
                    
                    if(isset($_POST['kogulogi']))
                    {
                            $content = file('logfile.txt');
                            foreach ($content as $line){ 
                                echo ('<ul>' . $line . '</ul>');
                            }
                    }
					if (isset($_POST['test1'])){
						$dir = basename(dirname(__FILE__));
						shell_exec("sh /home/pi/Desktop/tark-maja/relee_sisselylitus.sh");
						shell_exec("python3.5 /home/pi/Desktop/tark-maja/users/$dir/manual_logwrite.py");
					}
					if (isset($_POST['test'])){
						$dir = basename(dirname(__FILE__));
						shell_exec("sh /home/pi/Desktop/tark-maja/relee_valjalylitus.sh");
						shell_exec("python3.5 /home/pi/Desktop/tark-maja/users/$dir/manual_logwrite.py");
						
					}
					
					
                ?>  -->
		<a href="tingimused.php">
        <div class="onebutton" >
			<button>Tingimused</button>
        </div>
		</a><br><br>
		<form method="POST">
           <div class="delete">
            <input type="button" value="Uuenda" name="uuenda" style="background-color:rgba(161, 0, 161, 0.400)" >
			<input type="button" value="Kustuta" name="kustuta" style="background-color:rgba(161, 0, 161, 0.400)">
           </div> 
        </form>
</div>
</div>
</body>
</html>