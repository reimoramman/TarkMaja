<!DOCTYPE html>
<html lang="en">
<body>
	<div id="device12" style="display:none">
		<p>Uus rida</p>
	</div>
	<form class="pakett" method="POST">
		<label class="radiobtn">Fikseerimata
			<input id="1" type="radio" name="price" value="fikseerimata" onclick="showText(device12)">
			<span class="checkmark"></span>
		</label><br>
		<label class="radiobtn">Fikseeritud
			<input id="2" type="radio" name="price" value="fikseeritud" onclick="showText(1)">
			<span class="checkmark"></span>
		</label><br>
	</form>
<script>
function showText(id) {
  var div = document.getElementById(id);
  
  if (div.style.display=="none"){
    div.style.display="block";
  }
  if (div.style.display=="block"){
    div.style.display="none";
  }
}
</script>
			
<p onclick="myFunction(this, 'red')">Click me to change my text color.</p>

<script>
function myFunction(elmnt,clr) {
  elmnt.style.display = "none";
}
</script>
</body>
</html>