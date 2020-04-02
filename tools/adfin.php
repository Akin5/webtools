<html>
<head>
<meta http-equiv="author" content="The Alchemist"/>
<title>
Admin Finder
</title>
<link href="https://fonts.googleapis.com/css?family=Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text" rel="stylesheet" type="text/css"> 
<style>
body {
color: white;
font-size: 50;
text-align: center;
}
input,select,textarea{
border: 1px solid red;
background: transparent;
font-family: Iceberg;
font-size: 15px;
color: white;
-moz-border-radius: 5px;
-webkit-border-radius:5px;
border-radius: 5px;
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
.header {
    background: black;
    border: 1px solid red;
    border-radius: 10px;
    padding: 10px;
    }
</style>
</head>
<body bgcolor=black>
<div class="header">
<img src="https://i.ibb.co/sKKdLj1/IMG-20190828-222220.png" width="400" weight="400">
</div>
<div class="menu">
<marquee behavior="alternate"><font color="red" face="Metal Mania">××××××××××××          ADMIN PANEL FINDER       ×××××××××××××</font></marquee>
</div>
<form method="POST" action="<?php $PHP_SELF; ?>">
<div class="menu">
<font size="10" face="Iceberg" color="red">TARGET</font><br>
<input type="text" name="url" placeholder="http:TARGET.com" style="text-align:center;width:500;weight:500;;"/>
<br>
<input type="submit" name="submit" value="SCAN"/>
</div>
<br>
<br>
<?php
//This code was created by The Alchemist
function xss_protect($data, $strip_tags = false, $allowed_tags = "") { 
    if($strip_tags) {
  $data = strip_tags($data, $allowed_tags . "<b>");
    }

    if(stripos($data, "script") !== false) { 
  $result = str_replace("script","scr<b></b>ipt", htmlentities($data, ENT_QUOTES)); 
    } else { 
  $result = htmlentities($data, ENT_QUOTES); 
    } 

    return $result;
}
function urlExist($url)
{
    $handle   = curl_init($url);
    if (false === $handle)
    {
    return false;
    }
    curl_setopt($handle, CURLOPT_HEADER, false);
    curl_setopt($handle, CURLOPT_FAILONERROR, true);
    curl_setopt($handle, CURLOPT_HTTPHEADER, Array("User-Agent: Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.15) Gecko/20080623 Firefox/2.0.0.15") ); // request as if Firefox
    curl_setopt($handle, CURLOPT_NOBODY, true);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, false);
    $connectable = curl_exec($handle);
    curl_close($handle);
    return $connectable;
}
    if(isset($_POST['submit']) && isset($_POST['url']))
    {
  $url= htmlentities(xss_protect($_POST['url']));
  if(filter_var($url, FILTER_VALIDATE_URL))
  {
    $trying = array('admin/','adminweb','Administrator','redaktur','superadmin','paneladmin','administrator/','admin1/','admin2/','admin3/','admin4/','admin5/','usuarios/',
    'usuario/','administrator/','moderator/','webadmin/','adminarea/','bb-admin/','adminLogin/','admin_area/',
    'panel-administracion/','instadmin/','memberadmin/','administratorlogin/','adm/','admin/account.php',
    'admin/index.php','admin/login.php','admin/admin.php','admin/account.php','admin_area/admin.php',
    'admin_area/login.php','siteadmin/login.php','siteadmin/index.php','siteadmin/login.html','admin/account.html',
    'admin/index.html','admin/login.html','admin/admin.html','admin_area/index.php','bb-admin/index.php','bb-admin/login.php',
    'bb-admin/admin.php','admin/home.php','admin_area/login.html','admin_area/index.html','admin/controlpanel.php','admin.php',
    'admincp/index.asp','admincp/login.asp','admincp/index.html','admin/account.html','adminpanel.html','webadmin.html',
    'webadmin/index.html','webadmin/admin.html','webadmin/login.html','admin/admin_login.html','admin_login.html',
    'panel-administracion/login.html','admin/cp.php','cp.php','administrator/index.php','administrator/login.php',
    'nsw/admin/login.php','webadmin/login.php','admin/admin_login.php','admin_login.php','administrator/account.php',
    'administrator.php','admin_area/admin.html','pages/admin/admin-login.php','admin/admin-login.php','admin-login.php',
    'bb-admin/index.html','bb-admin/login.html','acceso.php','bb-admin/admin.html','admin/home.html',
    'login.php','modelsearch/login.php','moderator.php','moderator/login.php','moderator/admin.php','account.php',
    'pages/admin/admin-login.html','admin/admin-login.html','admin-login.html','controlpanel.php','admincontrol.php',
    'admin/adminLogin.html','adminLogin.html','admin/adminLogin.html','home.html','rcjakar/admin/login.php',
    'adminarea/index.html','adminarea/admin.html','webadmin.php','webadmin/index.php','webadmin/admin.php',
    'admin/controlpanel.html','admin.html','admin/cp.html','cp.html','adminpanel.php','moderator.html',
    'administrator/index.html','administrator/login.html','user.html','administrator/account.html','administrator.html',
    'login.html','modelsearch/login.html','moderator/login.html','adminarea/login.html','panel-administracion/index.html',
    'panel-administracion/admin.html','modelsearch/index.html','modelsearch/admin.html','admincontrol/login.html',
    'adm/index.html','adm.html','moderator/admin.html','user.php','account.html','controlpanel.html','admincontrol.html',
    'panel-administracion/login.php','wp-login.php','adminLogin.php','admin/adminLogin.php','home.php','admin.php',
    'adminarea/index.php','adminarea/admin.php','adminarea/login.php','panel-administracion/index.php',
    'panel-administracion/admin.php','modelsearch/index.php','modelsearch/admin.php','admincontrol/login.php',
    'adm/admloginuser.php','admloginuser.php','admin2.php','admin2/login.php','admin2/index.php','usuarios/login.php',
    'adm/index.php','adm.php','affiliate.php','adm_auth.php','memberadmin.php','administratorlogin.php','admin.asp','admin/admin.asp',
    'admin_area/admin.asp','admin_area/login.asp','admin_area/index.asp','bb-admin/index.asp','bb-admin/login.asp',
    'bb-admin/admin.asp','pages/admin/admin-login.asp','admin/admin-login.asp','admin-login.asp','user.asp','webadmin/index.asp',
    'webadmin/admin.asp','webadmin/login.asp','admin/admin_login.asp','admin_login.asp','panel-administracion/login.asp',
    'adminLogin.asp','admin/adminLogin.asp','home.asp','adminarea/index.asp','adminarea/admin.asp','adminarea/login.asp',
    'panel-administracion/index.asp','panel-administracion/admin.asp','modelsearch/index.asp','modelsearch/admin.asp',
    'admincontrol/login.asp','adm/admloginuser.asp','admloginuser.asp','admin2/login.asp','admin2/index.asp','adm/index.asp',
    'adm.asp','affiliate.asp','adm_auth.asp','memberadmin.asp','administratorlogin.asp','siteadmin/login.asp','siteadmin/index.asp');
    foreach($trying as $sec)
    {
    $urll=$url.'/'.$sec;
    if(urlExist($urll))
    {
    echo '<p align="center"><font face="Iceberg" color="cyan">'.$urll.'  >>> OK</font></p>';
    exit;
    }
    else
    {
    echo '<p align="center"><font face="Iceberg" color="red">'.$urll.' >>> NOT FOUND :(</font></p>';
    }   
    }
    echo '<p align="center"><font face="Iceberg" color="yellow" size="5">Could not find admin page.</font></p>';
  }
  else
  {
    echo '<p align="center"><font face="Iceberg" color="yellow" size="5">Invalid URL entered.</font></p>';    
  }
    }
?>
</body>
</html>