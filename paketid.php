<?php
	require("header.php");
?>
<!DOCTYPE html>
<html lang="et">

<body>
        <h1>Elektripakett</h1>
        <br>
    <div class="container">   
        <form class="pakett"  action="pakett.php" method="GET">
		<script src="pakett.js"></script>
            <legend>Fikseeritud hind või fikseerimata hind?</legend>
			<br>
            <label class="radiobtn">Fikseeritud
                <input id="1" type="radio" name="price" value="fikseeritud" onclick="textAll()">
                <span class="checkmark"></span>
            </label><br>
            <label class="radiobtn">Fikseerimata
                <input id="2" type="radio" name="price" value="fikseerimata" onclick="textHide()">
                <span class="checkmark"></span><br>
            </label>
			<p id="p2evahind" style="display:none">
            <legend>Päevahind (kW/h)</legend>
                <input type="number" name="amprice" value="paevahind"><br>
            <br></p>
			<p id="66hind" style="display:none">
            <legend>Ööhind (kW/h)</legend>
                <input type="number" name="pmprice" value="oohind"><br>
            <br></p>
			<p id="tasu" style="display:none">
            <legend>Kohaletoimetamisetasu</legend>
                <input type="number" name="deliveryprice" value="kohaletoimetamisetasu"><br>
            <br></p>
			<p id="marginaal" style="display:none">
            <legend>Müüja marginaal</legend>
                <input type="number" name="sellerprice" value="muujamarginaal"><br>
            <br>
            <div class="button">
                <input type="submit" name="submit" value="SALVESTA">
            </div>
        </form>
    </div>          
</body>
</html> 