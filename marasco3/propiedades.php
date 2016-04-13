<?php

header("Content-Type: text/html; charset=utf-8");
include 'class.db.php';


$admin = isset($_COOKIE['mqlogin']) ? TRUE : FALSE;
if (isset($_POST['id']) && $admin) {
    new consulta('delete from propiedades where id = ' . $_POST['id']);
}

/* * *********************** */
/* * **** paginado ******** */
$limitStart = 0;
$ff2 = new consulta("SELECT COUNT(id) from propiedades");
if ($ff2->cant > 0) {
    $lista_paginas = 'Páginas ';
    $a = mysql_fetch_array($ff2->result);
    $resultados = $a[0];
    $paginas = intval($resultados % CPP) ? intval($resultados / CPP) + 1 : intval($resultados / CPP);
    $page = (isset($_POST['page'])) ? intval($_POST['page']) : 1;
    $limitStart = ($page <= $paginas && $page > 0) ? ($page - 1) * CPP : 0;
    $i = 0;
    while ($i++ < $paginas) {
        $lista_paginas .= ' <a href="#" ';
        $lista_paginas .= ($i == $page) ? 'class=fnd_color2' : 'class=fnd_color';
        $lista_paginas .= ' onclick=jopen("propiedades.php","contenido","page=' . $i . '");>' . $i . '</a>';
    }
    //echo "paginas $paginas";
}
/* * ************************** */

$query = "SELECT 
				*
			FROM 	
				propiedades 
			ORDER BY
				id desc
                        LIMIT $limitStart," . CPP;


/* * ************************* */

$db = new consulta($query);
if (!$db->cant)
    die("No hay propiedades en este momento.");
else {

    while ($r = mysql_fetch_array($db->result)) {
        if (!file_exists("images/inmuebles/inm_" . $r['id'] . "_1_min.jpg"))
            $img = "<img width='140px' height='90px' src='images/noimage.jpg' border=0/>";
        else
            $img = "<img width='140px' height='90px' src='images/inmuebles/inm_" . $r['id'] . "_1_min.jpg' border=0/>";

        echo "
		<div class='panelx' id='prop_" . $r['id'] . "' style='cursor:pointer'>
                <table width='100%' cellpadding='2' cellspacing=0 border=0>
                <tr><td width=160>$img</td>
                        <td valign='top'><span class='descr_corta'>" . $r['descr_corta'] . "</span><br/>
			<span class='titulo'>" . $r['titulo'] . "</span><br/>
			<span class='descr_larga'>" . ($r['descr_larga']) . "</span></td></tr></table>
			";

        if ($admin)
            echo "<div class='button' onclick=eliminar(" . $r['id'] . ")>Eliminar</div><br/>";


        echo "
   		</div><hr size='1' noshade='noshade' color=#8fac8d />
				";
    }
    echo "<div align='center'>" . $lista_paginas . "</div>";
}
?>
