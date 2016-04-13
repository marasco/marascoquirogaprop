<?php
ini_set("display_errors", true);
define("CPP", 10);
$admin = null;
if (isset($_REQUEST['out']))
    setcookie('mqlogin', 'home', time() - 1, "/");
header("Content-Type: text/html; charset=UTF-8");
include_once 'class.db.php';
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> . Marasco Quiroga Propiedades .</title>   
        <style type="text/css">
            html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,dl,dt,dd,ol,ul,li,fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td { margin:0; padding:0; border:0; outline:0; font-weight:inherit; font-style:inherit; font-size:100%; font-family:inherit; vertical-align:baseline; }
            :focus { outline:0; }
            a:active { outline:none; }
            body { line-height:1; color:white; background:white; }
            ol,ul { list-style:none; }
            table { border-collapse:separate; border-spacing:0; }
            caption,th,td { text-align:left; font-weight:normal; }
            /* ROUND CORNER **/



            /*******************/


            a:hover,a:link,a:visited {text-decoration:none; color: #555555; font-family:Arial; font-size:11px;}
            body {background: #088A4B; margin:0 auto 0 auto; text-align: center; color: #555555; width: 100%; font-size:12px; font-family:Verdana;}
            div {position:relative; width:auto;background:transparent;font-family:Verdana; font-size:12px; text-align:center;margin: 0 auto 0 auto; border: 0;}
            div .center {margin: 0 auto 0 auto;}
            img {border: 0;}
            input {width:300px;}
            .button {width:auto;padding:8px;cursor:pointer; 
                     background: #333333;color:#ffffff;float:left}
            #error_ingreso {color: #ff6600} 
            .menu_item {
                width:auto;padding:8px;cursor:pointer;  
                background: #9D4747;color: #ffffff;float:right;margin-right: 10px;
            }
            #logo {margin: 12 12 12 12; text-align:left;}
            .titulo {color:#088A4B; font-size:16px; font-weight: normal;font-family:Arial;}
            .descr_larga {font-size:12px; color: #444;text-align:left;}
            .descr_corta {font-weight:normal; text-align:left; font-size:14px;}
            .precio {color: #666; padding-bottom:4px;text-align:left;font-size:14px;color:#ff6600}
            .pesos {color: #696;}
            .propiedad_fade {cursor:pointer;}
            #contenido {text-align:left}
            .fnd_color {padding-right:4px;padding-left:4px; background: #fff; color: #fff;}
            .fnd_color2 {padding-right:4px;padding-left:4px; background:#ccc; color: #fff;} 
            #container {
                width:480px;
                padding:10px;
                margin:0 auto;
                position:relative;
                z-index:0;
            }

            #example {
                width:480px;
                height:350px;
                position:relative;
            }

            #slides {
                position:absolute;
                top:15px;
                left:-10px;
                z-index:100;
            }

            .slides_container {
                width:480px;
                overflow:hidden;
                position:relative;
                display:none;
            }


            .slides_container div.slide {
                width:480px;
                height:340px;
                display:block;
            } 

            #slides .next,#slides .prev {
                position:absolute;
                top:137px;
                left:-24px;
                width:24px;
                height:43px;
                display:block;
                z-index:101;
            }

            #slides .next {
                left:480px;
            }

            .pagination {
                margin:26px auto 0;
                width:200px;
                text-align: center;
            }

            .pagination li {
                float:left;
                margin:0 1px;
                list-style:none;
            }


            .costo {color: #F5D71D; font-size: 1.3em; float:right; width:100px;}
            .caption,.captionx {
                z-index:500;
                position:absolute;
                bottom:-35px;
                left:0;
                height:40px;
                padding:8px 10px 0 10px;
                background:#000;
                background:rgba(0,0,0,.5);
                width:480px;
                font-size:1.1em;
                line-height:1.2em;
                color:#fff;
                border-top:1px solid #000;
                text-shadow:none;
            }

            /*
                    Footer
            */


        </style>
        <script src='js/jquery-1.4.4.min.js'></script>
        <script src='js/main.js'></script>    
        <script src="js/slides.min.jquery.js"></script>

    </head>

    <body>  
        <div id='layer0' class='center' style='background: transparent;width:500px; height:auto; margin: 0 auto 0 auto;'>
            <!-- LOGO -->
            <div id='logo'>
                <img src='images/logo_0.png' />
            </div> 

            <div id="container">
                <div style="height: 30px;width:480px;">
                    <div id="link_contacto" class="menu_item">Envía una consulta</div> </div>

                <div id="example"> 
                    <div id="slides">
                        <div class="slides_container">
                            <?php
                            if (isset($_GET['id'])) {
                                $query = "SELECT * FROM propiedades WHERE id = " . $_GET['id'];
                                $db = new consulta($query);
                                if (!$db->cant)
                                    die("No hay propiedades en este momento.");
                                else {
                                    $n = 0;
                                    $r = mysql_fetch_array($db->result);
                                    while ($n < 10) {


                                        if (file_exists("../images/inmuebles/inm_" . $r['id'] . "_$n.jpg")) {
                                            $img = "../images/inmuebles/inm_" . $r['id'] . "_$n.jpg";
                                            ?>

                                            <div class="slide">
                                                <a href="#" title="<?php echo $r['descr_corta']; ?>" >
                                                    <img src="<?php echo $img; ?>" width="480" alt="<?php echo $r['titulo']; ?>"></a>
                                                <div class="captionx" style="bottom:0; width:460px; font-size: 1em; height:70px;">
                                                    <p><?php echo $r['titulo'] . " - " . $r['descr_larga']. " . VALOR: ".$r['descr_corta']; ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                        $n++;
                                    }
                                }
                            } else {
                                $query = "SELECT * FROM propiedades ORDER BY RAND() LIMIT 0,100;";
                                $db = new consulta($query);
                                if (!$db->cant)
                                    die("No hay propiedades en este momento.");
                                else {
                                    while ($r = mysql_fetch_array($db->result)) {
                                        if (file_exists("../images/inmuebles/inm_" . $r['id'] . "_1.jpg")) {
                                            $img = "../images/inmuebles/inm_" . $r['id'] . "_1.jpg";
                                            ?>
                                            <div class="slide">
                                                <a href="?id=<?php echo $r['id']; ?>" title="">
                                                    <img src="<?php echo $img; ?>" width="480" alt="<?php echo $r['titulo']; ?>"></a>
                                                <div class="caption" style="bottom:0">
                                                    <div class='costo'><?php echo $r['descr_corta']; ?></div><p><?php echo $r['titulo']; ?></p>
                                                </div>
                                            </div>
                                            <?php
                                        }
                                    }
                                }
                            }
                            ?>
                        </div>
                        <a href="#" class="prev"><img src="img/arrow-prev.png" width="24" height="43" alt="Arrow Prev"></a>
                        <a href="#" class="next"><img src="img/arrow-next.png" width="24" height="43" alt="Arrow Next"></a>
                    </div> 
                </div> 
            </div> 


            <div style='height:10px'><?php //echo $px;      ?></div>
            <div align='center' style='height:30px;color:#ffffff'>Brandsen 342, Ituzaingo. Tel.: (011) 4624-4850</div>
        </div>    
    </body>
</html> 