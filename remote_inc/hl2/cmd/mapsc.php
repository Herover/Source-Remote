<?php
try{$ex = @$server->rconExec("changelevel ".trim(@$_GET["m"]));
echo "<h1>Changed map to</h1><h2>".$ex."</h2>";}
catch(Exception $e)
{echo "<p>Mapchanges usally don't send any reply, but if you see this page, the request where problably succesfull.</p>";}

?>
<p onclick="navb('m')" class="link">Back</p>