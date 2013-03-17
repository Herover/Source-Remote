<?php
$playtime=0;
foreach($players as $p) {
	$playtime+=$p->getConnectTime();
}
if($playtime){
	$playtime/=count($players);
	$playtime=round($playtime/60,1);
}
@$var = $server->rconExec("stats");
$var=explode("\n",$var);
$var[0]=preg_split ("/[\s]\s+/",$var[0]);
$var[1]=preg_split ("/[\s]\s+/",$var[1]);
echo "<p class='txt big'>Players <b>{$t["numberOfPlayers"]}<sub>/{$t["maxPlayers"]}</sub></b></p>
<p class='txt big'>Avarage playtime <b>{$playtime}</b> min.</p>
<p class='txt big'>Playing on <b>{$t["mapName"]}</b></p>
<p class='txt big'>The bot-number is <b>{$t["botNumber"]}</b></p>
<p class='txt big'>Tags are &quot;<b>{$t["serverTags"]}</b>&quot;</p>
<br /><p>Stats repports:</p><table style=\"margin-left:23px;border-left:1px solid black;width:370px;\">";
for($i=0;$i<count($var[0]);$i++){
	echo "<tr><td>{$var[0][$i]}</td><td>{$var[1][$i]}</td></tr>";
}
echo "</table>";
//print_r($t);
?>
<p class="link right" onclick="navb('logout')">Log out</p>
