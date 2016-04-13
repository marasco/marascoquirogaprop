<?php

if (strlen($_POST['msg'])) {
    mail("info@marascoquirogaprop.com.ar", "Contacto", "
    De: " . $_POST['from'] . "
    Telefono: " . $_POST['tel'] . "
    Mail: " . $_POST['mail'] . "
    Mensaje: 
    " . $_POST['msg'], "From: info22@marascoquirogaprop.com.ar" . "\r\n");

    echo "Mensaje enviado.";
} else {
    echo "Escriba un mensaje primero.";
}
?>
