<?php
if ($_REQUEST['out']){
    setcookie('mqlogin', 'home', time() - 1, "/");
    sleep(1);
    header("Location: index.php?load");
}
header("Content-Type: text/html; charset=UTF-8");
include 'class.db.php';
?>


<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <title> . Marasco Quiroga Propiedades .</title>  
        <link type="text/css" href="css/movingboxes.css" media="screen" charset="utf-8" rel="stylesheet"  />
        <style type="text/css">

            /* ROUND CORNER **/

            /*******************/

            html,body,div,span,applet,object,iframe,h1,h2,h3,h4,h5,h6,p,blockquote,pre,a,abbr,acronym,address,big,
            cite,code,del,dfn,em,font,img,ins,kbd,q,s,samp,small,strike,strong,sub,sup,tt,var,dl,dt,dd,ol,ul,li,
            fieldset,form,label,legend,table,caption,tbody,tfoot,thead,tr,th,td { 
                margin:0; padding:0; border:0; outline:0; font-weight:inherit; 
                font-style:inherit; font-size:100%; font-family:inherit; vertical-align:top; }
            :focus { outline:0; }
            a:active { outline:none; } 
            a:hover,a:link,a:visited {text-decoration:none; color: #555555; font-family:Helvetica; font-size:11px;}
            td {padding-top:4px;}
            body {background: #088A4B; margin:0 0 0 0;color: #555555; font-size:12px; font-family:Helvetica;}
            div {position:relative; width:auto;background:transparent;font-family:Helvetica; font-size:12px; text-align:center;margin: 0 auto 0 auto; border: 0;}
            div .center {margin: 0 auto 0 auto;}
            img {border: 0;}
            input,textarea {width:300px; padding: 6px;}
            .button {width:auto;padding:4px;cursor:pointer; 
                     background: #333333;color:#ffffff;float:right}
            #error_ingreso {color: #ff6600}
            #menu {height:40px; display:block; width:500px; margin-left: 40px;}
            .menu_item {
                width:auto;padding:8px;cursor:pointer; 
                border-right: solid 1px #444; background: #333333;color: #ffffff;float:left
            }
            .titulo {color:#088A4B; font-size:14px; font-weight: normal;font-family:Helvetica;}
            .descr_larga {font-size:14px; color: #444;text-align:left;}
            .descr_corta {font-weight:normal; text-align:left; font-size:16px;}
            .precio {color: #666; padding-bottom:4px;text-align:left;font-size:16px;color:#ff6600}
            .pesos {color: #696;}
            .propiedad_fade {cursor:pointer;}
            #contenido {text-align:center; background: #fff;width:700px; margin:0 auto 0 auto;}
            .fnd_color {padding-right:4px;padding-left:4px; background: #fff; color: #fff;}
            .fnd_color2 {padding-right:4px;padding-left:4px; background:#ccc; color: #fff;}
            #div_background {background:url("fnd.png"); width: 732px; height: auto; background-repeat: repeat-y; margin: 0 auto 0 auto;}
            #header {background: #623C3C; text-align: center; border-bottom: solid 0px;width: 702px; height: auto; margin: 0 auto 0 auto; padding: 10 0 20 0; }

            #logo {margin: 0 auto 0 auto; text-align:center;}
            .costo {color: brown; font-size: 14px; }
            .lista_paginasDiv {padding: 4px;}






            #backgroundPopup{
                display:none;
                position:fixed;
                _position:absolute; /* hack for internet explorer 6*/
                height:100%;
                width:100%;
                top:0;
                left:0;
                background:#000000;
                border:1px solid #cecece;
                z-index:199;
            }
            .titlePopup {font-size: xx-large; color: #6fa5fd;}
            #popupContact{
                display:none;
                position:fixed;
                _position:absolute; /* hack for internet explorer 6*/
                height:auto;
                overflow: visible;
                width:500px;
                background:#FFFFFF;
                border:1px solid #eeeeee;
                z-index:200;
                padding:12px;
                font-size:13px;
            }
            #popupContact h1{
                text-align:left;
                color:#6FA5FD;
                font-size:22px;
                font-weight:700;
                border-bottom:1px dotted #D3D3D3;
                padding-bottom:2px;
                margin-bottom:20px;
            }
            #popupContactClose{
                font-size:14px;
                line-height:14px;
                right:6px;
                top:4px;
                position:absolute;
                color:#6fa5fd;
                cursor: pointer;
                font-weight:700;
                display:block;
            }
        </style>
        <script src='js/jquery-1.4.4.min.js'></script>
        <script src='js/main.js'></script>   
        <script type="text/javascript" src="js/jquery.movingboxes.js" charset="utf-8"></script>


    </head>

    <body> <center>
        <div id="div_background" align="center">
            <div id="header" align="center">
                <div id='logo' align="center">
                    <img src='images/logo_0.png' />
                </div>
            </div>

            <div id='layer0' class='center' style='text-align:center;background: transparent;width:730px; height:auto; margin: 0 auto 0 auto;'>


                <div id="menu">
                    <div id="link_propiedades" class="menu_item">PROPIEDADES</div>
                    <div id="link_contacto" class="menu_item">CONTACTO</div> 
                    <?php
                    if ($admin)
                        echo '<div id="link_cargar" class="menu_item">CARGAR</div><div id="link_modificar" class="menu_item">MODIFICAR</div><div id="link_salir" class="menu_item">Salir</div>';
                    else
                        echo '<div id="link_login" class="menu_item">ENTRAR</div>';
                    ?>
                </div>  
                <div id="contenido" style='background: transparent;padding-bottom: 10px; border-bottom: solid 2px #1C6210;'></div> 

                <div style='height:20px; background: #088A4B;'></div>
                <div align='center' style='background:#088A4B;height:30px;color:#ffffff'>Brandsen 342, Ituzaingo. Tel.: (011) 4624-4850</div>
            </div>   
        </div> </center><div id="popupContact">

    </div>
    <div id="backgroundPopup"></div>
</body>
</html>



