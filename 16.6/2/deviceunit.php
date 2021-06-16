<form method="POST">
<div class="switch">
	<input type="submit" value= "Lülita sisse" name="sisse<?php echo $array[$i][0] ; ?>" id="sisse<?php echo $array[$i][0] ; ?>">
	<input type="submit" value= "Lülita välja" name ="v2lja<?php echo $array[$i][0] ; ?>" id="v2lja<?php echo $array[$i][0] ; ?>">
</div><br>
<p>Seadme võimsus: <?php echo $array[$i][5] ; ?></p>
<div id="chartContainer<?php echo $array[$i][0] ; ?>" style="height: 300px; width: 100%;">
</div>
<a href="tingimused.php">
	<button>Tingimused</button>
</a><br><br>
	<div class="manage">
		<input type="submit" value="Uuenda" name="uuenda<?php echo $array[$i][0] ; ?>" id="uuenda<?php echo $array[$i][0] ; ?>">
		<input type="submit" value="Kustuta" name="kustuta<?php echo $array[$i][0] ; ?>" id="kustuta<?php echo $array[$i][0] ; ?>">			
	</div>
	
</form>