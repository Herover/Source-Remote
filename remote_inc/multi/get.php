<?php
function GET($a){
	$i=$_GET[$a];
	//$i=str_replace(array("&","'"),"",$i);
	return $i;}