<?php
	$file="reeglid.txt";
	$linecount = 0;
	$handle = fopen($file, "r");
	while(!feof($handle)){
	  $line = fgets($handle);
	  $linecount++;
	}

	fclose($handle);

	
	$file_handle = fopen("reeglid.txt", "rb");
	$array = array($linecount);
	$line = 0;
	while (!feof($file_handle) ) {
		$line_of_text = fgets($file_handle);
		$parts = explode(',', $line_of_text);
		$array[$line]=$parts;
		$line++;
	}
	echo $array[0][0];
	fclose($file_handle);
    require("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<body>
  <div id="pealkiri">
		<h1>Tingimused</h1>
	</div>
  <div id="seadmed">
	
  
    <div>
  <br>
  <div id="sisu">
    <form method="POST">
	<legend>Millist seadet haldad?</legend>
	<?php
	echo '<select name="deviceinput" id="deviceinput">' ."\n";
	echo '<option value="" selected disabled>Seade</option>' ."\n";
	for ($i= 0; $i < $linecount-1; $i++){
		echo '<option value="' .$array[$i][0] .'"';
		echo ">" .$array[$i][4] ."</option> \n";
	
	}
	echo "</select> \n";
  ?>
	<br>
      <legend>Mis kell seade sisselülitub?</legend>
        <input type="time" name="startTime" value="<?php echo  ?>">
      <br>
      <legend>Mis kell seade väljalülitub?</legend>
        <input type="time" name="stopTime">
      <br>
      <div class="submit">
        <input type="submit" name="submit" value="Salvesta">
      </div>
    </form>
  </div>
</body>
</html>

<?php if(isset($_POST["startTime"]) && isset($_POST["deviceinput"]) && isset($_POST["stopTime"])){
	
	
	
	
	
	
	
	
	
	$file_handle = fopen("reeglid.txt", "rb");
	
	$array = array($linecount);
	$line = 0;
	
	while (!feof($file_handle) ) {
		$line_of_text = fgets($file_handle);
		$parts = explode(',', $line_of_text);
		$array[$line]=$parts;
		$line++;
	}
	
	echo $array[0][0];
	fclose($file_handle);
	
	
	('tingimused.txt', $_POST['deviceinput']."," . $_POST['startTime']."," . $_POST['stopTime']."," . "\n");
}
?>

