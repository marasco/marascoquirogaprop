<?php
header("Content-Type: text/html; charset=utf-8");
include 'class.db.php';
ini_set("display_errors","true");

	LogLine("debug", 'IP: 			'.$_SERVER['REMOTE_ADDR']);
	LogLine("debug", 'USER-AGENT: 	'.$_SERVER['HTTP_USER_AGENT']);
	LogLine("debug", 'URL: 			'.$_SERVER['PHP_SELF']);
	LogLine("debug", 'REQUEST: 		'.print_r($_REQUEST,true));
?>


<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf8">
<title>- Marasco Quiroga Propiedades -</title>

<link rel="alternate" type="application/rss+xml" title="RSS .92" href="http://www.clipdenoticias.com/manpower/rss/index.php" />
<style type="text/css">
	a:hover,a:link,a:visited {text-decoration:none; color: #333333; font-family:Arial; font-size:11px;}
	body {margin:0 0 0 0;font-color: #333333; font-size:12px; font-family:Verdana;}
	div {position:relative; width:auto;font-family:Verdana; font-size:12px; text-align:center;margin: 0 auto 0 auto; border: 0;}
	div .center {margin: 0 auto 0 auto;}
	img {border: 0;}
	.menu_item {float:left;padding-left:6px;}
	
	
	
	/* ROUND CORNER **/
	
	.roundedcornr_box_507328 {
   background: #ffffff;
}
.roundedcornr_top_507328 div {
   background: url(roundedcornr_507328_tl.png) no-repeat top left;
}
.roundedcornr_top_507328 {
   background: url(roundedcornr_507328_tr.png) no-repeat top right;
}
.roundedcornr_bottom_507328 div {
   background: url(roundedcornr_507328_bl.png) no-repeat bottom left;
}
.roundedcornr_bottom_507328 {
   background: url(roundedcornr_507328_br.png) no-repeat bottom right;
}

.roundedcornr_top_507328 div, .roundedcornr_top_507328, 
.roundedcornr_bottom_507328 div, .roundedcornr_bottom_507328 {
   width: 100%;
   height: 30px;
   font-size: 1px;
}
.roundedcornr_content_507328 { margin: 0 30px; }


/*******************/
</style>
</head>

<body bgcolor=#088A4B>
<center>
	<div id='layer0' class='center' style='background: #fff;width:800px; height:100%;border-right:solid 1px #999;border-left:solid 1px #999;'>





<!-- HEADER -->
<div id='layer1_header' class='center' style='width:792px;color: #ffffff;padding:4px;background:#B40404;'>
<!-- <div style='float:left;background:transparent'>
	 -->		&nbsp;Juan B. Marasco Quiroga - Coleg. nº 2605 - Morón
		<!-- 	<div style='float:right;'> -->
			Brandsen 342 - Ituzaingó (1714) Buenos Aires&nbsp;
</div>
<!-- LOGO -->
		<div id='layer1_logo' class='center' style='width:800px;background:#fff;'>
			<div style='float:left'><img src='images/logo_0.png' />
			</div>
			<div style='float:center'><img src='images/logo_1.png' />
			</div>
		
		</div>
		<div style='height:8px;'></div> 
<!-- MENU -->
<div id='layer2_menu' class='center' style='width:800px;background:#eeeeee;'>
			<div class='menu_item'>Inmuebles</div>
			<div class='menu_item'>Contacto</div>
		</div>
<!-- BODY -->		
		<div id='layer2'>
		<img src='images/construccion.png' />
		</div>
<!-- FOOTER -->
		<div id='layer3'>T.E. 4624-4850 - info@marascoquirogaprop.com.ar
		</div>
	</div>
	</center> 
</body>
</html>


 
