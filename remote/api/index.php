<?php

header("Content-Type:application/json");

include "../config.php";
include $INCPATH."hl2/connect.php";
@require_once $INCPATH."/steam-condenser/lib/steam-condenser.php";

$STATUSCODES = array(
	'OK' => 0,
	'ERROR' => 1
);

//Inputs to whatever goes on
$VERSION = null; //API version

//Outputs to user
$DATA = null; //Data comming out
$STATUS = $STATUSCODES["OK"];
$ERRORSTR="";


if(isset($_GET["v"])){
	$VERSION = $_GET["v"];
}

switch ($VERSION) {
	case 'b1':
		include $INCPATH."hl2/api/1.php";
		break;
	
	case '1':
		include $INCPATH."hl2/api/1.php";
		break;
	
	default:
		# code...
		break;
}

echo '{';
	echo '"status":'.$STATUS;
	if($STATUS !== 0){
		echo ',"error":"'.$ERRORSTR.'"';
	}
	if($DATA!==null){
		echo ',"data":'.$DATA;
	}
echo '}';
?> 