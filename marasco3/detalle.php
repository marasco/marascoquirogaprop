<?php
header("Content-Type: text/html; charset=utf-8");
include 'class.db.php';
$id = isset($_POST['id'])?intval(substr($_POST['id'],5,4)):NULL;
if (!$id)
    die("Ha ocurrido un error. Intente mas tarde");
//$filter = (isset($_POST̈́['filter']))?$_POST['filter']:0;
/****** paginado ********
$limitStart = 0;
$ff2 = new consulta("SELECT COUNT(id) from propiedades");
if ($ff2->cant > 0)
{
    $lista_paginas = 'Páginas ';
    $a = mysql_fetch_array($ff2->result);
    $resultados = $a[0];
    $paginas    = intval($resultados % CPP)?intval($resultados / CPP)+1:intval($resultados / CPP);
    $page = (isset($_POST['page']))?intval($_POST['page']):1;
    $limitStart = ($page <= $paginas && $page > 0)?($page-1) * CPP:0;
    $i = 0;
    while ($i++ < $paginas)
    {
        $lista_paginas .= ' <a href="#" ';
        $lista_paginas .= ($i==$page)?'class=fnd_color2':'class=fnd_color';
        $lista_paginas .= ' onclick=jopen("propiedades.php","contenido","page='.$i.'");>'.$i.'</a>';
        }
    //echo "paginas $paginas";
}
/*****************************/

$query	=	"SELECT
				*
			FROM
				propiedades
                        WHERE   id = $id";

/****************************/

$db	=	new consulta($query);
if (!$db->cant)
	die ("No se encontro la propiedad.");
else
{
    /* ELIJE y MUESTRA IMAGEN */
        $i = 1;
        while (!file_exists("images/inmuebles/inm_".$id."_$i.jpg") and $i<6) $i++;
        if ($i<6){
            $size = @getimagesize(URL_BASE."images/inmuebles/inm_".$id."_".$i.".jpg");
            $width=$size[0];
            if ($width>630) $width=630;
            $img = "<img id=pic_big width=$width src='images/inmuebles/inm_".$id."_$i.jpg' border=0/>";
        }else $img=NULL;
        /* Thumbnails */
        $img_thumb = NULL;
        $i = 1;
        while ($i<6) {
            if (file_exists("images/inmuebles/inm_".$id."_".$i."_min.jpg")){
                $img_thumb .= "<div style='padding-left:4px;float:left;cursor:pointer'  onclick='changePic($id,$i);' class=img_thumb><img width=100 height=60 src='images/inmuebles/inm_".$id."_".$i."_min.jpg' border=0/></div>";
            }
            $i++;
        }
        if ($img_thumb)
            $img_thumb = "Otras imágenes<br/>$img_thumb";



        /* LISTA DESCRIPCION */
        while ($r = mysql_fetch_array($db->result))
        echo "
		<div>
                <table width='100%' cellpadding='2' cellspacing=0 border=0>
                <tr>
                        <td valign='top'><span class='descr_corta'>".$r['descr_corta']."</span><br/>
			<span class='titulo'>".$r['titulo']."</span><br/>
			<span class='descr_larga'>".($r['descr_larga'])."</span></td></tr>

                <tr><td>$img</td></tr>
                <tr><td>$img_thumb</td></tr>
                </table></div>
			";


	

}
?>






