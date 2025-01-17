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
			<div id="borsihinnad" style="display:none"><br>
				<p>Viimane börsihind on <?php echo $v2lja/10;?> senti/kWh</p>
				<p id="text7" style="display:none">
				<legend>Võrgutasu päeval (kWh)</legend>
					<input type="number" name="v6rkp2ev" value="v6rkp2aev"><br>
				<br></p>
				<p id="text8" style="display:none">
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
</div>          
</body>
</html> 