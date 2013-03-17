<?php
echo "<h1>Unbanning</h1><h2>{$_GET["id"]}</h2>";
$ex = @$server->rconExec("removeip ".$_GET["id"]);
echo "<p>Response:</p><p class='bw'>{$ex}</p>";
?>
<p class="link" onclick="navb('pbansip')">Back</p>