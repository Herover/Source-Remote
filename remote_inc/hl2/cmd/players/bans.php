<?php
$ex = @$server->rconExec("listid");
$ex=explode("\n",$ex);
$i=count($ex);
$col=false;
?>
<div class='pl<?php if(!$i){echo " lastpl";} ?>'><h1>Bans (steamid)</h1><p>Ban player with steam-id:</p><input type="text" id="who"/><input type="button" value="Ban" onclick="navb('plb','id='+document.getElementById('who').value)"/>
<p>A steam-id looks like: <i>STEAM_X:X:XXXXXXXX</i> where the X's are numbers.</p></div>
<?php
if($i-1)
{
	foreach($ex as $p)
	{
		$pp=explode(" ",$p);
		if($pp[0]=="ID")
		{
			//wtf
		}
		else
		{
			echo "<div class='pl";
			$i-=1;
			if($i==0){echo " lastpl";}
			if($col){echo "'>";$col=false;}else{echo " altpl'>";$col=true;}
			echo "<h1 class='n'>".$pp[1]."</h1><p>".$pp[3]."</p><p class='link' onclick=";?>"navb('banunid','id=<?php echo $pp[1]; ?>')">Unban</p></div><?php 
		}
	}
}else{
	echo "<div class='pl lastpl'><h2 class='n'>No steam-bans :)</h3></div>";
}
?>
<p class="link" onclick="navb('p')">Back</p>