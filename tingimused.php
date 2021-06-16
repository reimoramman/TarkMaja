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
	
	if(isset($_POST["startTime"]) && isset($_POST["deviceinput"]) && isset($_POST["stopTime"]) && isset($_POST["tingimus"]) && !empty($_POST["startTime"]) && !empty($_POST["deviceinput"]) && !empty($_POST["stopTime"]) && !empty($_POST["tingimus"])){
		$array[$_POST["deviceinput"]-1][1] = $_POST["startTime"];
		$array[$_POST["deviceinput"]-1][2] = $_POST["stopTime"];
		$array[$_POST["deviceinput"]-1][3] = $_POST["tingimus"];
		
		$write_handle = fopen("tingimused.txt", "w");
	
		for($i=0; $i<$linecount;$i++){
			$array[$i]=implode(',',$array[$i]);
		}
		$all_text=implode($array);
		echo $all_text;
		file_put_contents('tingimused.txt', $all_text);
		fclose($write_handle);
	}
	
	
	
    require("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
<script>
function add_field()
{
  var total_text=document.getElementsByClassName("input_text");
  total_text=total_text.length+1;
  document.getElementById("field_div").innerHTML=document.getElementById("field_div").innerHTML+
  "<p id='input_text"+total_text+"_wrapper'><input type='text' class='input_text' id='input_text"+total_text+"' placeholder='Enter Text'><input type='button' value='Remove' onclick=remove_field('input_text"+total_text+"');></p>";
}
function remove_field(id)
{
  document.getElementById(id+"_wrapper").innerHTML="";
}
</script>
</head>
<body>
  <div id="pealkiri">
		<h1>Tingimused</h1>
	</div>

  <div id="seadmed">
	<div>
	<div id="wrapper">
<div id="field_div">
</div>
</div>

  <br>
  <div id="sisu">
    <form method="POST">
	<script src="tingimused.js"></script>
	<legend>Millist seadet haldad?</legend>
	<select name="deviceinput" id="deviceinput" onchange="doChange()">
	<option value="" selected disabled>Seade</option>
	<?php for ($i= 0; $i < $linecount; $i++){
		echo '<option value="' .$array[$i][0] .'"';
		echo ">" .$array[$i][4] ."</option> \n";
	}?>
	</select>
	<br>
	<script type="text/javascript">  
        function doChange() {
			var array = <?php echo json_encode($array); ?>;
			var device = document.getElementById("deviceinput");
			var start = document.getElementById("startTime");
			var stop = document.getElementById("stopTime");
			var tingimus = document.getElementById("tingimus");
			start.value=array[device.value-1][1];
			stop.value=array[device.value-1][2];
			tingimus.value=array[device.value-1][3];
        }  
    </script>

			<input type="button" value="Add TextBox" onclick="add_field();">

      <legend>Mis kell seade sisselülitub?</legend>
        <input type="time" id="startTime" name="startTime" value="">
      <br>
      <legend>Mis kell seade väljalülitub?</legend>
        <input type="time" id="stopTime" name="stopTime" value="">
      <br>
	  <legend>Mis tingimusel seade sisse lülitub?</legend>
        <input type="text" id="tingimus" name="tingimus" value="">
      <br><br>
        <input type="submit" name="submit" value="Salvesta">
    </form>
  </div>
</body>
</html>