<?php
echo "<h1>Unbanning</h1><h2>{$_GET["id"]}</h2>";
$ex = @$server->rconExec("removeid ".$_GET["id"]);
echo "<p>Response:</p><p class='bw'>{$ex}</p>";
?>
<p class="link" onclick="navb('pbans')">Back</p>