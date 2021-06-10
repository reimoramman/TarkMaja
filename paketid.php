<?php
	require("header.php");
?>
<!DOCTYPE html>
<html lang="et">

<body>
    <div class="container">
    <div id="pealkiri">
        <h1>Elektripakett</h1>
    </div>
        <br>
        <div id="sissejuhatus">
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
			<p id="text1" style="display:none">
            <legend>Päevahind (kW/h)</legend>
                <input type="number" name="amprice" value="paevahind"><br>
            <br></p>
			<p id="text2" style="display:none">
            <legend>Ööhind (kW/h)</legend>
                <input type="number" name="pmprice" value="oohind"><br>
            <br></p>
			<p id="text3" style="display:none">
            <legend>Kohaletoimetamisetasu</legend>
                <input type="number" name="deliveryprice" value="kohaletoimetamisetasu"><br>
            <br></p>
			<p id="text4" style="display:none">
            <legend>Müüja marginaal</legend>
                <input type="number" name="sellerprice" value="muujamarginaal"><br>
            <div class="button">
                <br>
                <input type="submit" name="submit" value="SALVESTA" style="background-color:rgba(161, 0, 161, 0.400)">
            </div>
        </form>
    </div>          
</body>
</html> 