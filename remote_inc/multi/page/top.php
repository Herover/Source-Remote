<html>
<head>
<meta name = 'viewport' content = 'width = 400px, user-scalable = no' />
<link rel="stylesheet" type="text/css" href="/i/style.css" />
<link rel="stylesheet" type="text/css" href="i/style.css" />
<meta charset="utf-8" />
<script type="text/javascript">
<![CDATA[

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
]]>
</script>