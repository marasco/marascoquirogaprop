<?php
session_start();
?>



    <table cellpadding='0' cellspacing='8' border='0'>
        <tr>
            <td align='right' width='150'>
                Usuario
            </td>
            <td align='left' >
                <input type='text' value='' style="border:solid 1px #ccc;" id='campo0' />
            </td>
        </tr>
        <tr>
            <td align='right' width='150'>
                Contrase&ntilde;a
            </td>
            <td align='left' >
                <input type='password' value='' style="border:solid 1px #ccc;" id='campo1' />
            </td>
        </tr>


        <tr>
            <td align='left' width='150'>

            </td>
            <td align='left' height='40' valign='bottom' >
                <div class='button' id="btn_Login">Entrar</div>&nbsp;<div id='error_ingreso'></div>
            </td>
        </tr>
    </table>
