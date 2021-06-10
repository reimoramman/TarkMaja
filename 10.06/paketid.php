<?php
	require("header.php");
	
	$hind= file_get_contents('https://dashboard.elering.ee/api/nps/price/EE/latest');
	
	$v2lja=substr($hind, -10, 7);
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html lang="et">

<body>
        <h1>Elektripakett</h1>
        <br>
    <div class="container">
	
        <form class="pakett"  action="pakett.php" method="GET">
		<script src="pakett.js"></script>
            <legend>Fikseeritud hind või fikseerimata hind?</legend>
			<br>
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
            <legend>Päevahind (kW/h)</legend>
                <input type="number" name="p2evahind" value="p2evahind"><br>
            <br></p>
			<p id="text2" style="display:none">
            <legend>Ööhind (kW/h)</legend>
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
			<p id="text5" style="display:none">
            <legend>Kohaletoimetamise tasu</legend>
                <input type="number" name="kohaletasu" value="kohaletasu"><br>
            <br></p>
			<p id="text6" style="display:none">
            <legend>Börsihind (kW/h)</legend>
                <input type="number" name="b6rsihind" value="<?php echo $v2lja/1000 ?>"><br>
            <br></p>
			
            <div class="button">
                <input type="submit" name="submit" value="SALVESTA">
            </div>
        </form>
    </div>          
</body>
</html> 