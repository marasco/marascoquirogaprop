<?php 
 mail("info@marascoquirogaprop.com.ar","Contacto", "De: ".$_POST['from']."
 Mensaje: 
 ".$_POST['msg'],"From: info22@marascoquirogaprop.com.ar" . "\r\n");
 
 echo "Mensaje enviado.";
?>
