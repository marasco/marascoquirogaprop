<?php 

if ($_GET['show_errors'])
    ini_set("display_errors",TRUE);
else
    ini_set("display_errors",FALSE);
define("CPP",20);
define("URL_BASE","http://www.marascoquirogaprop.com.ar/");
$admin = isset($_COOKIE['mqlogin'])?TRUE:FALSE;
?>
