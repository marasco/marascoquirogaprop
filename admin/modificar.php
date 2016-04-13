<?php 
session_start(); 
include './../class.db.php';
$forms ="";
$selected="0";
$idprop = (isset($_POST["propiedad"]))?intval($_POST['propiedad']):NULL;
if ($idprop && isset($_POST['eliminar']))
{
    @exec("rm -rf ../images/inmuebles/inm_".$idprop."_".$_POST['eliminar'].".jpg");
    @exec("rm -rf ../images/inmuebles/inm_".$idprop."_".$_POST['eliminar']."_min.jpg");
    echo "Eliminado: $idprop [".$_POST['eliminar'] ."]";

}
  	$propiedades="";
	$prop_db = new consulta ("select * from propiedades order by id desc");
	if ($prop_db->cant)
	{
		while ($res = mysql_fetch_array($prop_db->result) )
		{
                    if (!$idprop && $selected=="0")
                         $idprop = $res["id"];
                    $selected=($_GET['propiedad']==$res['id'])?"selected":"";
                    $propiedades.= "<option value=".$res["id"]." $selected >".utf8_decode($res["titulo"])."</option>";
		}
		
	}
	?>
	
	 

	<table cellpadding='4' cellspacing='0' border='0'>
	<tr>
		<td align='left' width='150'>
			Propiedad: <?php echo $idprop;?>
		</td>
		<td align='left' >
                    <select name='propiedad' id='propiedad' onchange="redirect(this);" >
                    <?php echo $propiedades; ?>
                    </select>
                    
		</td>
	</tr>
	 
	
	<tr>

		<td colspan="2" bgcolor="#ffffff" align='left' height='40' valign='bottom'>
                    <table width="500" border="0" cellpadding="1" cellspacing="0">
                        <tr><td align="left">
                        <?php
                        if ($idprop){
                        for ($i=1;$i<6;$i++){
                            if (file_exists("../images/inmuebles/inm_".$idprop."_".$i."_min.jpg"))
                                $src = URL_BASE.'images/inmuebles/inm_'.$idprop.'_'.$i.'_min.jpg';
                               else
                                $src = 'about:No+image';

                             echo '<iframe border="1" id="upload_target'.$i.'" name="upload_target'.$i.'" src="'.$src.'" scrolling="no"   style="border:solid 1px #ccc;width:160px;height:100px;"></iframe>';
                             $forms.='<form style="float:left" action="admin/guardarImagen.php?n='.$i.'&id='.$idprop.'" method="post" enctype="multipart/form-data" target="upload_target'.$i.'">
                                 <input name="file_upload'.$i.'" style="float:left" type="file" /><input type="submit" name="submitBtn" class="button" value="Upload" style="float:left"/></form><div class=button  style="float:left" onclick="deleteImg('.$idprop.','.$i.');" >Eliminar</div>';
                            }

                        }
                        ?>
                             <br/><!--<?php echo URL_BASE."images/inmuebles/inm_".$idprop."_1_min.jpg"; ?>--></td>
                        </tr>

                    </table></td></tr>
        <tr><td colspan="2"><?php echo $forms; ?></td></tr>
	<tr>
		 
		<td align='left' height='40' valign='bottom' >
			<div class='button' onclick=nueva_casa()>Guardar</div>&nbsp;<span id='error_ingreso'></span>
		</td>
	</tr>
	</table>
