<div class="container">
        <form class="script" method="POST">
		<script src="script.js"></script>
			<br>
			<label class="radiobtn">Börsihind
                <input id="<?php echo json_encode($array[$i][0]); ?>" type="radio" name="price" value="b6rsihind" onclick="<?php echo "borsihind" ."(borsihinnad)"; ?>">
                <span class="checkmark"></span><br>
            </label>
			
			<div class="container" id="borsihinnad" style="display:none">
				<form method="POST">
				<div class="button">
					<input type="submit" value= "Lülita sisse" name="sisse" >
					<input type="submit" value= "Lülita välja" name ="v2lja">
					<span class="slider"></span>
				</div><br>
				</form>
				<p>Seadme võimsus: <?php echo $array[$i][5] ?></p>
				<div id="chartContainer<?php echo $array[$i][0]; ?>" style="height: 300px; width: 100%;">
				</div>
				<a href="tingimused.php">
					<button>Tingimused</button>
				</a><br><br>
				<form method="POST">
				   <div class="delete">
					<input type="button" value="Uuenda" name="uuenda" >
					<input type="button" value="Kustuta" name="kustuta" >			
				   </div> 
				</form>
			
			</div>
			<br>
            <div class="submit">
                <input type="submit" name="submit" value="Salvesta">
            </div>
        </form>
    </div> 