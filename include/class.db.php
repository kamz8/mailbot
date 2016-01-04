<?php
//łączenie się z bazą mysql

require('../class.ini.php');
define(CONFIG, "./include/config/db_congig.ini");

class DB
{
	private $_db;
	private $_login;
	private $_pass;
	private $_dir;
	private $_charset;  
	private $db_mysql;
	public function __construct()
	{
		$config_db = new ini_file;
		$config_db->setFileName(CONFIG);
		$file = $config_db->loadFile();
		
		$this->_db = $file['config_db']['default_db'];
		$this->_dir=$file['config_db']['localhost'];
		$this->_login = $file['config_db']['login'];
		$this->_pass = $file['config_db']['passwort'];
		$this->charset = $file['config_db']['charset'];
		//konfiguracja
		
		$baza = @mysql_connect($this->_dir, $this->_login, $this->_pass);
		if ($baza === false) die('Nie można było nawiązac połączenia'
		.' z powodu blendu:'. mysql_error());  
  
 		 mysql_query('SET NAMES "'.$this->_charset.'"');
  
 		 $ok = @mysql_select_db($this->_db);
		if ($ok === false) die('Nie można było nawiązac połączenia'
		.' z powodu blendu:'. mysql_error());
	}
	public function db_conect($db_name)
	{
		$db = @mysql_connect($this->_dir, $this->_login, $this->_pass);
		if ($db === false) die('Nie można było nawiązac połączenia'
		.' z powodu blendu:'. mysql_error());  
  
 		 mysql_query('SET NAMES "'.$this->_charset.'"');
  
 		 $ok = @mysql_select_db($db_name);
		if ($ok === false) die('Nie można było nawiązac połączenia'
		.' z powodu blendu:'. mysql_error());	
	}
	
	public function charset($chartype)
	{
		mysql_query('SET NAMES "'.$chartype);
	}
	
	public function __destruct()
	{
		@mysql_close();	
	}
}

?>