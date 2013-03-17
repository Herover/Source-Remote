<?php
function mkMenu($items)
{
$quo=chr(34);
	echo "<table class={$quo}nav{$quo}><tr>";
	foreach($items as $item=>$to)
	{
		echo "<th class={$quo}nav{$quo} onClick={$quo}navb('{$to}'){$quo}><p>{$item}</p></th>";
	}
	echo "</tr></table>";
}