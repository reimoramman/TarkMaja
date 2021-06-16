<?php
	$file="tingimused.txt";
	$linecount = 0;
	$handle = fopen($file, "r");
	while(!feof($handle)){
	  $line = fgets($handle);
	  $linecount++;
	}

	fclose($handle);

	
	$file_handle = fopen("tingimused.txt", "r");
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
<meta charset="utf-8">
<html lang="et">
<script>
function borsihind(el, eds){
	
	var radio = document.getElementById(el.id);
	var bors = document.getElementById(eds);
	
	if (radio.checked == true){
		
	bors.style.display = 'block';
	}
}
</script>
<body>
<?php for ($i= 0; $i < 1; $i++){
	include("newadd.php");}?>
             
</body>
</html> s