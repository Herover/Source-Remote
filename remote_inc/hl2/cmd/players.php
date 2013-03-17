<?php
mkMenu(array("Bans"=>"pbans","IP-bans"=>"pbansip"));
$i=count($players);
$col=false;
$bots=0;
if($i)
{
	foreach($players as $p) {
		if($p->isBot())
		{
			$bots++;
		}
		else
		{
			echo "<div class='pl";
			$i-=1;
			if($i==0&&!$bots){echo " lastpl";}
			if($col){echo "'>";$col=false;}else{echo " altpl'>";$col=true;}
			?><h2 class='n'><p class="link" onclick="navb('plm','STEAM_ID=<?php echo $p->getSteamId()?>')"><?php 
			echo str_replace(Array("<",">"),Array("&lt;","&gt;"),$p->getName())."</p></h2>".
			"<p class='txt'>Score:{$p->getScore()} | Time: ".round($p->getConnectTime())." | Steam-id: {$p->getSteamId()} | K/m: ".round((0+$p->getScore())/(0+$p->getConnectTime())*60,1) ."</p>";?><p class="link" onclick="navb('plk','id=<?php echo $p->getRealId() ?>')">Kick</p></div><?php
		}
	}
	if($bots)
	{
		echo "<div class='pl lastpl";
		if($col){echo "'>";}else{echo " altpl'>";}
		echo "<p>+{$bots} bots.</p></div>";
	}
}else{echo "<h2>No players :)</h2>";}
?>