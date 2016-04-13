<?php

define('MAXH', 300);
define('MAXW', 480);
//ini_set("display_errors", true);
header("Content-Type: text/html; charset=utf-8");
include 'class.db.php';
$id = isset($_POST['id']) ? $_POST['id'] : NULL;
if (!$id)
    die("Ha ocurrido un error. Intente mas tarde");


$query = "SELECT * FROM propiedades WHERE   id = $id";

/* * ************************* */

$db = new consulta($query);
if (!$db->cant)
    die("No se encontro la propiedad.");
else {
    /* ELIJE y MUESTRA IMAGEN */
    $i = 1;
    while (!file_exists("images/inmuebles/inm_" . $id . "_$i.jpg") and $i < 6)
        $i++;
    if ($i < 6) {
        /*      $size = @getimagesize(URL_BASE . "images/inmuebles/inm_" . $id . "_" . $i . ".jpg");
          $width = $size[0];
          $height = $size[1];
          $width2 = $size[0];
          if ($width > $height) {
          if ($width > MAXW)
          $width2 = MAXW;
          }else {
          if ($height > MAXH)
          $width2 = parseInt(parseInt((MAXH * 100) / $height) * $width / 100);
          } */
        $img = "<img id=pic_big width=480 src='images/inmuebles/inm_" . $id . "_$i.jpg' border=0/>";
    }else
        $img = NULL;
    /* Thumbnails */
    $img_thumb = NULL;
    $i = 1;
    while ($i < 10) {
        if (file_exists("images/inmuebles/inm_" . $id . "_" . $i . "_min.jpg")) {

            $img_thumb .= " 
            <div style='padding-left:4px;float:left;cursor:pointer'  onclick='changePic($id,$i);' class=img_thumb>
            <img width=100 height=60 src='images/inmuebles/inm_" . $id . "_" . $i . "_min.jpg' border=0/></div>";
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
                        <td valign='top'><span class='descr_corta'>" . $r['descr_corta'] . "</span><br/>
			<span class='titulo'>" . $r['titulo'] . "</span><br/>
			<span class='descr_larga'>" . ($r['descr_larga']) . "</span></td></tr>

                <tr><td>$img</td></tr>
                <tr><td>$img_thumb</td></tr>
                </table></div>
			";
}
?> 