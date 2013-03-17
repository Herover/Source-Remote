<?php
$ex = @$server->rconExec("kickid ".$_GET["id"]);
echo "<p>Response:</p><p class='bw'>{$ex}</p>";
?>
<p class="link" onclick="navb('p')">Back</p>