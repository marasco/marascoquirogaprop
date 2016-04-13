<?php 
if (!function_exists("LogLine"))
{
function query_replace($s)
{
	$s = str_replace(chr(13)," ", $s);
	$s = str_replace(chr(10)," ", $s);
	$s = str_replace(chr(9)," ", $s);
	return $s;
}
function LogLine($tipo,$msg)
{

		$fechahora = date('d/m/Y H:i:s',time());
		$destino = "logs/".date('Ymd',time()).".txt"; 
		if (intval(file_exists($destino))==0)
			$file = fopen($destino,'w');
		else
			$file = fopen($destino,'a');
              //     echo "<!-- Logueando destino: $destino | ".intval(file_exists($destino))." y ". intval(file_exists('../index.php')) ." y ". intval(file_exists($destino)) ."  -->";
		@fwrite($file,chr(13)."[".$fechahora."]".chr(9).chr(9)."[".$tipo."]".chr(9).chr(9).query_replace($msg));
		@fclose($file);
                
}
}
?>
