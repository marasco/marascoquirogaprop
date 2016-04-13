<?php 
include 'config.php';
echo '
<table border=0 cellpadding=4>
<tr><td width=100 align=right>
De </td><td><input type="text" style="border:solid 1px #ccc;" id="contacto_de" /></td></tr>
<tr><td valign=top align=right>
Mensaje</td><td>
<textarea style="width:300px;height:100px;border:solid 1px #ccc;" id="contacto_msg"></textarea></td></tr>
<tr><td></td><td>
<input type=button class=button value=Enviar onclick=enviar_msg(); /></td></tr>
<tr><td colspan=2 id="resultado_msg"></td></tr></table>
<br/>
';
?>
