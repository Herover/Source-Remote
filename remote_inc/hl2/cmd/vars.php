<h1>Variables</h1>
<p class="txt">This function is to list and change the cvars your server know.</p>
<p class="txt">To find out what each induvidual cvar means, go to the terminal and type it.</p>
<script>
function navalt(to,more,evenmore)
{
	if(typeof more=="undefined"){more="";}
	more=escape(more);more=more.replace("%3D","=");
	if(gup("IP")){
	window.location="?IP="+escape(gup("IP"))+"&port="+escape(gup("port"))+"&do=vc&var="+escape(more)+"&vto="+escape(evenmore);
	}else{
	window.location="?do="+escape(to)+"&"+more;
	}
}
</script>
<?php
@$var = $server->getRules();
$i=count($var);
$col=false;
foreach ($var as $key=>$value) {
	echo "<div class='pl";
	$i-=1;
	if($i==0){echo " lastpl";}
	if($col){echo "'>";$col=false;}else{echo " altpl'>";$col=true;}
	echo "<h2 class='n'>{$key}</h2>".
	"<table class='fill'><tr><td class='wlong'><input type='text' class='input' value='{$value}' id='{$i}'></td><td class='wshort' onclick=";?>"navb('vc','v=<?php echo $key; ?> '+document.getElementById('<?php echo $i; ?>').value)"<?php echo"><p class='link'>Change<p></td></tr></table></div>";
}
?>