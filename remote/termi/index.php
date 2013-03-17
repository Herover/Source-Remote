<?php
session_start();
include "../config.php";
@require_once 		$INCPATH."/steam-condenser/lib/steam-condenser.php";
include				$INCPATH."/hl2/connect.php";
include				$INCPATH."/multi/log.php";

if(@isBanned())
{
	echo "4";
}
else
{
	$s=init($_POST["IP"],$_POST["port"],$_SESSION["sPASS"]);
	if($s==2)
	{
		try
		{
			echo "2 ".@$server->rconExec($_POST["var"]);
		}
		catch(Exception $e)
		{
			if($e->getMessage()=="Could not read from socket."){echo "3";}
			else{echo "3";}
		}
	}
	else
	{
		echo $s;
	}
}
?>
