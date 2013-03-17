<?php 
include "config.php";
include($INCPATH."/multi/get.php");
include($INCPATH."//multi/log.php");
include($INCPATH."/multi/mkmenu.php");?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html>
<head>
<meta name = 'viewport' content = 'width = device-width, user-scalable = yes' />
<meta name="description=" content="A remotecontrol using RCON for Source games such as Counter-strike: Source and HL2:Death-Match. "/>
<link rel="stylesheet" type="text/css" href="i/base.css" />
<link rel="stylesheet" type="text/css" href="i/style.css" />
<meta charset="utf-8" />
<script type="text/javascript">
  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-20518223-3']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

////http://www.netlobo.com/url_query_string_javascript.html
function gup( name )
{
  name = name.replace(/[\[]/,"\\\[").replace(/[\]]/,"\\\]");
  var regexS = "[\\?&]"+name+"=([^&#]*)";
  var regex = new RegExp( regexS );
  var results = regex.exec( window.location.href );
  if( results == null )
    return "";
  else
    return results[1];
}
function nava(to)
{
	window.location=window.location.origin+"/"+to;
}
function navb(to,more)
{
	if(typeof more=="undefined"){more="";}
	more=escape(more);more=more.replace("%3D","=");
	if(gup("IP")){
	window.location="?IP="+escape(gup("IP"))+"&port="+escape(gup("port"))+"&do="+escape(to)+"&"+more;
	}else{
	window.location="?do="+escape(to)+"&"+more;
	}
}

/*http://diveintohtml5.org/storage.html*/
function supports_html5_storage() {
  try {
    return 'localStorage' in window && window['localStorage'] !== null;
  } catch (e) {
    return false;
  }
}
function addPlace(ip,port)
{
/*	if(localStorage["servers"])
	{
		s=localStorage["servers"]+=";"+ip+":"+port;
	}
	else
	{*/
		localStorage["servers"]=ip+":"+port;
//	}
}
function addConect()
{
	if(supports_html5_storage())
	{
		addPlace(document.getElementById("sIP").value,document.getElementById("sPORT").value);
	}
	return 1;
}
function lastPlace()
{
	if(supports_html5_storage()&&localStorage["servers"])
	{
		t=localStorage["servers"].split(":");
		document.getElementById("sIP").value=t[0];
		document.getElementById("sPORT").value=t[1];
	}
}
</script>
<?php include $INCPATH."/hl2/split/top.php"; ?>
</head>
<body>
<div class="mid">
<?php include $INCPATH."/hl2/split/content.php"; ?>
<p class="link right" onclick="window.location='m/?IP='+escape(gup('IP'))+'&port='+escape(gup('port'))+'&do='+escape(gup('do'));">Testing mobile version</p>
<?php if(@$_GET["test"]){echo "<a onclick=\"addPlace('testip321','testport321')\">Test</a>";}
?></div>
</body>
</html>