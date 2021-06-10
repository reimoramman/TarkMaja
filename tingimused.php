<?php
    require("header.php");
?>

<!DOCTYPE html>
<html lang="en">
<body>
  <div class="container">
  <div id="pealkiri">
		<h1>Tingimused</h1>
	</div>
  <div id="sissejuhatus">
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
        <br>
        <input type="submit" name="submit" value="Salvesta" style="background-color:rgba(161, 0, 161, 0.400)">
      </div>
    </form>
  </div>
  </div>
</body>
</html>

<?php if(isset($_POST["startTime"]) && isset($_POST["stopTime"])){
  $tingimused = $_POST['startTime']. "\n". $_POST['stopTime']. "\n";
  file_put_contents('tingimused.txt', $tingimused);
}
?>

