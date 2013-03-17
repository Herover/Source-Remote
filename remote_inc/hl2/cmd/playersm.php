<?php
$pm=false;
foreach($players as $pl)
{
	if ($pl->getSteamId()==GET("STEAM_ID"))
	{
		$pm=true;
		echo "<h1><a target='_blank' href='http://steamcommunity.com/profiles/".SteamId::convertSteamIdToCommunityId(GET("STEAM_ID"))."'>".str_replace(Array("<",">"),Array("&lt;","&gt;"),$pl->getName())."</a></h1><p class='txt'>K/m: ".(0+$pl->getScore())/(0+$pl->getConnectTime())*60 ."</p>";
		?><p><a class="link" onclick="navb('plk','id=<?php echo $pl->getRealId(); ?>')">Kick</a> - <a class="link" onclick="navb('plb','id=<?php echo $pl->getRealId(); ?>')">Ban</a></p><?php
		echo 
		"<p class='big'>Ingame information:</p>
		<div class='pl altpl'><h2>Name:</h2><p>".str_replace(Array("<",">"),Array("&lt;","&gt;"),$pl->getName())."</p></div>".
		"<div class='pl'><h2>Score:</h2><p>{$pl->getScore()}</p></div>".
		"<div class='pl altpl'><h2>Ping:</h2><p>{$pl->getPing()}</p></div>".
		"<div class='pl '><h2>Time:</h2><p>{$pl->getConnectTime()}</p></div>".
		"<div class='pl altpl'><h2>Address:</h2><p>{$pl->getIpAddress()}:{$pl->getClientPort()}</p></div>".
		"<div class='pl '><h2>Steam-Id:</h2><p>{$pl->getSteamId()}</p></div>".
		"<div class='pl altpl'><h2>RealId/userId:</h2><p>{$pl->getRealId()}</p></div>".
		"<div class='pl '><h2>Rate:</h2><p>{$pl->getRate()}</p></div>".
		"<div class='pl altpl'><h2>State:</h2><p>{$pl->getState()}</p></div>".
		"<div class='pl '><h2>Bot:</h2><p>{$pl->isBot()}</p></div>".
		"<div class='pl altpl lastpl'><h2>Extended:</h2><p>{$pl->isExtended()}</p></div>";
	}
}
if(!$pm){echo "<h1>Failed</h1><p>Could not find any player with steam-id {$_GET["STEAM_ID"]}, disconnected perhaps?</p>";?><p class="link" onclick="navb('p')">Back</p><?php }

?>
