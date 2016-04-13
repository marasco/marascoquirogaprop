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

$query = "SELECT * FROM propiedades ORDER BY id DESC LIMIT $limitStart," . CPP;


/* * ************************* */

$db = new consulta($query);
if (!$db->cant)
    die("No hay propiedades en este momento.");
else {
    $i = 0;
    echo "<div align='center' class='lista_paginasDiv'>" . $lista_paginas . "</div>";
    while ($r = mysql_fetch_array($db->result)) {
        $i++;
        if (!file_exists("images/inmuebles/inm_" . $r['id'] . "_1_min.jpg"))
            $img = "<img width='120px' height='80px' src='images/noimage.jpg' border='0' />";
        else
            $img = "<img width='120px' height='80px' src='images/inmuebles/inm_" . $r['id'] . "_1_min.jpg' border='0' />";
        if (($i + 2) % 2 == 0) {
            ?>
            <div  id='prop_<?php echo $r['id']; ?>' style='cursor:pointer;background: transparent; height: auto;z-index:99; width:auto;'>
            <?php } ?> 
            <div class='panelx' onclick="desplegarPopup('detalle.php','id=<?php echo $r['id']; ?>');" 
                 style="text-align:left; z-index:100; width:auto; cursor:pointer;padding:4px; float:left; background: white; height: auto;<?php if (($i + 2) % 2 !== 0) echo "border-right: solid 1px #eee;";?> ">
                <div style='float:left;padding-right: 4px;width:120px'><?php echo $img; ?></div>
                <div style='float:left;text-align:left; width:200px; vertical-align: top;'>
                    <span class='costo'><?php echo $r['descr_corta']; ?></span><br />
                    <span class='titulo'><?php echo $r['titulo']; ?></span></div>
                <?php if ($admin) { ?>
                    <br /><div class='button' onclick=eliminar(<?php echo $r['id'] ?>)>Eliminar</div>
                <?php } ?>
            </div>
            
            <?php if (($i + 2) % 2 == 0) { ?>
              <div style="clear:both"></div>
              <div style="background: #eee; height: 1px; overflow:hidden; width: 664px;text-align:left;float:left;"></div></div>           
             
        <?php } ?>

        <?php
    }
  if (($i + 2) % 2 !== 0) { ?>
          <div style="clear:both"></div>  <div style="background: #eee; height: 1px; overflow:hidden; width: 700px;"></div></div>           
                
        <?php } 
    echo "<div align='center'>" . $lista_paginas . "</div>";
}
?>
