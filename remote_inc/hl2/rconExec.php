<?php
function RExec($v)
{
	global $server;
	try
	{
		$e=@$server->rconExec($v);
		return $e;
	}
	catch(Exception $e)
	{
		return false;
	}
}
?>