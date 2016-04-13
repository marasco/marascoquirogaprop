<?php 
session_start(); 
include '../class.db.php';
$forms ="";
$idprop = (isset($_GET["propiedad"]))?intval($_GET['propiedad']):NULL;

  	$propiedades="";
	$prop_db = new consulta ("select * from propiedades order by id desc");
	if ($prop_db->cant)
	{
		while ($res = mysql_fetch_array($prop_db->result) )
		{
                    $selected       =($_GET['propiedad']==$res['id'])?"selected":"";
                    $propiedades.= "<option value=".$res["id"]." $selected >".$res["titulo"]."</option>";
		}
		
	}
	?>
	
	 

	<table cellpadding='4' cellspacing='0' border='0'>
	<tr>
		<td align='left' width='150'>
			Propiedad
		</td>
		<td align='left' >
                    <select name='propiedad' id='propiedad' onchange="redirect(this);" >
                    <?php echo $propiedades; ?>
                    </select>
                    
		</td>
	</tr>
	 
	
	<tr>
		<td align='left' valign='top' width='150'>
			Imagenes
		</td>
		<td bgcolor="#ffffff" align='left' height='40' valign='bottom'>
                    <table width="500" border="0" cellpadding="1" cellspacing="0">
                        <tr><td>
                        <?php
                        if ($idprop){
                        for ($i=1;$i<6;$i++){
                            if (file_exists(URL_BASE."images/inmuebles/inm_".$idprop."_".$i."_min.jpg"))
                                $src = URL_BASE.'images/inmuebles/inm_'.$idprop.'_'.$i.'_min.jpg';
                               else
                                $src = 'about:blank';

                             echo '<iframe border="1" id="upload_target'.$i.'" name="upload_target'.$i.'" src="'.$src.'" scrolling="no"   style="border:1px;width:90px;height:50px;border:1px solid #fff;"></iframe>';
                             $forms.='<form action="admin/guardarImagen.php?n='.$i.'&id='.$idprop.'" method="post" enctype="multipart/form-data" target="upload_target'.$i.'">
                                 <input name="file_upload'.$i.'" type="file" /><input type="submit" name="submitBtn" class="button" value="Upload" style="float:right"/></form>';
                            }

                        }
                        ?>
                             <br/><?php echo URL_BASE."images/inmuebles/inm_".$idprop."_1_min.jpg"; ?></td>
                        </tr>

                    </table></td></tr>
        <tr><td><?php echo $forms; ?></td></tr>
	<tr>
		 
		<td align='left' height='40' valign='bottom' >
			<div class='button' onclick=nueva_casa()>Guardar</div>&nbsp;<span id='error_ingreso'></span>
		</td>
	</tr>
	</table>
