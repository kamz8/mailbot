<?php
//class.ImportToDb

require_once('./include/class.csv.php');
require_once('./include/class.ini.php');

class ImportToDb extends Csv
{
	private $table;
	private $mysqli;
	function __construct()
	{
		$dbcfg = new ini_file;
		$dbcfg->setFileName('./include/config/db.ini');
		
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
		//nawiązano połączenie
		
		
	}
	
	function __destruct()
	{
		//$this->mysqli->close();	
	}
	
	public function import($table,$fileName)		//importuje dane do tabeli w bazie o podanej nazwie
	{
		
		
		parent::__construct($fileName);
		$qwery =" ";
		$j = 1;
		for($i=1;$i<parent::getNumRows();$i++)
		{
			$qwery ="INSERT INTO `mail_data`(`comp_name`, `email`, `phone`, `adres`, `called`, `sended`, `coments`) 
			VALUES (" ;
			while(parent::issetCell($i,$j)) 
			{
				$item = parent::getCellValue($i,$j);
				if($j==1) $qwery=$qwery  ."'".$this->mysqli->real_escape_string($item)."'";
					else $qwery=$qwery  .",'".$this->mysqli->real_escape_string($item)."'";
				
				$j++;
			}
			$qwery = $qwery .", '0', '0', NULL)";
			
			$result = $this->mysqli->query($qwery);
			if($result === false) 
			{
				echo'Nie można było wykonać zapytania z powodu błędu: '.$this->mysqli->error;	
				exit(1);
			}
			
			
			$j=1;
		}
		return true;	
	}
	
	public function removeDuplicates()
	{
		
	}
}

?>