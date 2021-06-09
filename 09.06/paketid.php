<?php
	require("header.php");
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
            <label class="radiobtn">Fikseerimata
                <input id="1" type="radio" name="price" value="fikseerimata" onclick="textAll()">
                <span class="checkmark"></span>
            </label><br>
            <label class="radiobtn">Fikseeritud
                <input id="2" type="radio" name="price" value="fikseeritud" onclick="textHide()">
                <span class="checkmark"></span><br>
            </label>
			<p id="text1" style="display:none">
            <legend>Päevahind (kW/h)</legend>
                <input type="number" name="p2evhind" value="p2evahind"><br>
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
            <br>
            <div class="button">
                <input type="submit" name="submit" value="SALVESTA">
            </div>
        </form>
    </div>          
</body>
</html> 