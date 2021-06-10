<?php
	require("header.php");
?>
<!DOCTYPE html>

<html lang="et">
<br>
    </body>
    <div class="container">
        <form action="seadmed.php" method="GET">
            <div id="pealkiri">
                <h1>Lisa seade</h1>
            </div>

            <div id="sissejuhatus">

                <legend>Nimetus</legend>
                    <input type="text" name="seadme_nimetus"><br>
                <br>
                <legend>Võimsus (W)</legend>
                    <input type="text" name="seadme_voimsus"><br>
                <br>
                <div class="submit">
                    <input type="submit" value="SALVESTA" style="background-color:rgba(161, 0, 161, 0.400)">
                </div>
            </div>
        </div>
        </form>
    </div>
    </body>
    </html>