<?php   
include_once './class.log.php'; 
define("MYSQL_HOST", "190.228.29.63");
define("MYSQL_USER", "mysql_inmob");
define("MYSQL_PASS", "fran21");
define("MYSQL_DB", "marasco_inmob");
class consulta
{
 	private $con;	
	private $type; 
	private $log;
	public  $lastId = 0;
	public	$cant 	= -1;
	public 	$result = NULL;
	public function __construct($query2) {
		$this->log = new Logger("./logs/");
		$this->log->LogLine('query',$query2);
		$this->type = strtoupper(substr($query2,0,6)); 
		$this->conectar();
		if ($this->con)
		{ 
			if (($this->result = mysql_query($query2,$this->con))!=NULL) {
			 	$this->cant = ($this->type=='SELECT')?mysql_num_rows($this->result):mysql_affected_rows($this->con); 
				$this->lastId = ($this->type=='INSERT')?mysql_insert_id($this->con):0;
				$this->log->LogLine('rows',$this->cant);
			}else {
                            $this->log->LogLine('error',$query2." | ERR:".mysql_error($this->con));
			}
		$this->desconectar();	
                }
	} 
	private function conectar()
	{
		$this->con = mysql_connect(MYSQL_HOST,MYSQL_USER,MYSQL_PASS) or $this->log->LogLine('error','fn:conectar()'.mysql_error());
		if ($this->con)
			mysql_select_db(MYSQL_DB,$this->con) or $this->log->LogLine('error','fn:conectar().selectdb()'.mysql_error());
		else
			$this->log->LogLine('error','fn:conectar()'.mysql_error());
	}
	private function desconectar()
	{
		mysql_close($this->con); 
	}
}
?>
 