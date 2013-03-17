<?php
global $banTime;
//Return false if you have failed too much
function isBanned()
{
	$con = mysql_connect("localhost",$MYSQL_USER,$MYSQL_PASS);
	if (!$con)
	{
	die('Could not connect: ' . mysql_error());
	}

	mysql_select_db("remote_log", $con);

	$result = mysql_query("SELECT * FROM fail
	WHERE IP='{$_SERVER['REMOTE_ADDR']}'");
	$row=mysql_fetch_array($result);
	
/*		if(($row["time"]-(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))-30*60))>0)
			{echo "<!-- ".($row["time"]-(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))-30*60))."-->";
			$result = mysql_query("UPDATE fail SET tries = 0, ban=''
		WHERE IP='{$_SERVER['REMOTE_ADDR']}'");
			}*/
	
	if($row["ban"]=="ban"){return 1;}
	else{return 0;}
}

function logFail(){
	global $banTime;
	echo "<!-- ";
	$con = mysql_connect("localhost",$MYSQL_USER,$MYSQL_PASS);
	if (!$con)
	  {
	  die('Could not connect: ' . mysql_error());
	  }

	mysql_select_db("remote_log", $con);

	$result = mysql_query("SELECT * FROM fail
	WHERE IP='{$_SERVER['REMOTE_ADDR']}'");
	$row=mysql_fetch_array($result);
	$tries=$row["tries"];
		if($row["ban"]=="ban"){echo "banned already -->";
			if(($row["time"]-(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))-30*60))<0)
			{echo $row["time"]-(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))-30*60);
			$result = mysql_query("UPDATE fail SET tries = 0, ban=''
		WHERE IP='{$_SERVER['REMOTE_ADDR']}'");
			}
			$banTime=intval(date("i",$row["time"]-(mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))-30*60)));
			echo $banTime." -->";
			 return false;}
	if($tries)
	{
		if($tries<5)
		{
			echo $tries;
			$result = mysql_query("UPDATE fail SET tries = ".($tries+1).", time=".mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))."
		WHERE IP='{$_SERVER['REMOTE_ADDR']}'");
			if(!$result){echo "Something is wrong" . mysql_error();}else{echo ":D";}
			echo " -->";
			mysql_close($con);
			return true;
		}
		else
		{
			if($row["time"]<time() + (60 * 30))//30 min
			{
				echo "Ban";
				$result = mysql_query("UPDATE fail SET ban = 'ban'
			WHERE IP='{$_SERVER['REMOTE_ADDR']}'");
				mysql_close($con);
				echo " -->";
				return false;
			}
			else
			{
				echo "OK";
			}
		}
	}
	else
	{
		echo $tries;
		$result = mysql_query("INSERT INTO fail (tries, ban, IP, time) VALUES 
	(1,'','{$_SERVER['REMOTE_ADDR']}','".mktime(date("H"),date("i"),date("s"),date("n"),date("j"),date("Y"))."')");
		if(!$result){echo "Something is wrong" . mysql_error();}else{echo ":D";}
		echo " -->";
		mysql_close($con);
		return true;
	}
	echo " -->";
	mysql_close($con);
}
function logStuff($type,$name,$txt){
	echo "<!-- LOGGING: ";
	if(!is_dir($LOGPATH."/{$type}/".date("d-m-Y"))){
		if(mkdir($LOGPATH."/{$type}/".date("d-m-Y"),0777,$recursive=true)){echo "Path made";}
		else{echo "Path error";}
	}
	@$file = fopen($LOGPATH."/{$type}/".date("d-m-Y")."/{$name}.txt","a");
	if($file){echo "Open";}
	else{echo "Not open";}
	if(fwrite($file,$txt,512)){echo "Writed";}
	else{echo "Not writed";}
	@fclose($file);
	echo " -->";
}
?>
