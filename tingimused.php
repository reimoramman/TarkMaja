<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tingimused</title>
  <link rel="stylesheet" href="style.css" />
</head>
<body>
<hr />
		<div id="topnav">
			<a href="tarkMaja.html" id="active">Tark Maja</a>
			<a href="seadmed.html">Seadmed</a>
			<a href="lisa.html">Lisa</a>
			<a href="elektripakett.html">Pakett</a>
			<a href="tingimused.php">Tingimused</a>
		</div>
	<hr />
  <div id="pealkiri">
		<h1>Tingimused</h1>
	</div>
  <div id="seadmed">
  <select>
    <option value="0">Valige seade:</option>
    <option value="1">Põrandaküte</option>
    <option value="2">Boiler</option>
    <option value="3">Külmkapp</option>
    <option value="4">Radiaator</option>
  </select>
  <div>
  <br>
  <div id="sisu">
    <form method="POST">
      <legend>Mis kell seade sisselülitub?</legend>
        <input type="time" name="startTime">
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

<?php if(isset($_POST["startTime"]) && isset($_POST["stopTime"])){
  $tingimused = $_POST['startTime']. "\n". $_POST['stopTime']. "\n";
  file_put_contents('tingimused.txt', $tingimused);
}
?>

