<?php 
include 'config.php';
include 'log.php';  
/*
 * Internet:	190.228.29.63
 * Intranet: 	192.168.0.193
 */
define ("MYSQL_HOST", "192.168.0.193");
define ("MYSQL_USER", "mysql_inmob");
define ("MYSQL_PASS", "fran21");
define ("MYSQL_DB", "marasco_inmob");

class consulta
{
 	private $con;	
	private $type; 
	public  $lastId = 0;
	public	$cant 	= -1;
	public 	$result = NULL;
	public function __construct($query)
	{
		 
		$this->type = strtoupper(substr($query,0,6)); 
		$this->conectar();
		if ($this->con)
		{ 
			if ($this->result = mysql_query($query,$this->con))
				{
			 	$this->cant = ($this->type=='SELECT')?mysql_num_rows($this->result):mysql_affected_rows($this->con); 
				$this->lastId = ($this->type=='INSERT')?mysql_insert_id($this->con):0;
				}
			else	
				{
				LogLine('error',mysql_error($this->con));
				}
			
			$this->desconectar();		
		}
	}
	private function conectar()
	{
		$this->con = @mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS) or LogLine('error',mysql_error());
		if ($this->con)
			mysql_select_db(MYSQL_DB,$this->con) or LogLine('error',mysql_error());
		
	}
	private function desconectar()
	{
		mysql_close($this->con); 
	}
}
?>
