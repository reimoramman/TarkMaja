<form method="POST">
<div class="button">
	<input type="submit" value= "Lülita sisse" name="sisse" >
	<input type="submit" value= "Lülita välja" name ="v2lja">
	<span class="slider"></span>
</div><br>
<p>Seadme võimsus: <?php echo $array[$i][5] ; ?></p>
<div id="chartContainer<?php echo $array[$i][0] ; ?>" style="height: 300px; width: 100%;">
</div>
<a href="tingimused.php">
	<button>Tingimused</button>
</a><br><br>
	<div class="delete">
	<input type="button" value="Uuenda" name="uuenda" >
	<input type="button" value="Kustuta" name="kustuta" >			
	</div>
	<div class="submit">
		<input type="submit" name="submit" value="Salvesta">
	</div> 
</form>