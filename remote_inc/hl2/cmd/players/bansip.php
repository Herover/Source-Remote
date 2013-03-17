<?php
$ex = @$server->rconExec("listip");
$ex=explode("\n",$ex);
$i=count($ex);
$col=false;
?>
<div class='pl<?php if(!$i){echo " lastpl";} ?>'><h1>Bans (IP)</h1><p>Ban player with IP:</p><input type="text" id="who"/><input type="button" value="Ban" onclick="navb('plbip','id='+document.getElementById('who').value)"/>
<p>A IP looks like: <i>XXX.XXX.XXX.XXX</i> where the X's are numbers from 0 to 255.</p></div>
<?php
if($i-1)
{
	foreach($ex as $p)
	{
		$pp=explode(" ",$p);
		if($pp[0]=="IP")
		{
			//wtf
		}
		else
		{
			echo "<div class='pl";
			$i-=1;
			if($i==0){echo " lastpl";}
			if($col){echo "'>";$col=false;}else{echo " altpl'>";$col=true;}
			echo "<h1 class='n'>".$pp[1]."</h1><p>".$pp[3]."</p><p class='link' onclick=";?>"navb('banunip','id=<?php echo $pp[1]; ?>')">Unban</p></div><?php 
		}
	}
}else{
	echo "<div class='pl lastpl'><h2 class='n'>No IP-bans :)</h3></div>";
}
?>
<p class="link" onclick="navb('p')">Back</p>