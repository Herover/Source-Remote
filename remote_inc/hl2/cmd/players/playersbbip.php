<?php
$ex = @$server->rconExec("banip 0 ".trim($_GET["id"]));
echo "<p>Response:</p><p class='bw'>{$ex}</p>";
?>
<p class="link" onclick="navb('p')">Back</p>