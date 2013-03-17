<div class="pl lastpl">
<div class="fill bw" id="termo"></div>
<input clasS="fill bw" id="termi" onKeyPress="Key(event);"/>
<button onClick="Send()">Send</button>
</div>
<script type="text/javascript">
var safemode=true,
	colors=true;
	termo=document.getElementById("termo"),
	termi=document.getElementById("termi");
function Send()
{
var val=termi.value;
var xmlhttp;
if (window.XMLHttpRequest)
  {// code for IE7+, Firefox, Chrome, Opera, Safari
  xmlhttp=new XMLHttpRequest();
  }
else
  {// code for IE6, IE5
  xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  cout(val,"blue");
xmlhttp.onreadystatechange=function()
  {
  if (xmlhttp.readyState==4){
	  if(xmlhttp.status==200)
	  {
		var resp=xmlhttp.responseText;
		if(resp=="0")
		{
			cout("Could not connect server!","red");
		}
		else if(resp=="1")
		{
			cout("Bad password!","red");
		}
		else if(resp=="3")
		{
			cout("Either was no value returned or command took server down shortly","orange");
			termi.value="";
		}
		else if(resp.substr(0,1)=="4")
		{
			cout("You where banned from Lol-remote","red");
		}
		else if(resp.substr(0,1)=="2")
		{
			if(resp=="2")
			{
				cout("OK","green");
				termi.value="";
			}
			if (safemode){resp=safeMe(resp.substr(2,resp.length));}
			var ocol="green";
			if(resp.substr(0,15)=="Unknown command"){ocol="orange";}
			cout(resp,ocol);
			termi.value="";
		}
		else
		{
			cout("The response from lolremote where malformed. Please report...","red");
			cout(resp,"orange");
			console.log(resp);
			termi.value="";
		}
	  }
	  else
	  {
		cout("Error code: "+xmlhttp.status,"red");
	  }
	}
  }
xmlhttp.open("POST","/hl2/termi/",true);
xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
xmlhttp.send("var="+val+"&IP="+escape(gup("IP"))+"&port="+escape(gup("port")));
}
function Key(e)
{
var keynum;
var keychar;
var numcheck;
if(window.event) // IE
    {
    keynum = e.keyCode;
    }
else if(e.which) // Netscape/Firefox/Opera
    {
    keynum = e.which;
    }
//keychar = String.fromCharCode(keynum);
if (keynum==13){Send()}              //Keunum 13 = Enter
/*numcheck = /\d/;
return !numcheck.test(keychar);*/
}
function safeMe(txt)
{
	txt=txt.replace(/</g,"&lt;");txt=txt.replace(/>/gi, "&gt;");
	ra=new Array();ra=txt.split(/\r\n|\r|\n/);txt="";
	for (i=0;i<ra.length;i++){txt+=ra[i]+"<br>";}
	return txt;
}
function cout(txt,col)
{
	if (colors&&col){termo.innerHTML+="<div class='"+col+"'>"+txt+"</div>";}else{termo.innerHTML+="<div>"+txt+"</div>";}
	termo.scrollTop=termo.scrollHeight;
}
</script>
