<?php

include 'config.php';
?>
<table border=0 cellspacing="8">
    <tr><td width=100 align=right>
            Nombre </td><td><input type="text" style="border:solid 1px #ccc;" id="contacto_de" /></td></tr>
     <tr><td width=100 align=right>
            Telefono </td><td><input type="text" style="border:solid 1px #ccc;" id="contacto_tel" /></td></tr>
    <tr><td width=100 align=right>
            Email </td><td><input type="text" style="border:solid 1px #ccc;" id="contacto_mail" /></td></tr>
    <tr><td align=right>
            Mensaje</td><td>
            <textarea style="width:300px;height:100px;border:solid 1px #ccc;" id="contacto_msg"></textarea></td></tr>
    <tr><td></td><td>
            <div class='button'  onclick="enviar_msg()">Enviar</div></td></tr>
    <tr><td colspan=2 id="resultado_msg"></td></tr></table>
<br/>
<?
?>
