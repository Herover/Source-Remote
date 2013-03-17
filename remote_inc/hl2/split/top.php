<?php

$works=-1;
if (@$_POST["sIP"])
{
	
	$_SESSION["sPASS"]=$_POST["sPASS"];
	header("Location: ?IP=".urlencode($_POST["sIP"])."&port=".urlencode($_POST["sPORT"]));
}
else
{ 
	if(@$_GET["IP"])
	{
		
		if(!$_SESSION["sPASS"])
		{header("Location: ?");}
		//set_include_path("/");
		//echo get_include_path();
		@require_once $INCPATH."/steam-condenser/lib/steam-condenser.php";
		/*
		try //Check address
		{
			@$server = new SourceServer($_GET["IP"], 27045);
			@$server->initialize();
		}
		catch(Exception $e)
		{
			die("<h1 class='txt'>Failed</h1><p class='txt'>Could not establish a connection to the server. Misspelled address, perhaps?</p><p><a href='index.php'>Back</a></p>");
		}
		*/
		include($INCPATH."/hl2/connect.php");
		$error=false;
		$works=init($_GET["IP"],$_GET["port"],$_SESSION["sPASS"]);
		@logStuff("hl2",$_GET["IP"]."-".$_GET["port"],$_SERVER['REMOTE_ADDR']."\n");
		if($works==2)
		{
			include($INCPATH."/hl2/rconExec.php");
			@$players=$server->getPlayers($_SESSION["sPASS"]);
			$t = @$server->getServerInfo($_SESSION["sPASS"]);
			echo "<title>Main pannel for {$t["serverName"]}</title>";
			global $OK;
			$OK=true;
		}
		else{echo "<title>SRCDS Remote.</title>";}
	}
	else
	{
		echo "<title>SRCDS Remote</title>";
	}
}
?>
