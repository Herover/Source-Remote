<?php
global $error;
function init($ip,$port,$pass)
{
	try //Check address
	{
		global $server;
		@$server = new SourceServer($ip, $port);
		@$server->initialize();
	}
	catch(Exception $e)
	{
		return 0;
	}
	if(!isset($pass)||$pass==""||$pass==NULL){return -1;}
	try
	{$isucces=@$server->rconAuth($pass);}
	catch(Exception $e)
	{
		global $error;$error=$e->getMessage();return 4; 
	}
	if($isucces){return 2;}
	else{return 1;}
}
?>