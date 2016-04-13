<?php
ini_set("display_errors",false);
 	if ($_POST['n0']=='fernando' && $_POST['n1']=='palat0'){
            setcookie('mqlogin', 'home', time()+3600*24, "/");
            echo 'OKLogin';}
        else
            echo 'Login inv&aacute;lido';
?>
