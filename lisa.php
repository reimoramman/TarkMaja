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
$array = array($linecount+1);
$line = 0;
while (!feof($file_handle) ) {
    $line_of_text = fgets($file_handle);
    $parts = explode(',', $line_of_text);
    $array[$line]=$parts;
    $line++;
}
$array[$linecount]=$array[$linecount-1];
echo $array[0][0];
fclose($file_handle);

if(isset($_POST["seadme_nimetus"]) && isset($_POST["seadme_voimsus"]) && !empty($_POST["seadme_nimetus"]) && !empty($_POST["seadme_voimsus"])){
    $array[$linecount][0] = $array[$linecount-1][0]+1;
    $array[$linecount][1] = 0;
    $array[$linecount][2] = 0;
    $array[$linecount][3] = 0;
    $array[$linecount][4] = $_POST["seadme_nimetus"];
    $array[$linecount][5] = $_POST["seadme_voimsus"];
    
    $write_handle = fopen("tingimused.txt", "w");

    for($i=0; $i<$linecount+1;$i++){
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

<html lang="et">
<br>
    </body>
    <div class="container">
        <form action="seadmed.php" method="GET">
            <div id="pealkiri">
                <h1>Lisa seade</h1>
            </div>

            <div id="sissejuhatus">
                <div id="dynamycCheck">
                    <input type="button" value="Create Element" onclick="createNewElement()";
                </div>
                <div id="newElementId">New inputbox goes here:</div>
                

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