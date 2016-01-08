<?php
//łączenie się z bazą mysql

require_once("class.ini.php");
define("CONFIG", "./include/config/db.ini");

class Db
{
	private $mysqli;

	public function __construct()
	{
		$dbcfg = new ini_file;
		$dbcfg->setFileName(CONFIG);
		
		$dbcfg->load();
		$server = $dbcfg->getElementValue('db-config','server');
		$login = $dbcfg->getElementValue('db-config','login');
		$passwort = $dbcfg->getElementValue('db-config','paswort');
		$default_db = $dbcfg->getElementValue('db-config','db_name');
		
		//połączenie z bazą
		$this->mysqli = new mysqli($server,$login,$passwort,$default_db);
			if(mysqli_connect_errno()) 
			{
				echo"Nie udało się nawiązać połączenia z bazą danych, komunikat:".mysqli_connect_error();
				exit();	
			}
			$this->mysqli->set_charset("utf8");
	}
	
	public function dbConect($dbName)
	{
 		 $ok = $this->mysqli->select_db($dbName);
		if ($ok === false) die('Nie można było nawiązac połączenia'
		.' z powodu blendu:'. mysql_error());	
	}
	
	public function charset($chartype)
	{
		$this->mysqli->query('SET NAMES "'.$chartype);
	}
	
	public function getMysqli()
	{
		return $this->mysqli;	
	}
	
	public function __destruct()
	{
		$this->mysqli->close();	
	}
}

?>