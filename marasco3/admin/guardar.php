<?php
include '../config.php';
include '../class.db.php';
session_start();

function request_info($array)
{
	 
	foreach ($array as $i => $value) { 
    	if (!isset($_POST[$value]))
    		return FALSE; 
	}  
	return TRUE;
}

/*if (!isset($_SESSION['mqp'])) 
	header('location: login.php');*/
 
if (request_info(array('c0','c1','c2','c3'))==FALSE)
	die("Parametros incorrectos"); 
/*****************************/
 			
$query	=	"INSERT INTO propiedades
			(titulo,descr_corta,descr_larga,visitas,ingreso,barrio)
			VALUES
			('".$_POST['c0']."','".$_POST['c1']."','".$_POST['c2']."',0,NOW(),'".$_POST['c3']."');
			";

$db	=	new consulta($query); 
if (!$db->cant)
	die ("Se ha producido un error. Intenta luego.");
else 
{
    $i = 1;
    while ($i<6)
    {
	if (file_exists("../images/inmuebles/".$i."__".session_id().".jpg"))
        {
		@exec("mv ../images/inmuebles/".$i."__".session_id().".jpg ../images/inmuebles/inm_".$db->lastId."_".$i.".jpg");
            if (file_exists("../images/inmuebles/".$i."__".session_id()."_min.jpg"))
    		@exec("mv ../images/inmuebles/".$i."__".session_id()."_min.jpg ../images/inmuebles/inm_".$db->lastId."_".$i."_min.jpg");
        }
            $i++;
    }
		die ("Se ha guardado correctamente.");

}	  
?>