<div class="box" id="box"><?php

switch($works)
{
	case 2:
		echo "<h1 class='txt' onClick='navb()'>Main panel for</h1><h2 class='txt' onClick='navb()'>{$t["serverName"]}</h2>";
		mkMenu(array("Players"=>"p","Maps"=>"m","Variables"=>"v","Terminal"=>"t"));
		
		switch(@$_GET["do"])
		{
			case "p":
				include("{$INCPATH}/hl2/cmd/players.php");
				break;
			case "plm":
				include("{$INCPATH}/hl2/cmd/playersm.php");
				break;
			case "plb":
				include("{$INCPATH}/hl2/cmd/playersb.php");
				break;
			case "plbb":
				include("{$INCPATH}/hl2/cmd/playersbb.php");
				break;
			case "plk":
				include("{$INCPATH}/hl2/cmd/playersk.php");
				break;
			case "plkk":
				include("{$INCPATH}/hl2/cmd/playerskk.php");
				break;
			case "plbip":
				include("{$INCPATH}/hl2/cmd/players/playersbip.php");
				break;
			case "plbbip":
				include("{$INCPATH}/hl2/cmd/players/playersbbip.php");
				break;
			case "pbans":
				include("{$INCPATH}/hl2/cmd/players/bans.php");
				break;
			case "banunid":
				include("{$INCPATH}/hl2/cmd/players/bansunid.php");
				break;
			case "pbansip":
				include("{$INCPATH}/hl2/cmd/players/bansip.php");
				break;
			case "banunip":
				include("{$INCPATH}/hl2/cmd/players/bansunip.php");
				break;
			case "t":
				include("{$INCPATH}/hl2/cmd/termg.php");
				break;
			case "v":
				include("{$INCPATH}/hl2/cmd/vars.php");
				break;
			case "vc":
				include("{$INCPATH}/hl2/cmd/varsch.php");
				break;
			case "m":
				include("{$INCPATH}/hl2/cmd/maps.php");
				break;
			case "mc":
				include("{$INCPATH}/hl2/cmd/mapsc.php");
				break;
			case "logout":
				include("{$INCPATH}/multi/logout.php");
				break;
			default:
				include("{$INCPATH}/hl2/cmd/front.php");
		}
		break;
	case 0:
		echo "<h1 class='txt'>Failed</h1><p class='txt'>Could not establish a connection to the server. Misspelled address(<b>{$_GET["IP"]}, perhaps?</b></p>
		<p><a href='?'>Back</a></p>";
		break;
	case 1:
		$t = @$server->getServerInfo();
		echo "<h1 class='txt'>Failed</h1><p class='txt'>The password did not work. The server name where <b>{$t["serverName"]}</b>. If this is wrong, try check your address.</p>
		<p><a href='?'>Exit</a></p>";
		break;
	case 3:
		echo "<h1 class='txt'>Banned!</h1><p class='txt'>You where banned.</p>
		<p class='txt'>You may come back in {$banTime} minutes.</p>
		<p class='txt'>If you didn't try to crack a password, we apoligize this.</p>";
		break;
	case 4:
		echo "<h1 class='txt'>Error!</h1><p class='txt'>Something bad happened.</p><p class='txt'>If this keeps happening, try restart your server manually or update.</p><p class='txt'>({$error})</p>";
		break;
	default:
?>
<form action="?" method="POST">
<h1 class="txt">SRCDS Remote</h1>
<label for="sIP"><p>Address (IP:port)</p></label>
<table class="fill"><tr><td style="width:auto;"><input type="text" class="input" id="sIP" name="sIP"/></td><td style="width:15%"><input type="text" class="input" id="sPORT" name="sPORT"/></td></tr></table>
<label for="sPASS"><p>Password</p></label><input type="password" class="input" id="sPASS" name="sPASS"/>
<div class="fill"><input type="submit" onclick="addConect()" value="Connect" class="input button"/></div>
<p class="txt">You have limited tries, and are being monitored - by pressing Connect,
you agree that you are the prooper owner of the server on the specified address</p>
<p class="txt">For more info, read our <a href="http://remote.lolbrothers.com">terms of use</a> or <a href="http://remote.lolbrothers.com/?do=hl2&">info</a> page about the hl2 remote.</p>
<p class="txt">Also, try <a href="remote.lolbrothers.com/hl2/beta/">beta version</a>!</p>
</form>
<script>lastPlace();isMobile();</script>
<?php 
}
 ?>
</div>
