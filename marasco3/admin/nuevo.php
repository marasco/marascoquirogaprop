<?php 
session_start(); 
include '../class.db.php';
/*if (!isset($_SESSION['mqp'])) 
	header('location: login.php');*/
  
	

	?>
	
	

	<table cellpadding='4' cellspacing='0' border='0'>
	<tr>
		<td align='left' width='150'>
			Titulo
		</td>
		<td align='left' >
                    <input type='text' value='' id='campo0' />
		</td>
	</tr>
	<tr>
		<td align='left' width='150'>
			Descripcion corta
		</td>
		<td align='left' >
			<input type='text' value='' id='campo1' />
		</td>
	</tr>
	<tr>
		<td align='left' width='150'>
			Descripcion larga
		</td>
		<td align='left' >
			<textarea style='width:500px;height:200px' id='campo2'></textarea>
		</td>
	</tr>
	<tr>
		<td align='left' width='150'>
			Barrio
		</td>
		<td align='left' >
			<input type='text' value='' id='campo3' />
		</td>
	</tr>
	 
	
	<tr>
		<td align='left' valign='top' width='150'>
			Imagenes
		</td>
		<td bgcolor="#ffffff" align='left' height='40' valign='bottom'>
                    <table width="500" border="0" cellpadding="1" cellspacing="0">
                        <tr><td>
                        <iframe border="1" id="upload_target" name="upload_target" src="about:blank" scrolling="no"   style="border:1px;width:90px;height:50px;border:1px solid #fff;"></iframe>
                        <iframe border="1" id="upload_target2" name="upload_target2" src="about:blank" scrolling="no" style="border:1px;width:90px;height:50px;border:1px solid #fff;"></iframe>
                        <iframe border="1" id="upload_target3" name="upload_target3" src="about:blank" scrolling="no" style="border:1px;width:90px;height:50px;border:1px solid #fff;"></iframe>
                        <iframe border="1" id="upload_target4" name="upload_target4" src="about:blank" scrolling="no" style="border:1px;width:90px;height:50px;border:1px solid #fff;"></iframe>
                        <iframe border="1" id="upload_target5" name="upload_target5" src="about:blank" scrolling="no" style="border:1px;width:90px;height:50px;border:1px solid #fff;"></iframe>
                            </td>
                        </tr>
                        <tr><td>
<form action="admin/guardarImagen.php?n=1" method="post" enctype="multipart/form-data" target="upload_target">
<input name="file_upload1" type="file" /><input type="submit" name="submitBtn" class='button' value="Upload" style='float:right'/>
</form>
<form action="admin/guardarImagen.php?n=2" method="post" enctype="multipart/form-data" target="upload_target2">
<input name="file_upload2" type="file" /><input type="submit" name="submitBtn" class='button' value="Upload" style='float:right'/>
</form>
<form action="admin/guardarImagen.php?n=3" method="post" enctype="multipart/form-data" target="upload_target3">
<input name="file_upload3" type="file" /><input type="submit" name="submitBtn" class='button' value="Upload" style='float:right'/>
</form>
<form action="admin/guardarImagen.php?n=4" method="post" enctype="multipart/form-data" target="upload_target4">
<input name="file_upload4" type="file" /><input type="submit" name="submitBtn" class='button' value="Upload" style='float:right'/>
</form>
<form action="admin/guardarImagen.php?n=5" method="post" enctype="multipart/form-data" target="upload_target5">
<input name="file_upload5" type="file" /><input type="submit" name="submitBtn" class='button' value="Upload" style='float:right'/>
</form>

                            </td></tr>
			
		</td>
	</tr>
	
	<tr>
		 
		<td align='left' height='40' valign='bottom' >
			<div class='button' onclick=nueva_casa()>Guardar</div>&nbsp;<span id='error_ingreso'></span>
		</td>
	</tr>
	</table>
