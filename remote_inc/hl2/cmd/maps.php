<?php
@$var = $server->rconExec("maps *");
$var = explode("\n",$var);
$i=count($var)-1;//First line is not a map
$col=false;
$now="";
foreach ($var as $key=>$value) {
	$now=substr($value,16);
	$now=explode(".",$now);
	if(@$now[1]=="bsp")
	{
		echo "<div class='pl";
		$i-=1;
		if($i==0){echo " lastpl";}
		if($col){echo "'>";$col=false;}else{echo " altpl'>";$col=true;}
		echo "<h2 class='n'>{$now[0]}</h2>"; 
		?><p onclick="navb('mc','m=<?php echo $now[0]; ?>')" class='link'>Change to</p></div><?php
	}
}
?>