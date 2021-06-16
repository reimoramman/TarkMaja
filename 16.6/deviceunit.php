<h1>Elektripakett</h1>
        <br>
    <div class="container">
	
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