<?php
/* klasa odczytu i zapisu plików ini */

class ini_file
{
	private $_fileName = '';
	private $_iniStruct = array();
		
	public function setFileName($name)
	{
		$this -> _fileName =  $name;
	}
	
	public function loadFile()
	{
		if(file_exists($this->_fileName)) 
		{
			return parse_ini_file($this -> _fileName, true);
		};
		return array();		
	}
	
	public function load()				//ładuje plik do tablicy w klasie
	{
		if(file_exists($this->_fileName)) 
		{
			$this->_iniStruct = parse_ini_file($this -> _fileName, true);
		}else 
			{
				echo "plik konfiguracyjny: {$this->_fileName} nie istnieje";
				exit();	
			}
	}
	
	public function getElementValue($section, $key)
	{
		if(isset($this->_iniStruct[$section][$key])) return $this->_iniStruct[$section][$key];
	}
		
	public function sectionExist($section, $array)
	{
		foreach($array as $sname => $current)
		{
			if( $sname == $section) return true;
		}
	}
	
	public function printini()
	{
		print_r($this->_iniStruct);	
	}
	
	/*funkcje edycji plików */
	public function updateValue($section, $key, $newValue)		//edyryuje wartość dla podanej sekcji i klucza
	{
		$this->load();
		if(isset($this->_iniStruct[$section][$key]) == true) $this->_iniStruct[$section][$key] = $newValue;
		else return false;
	}
	
	public function save()
	{	
		$buffor = NULL;
		$file = fopen($this->_fileName, "w");	
		foreach($this->_iniStruct as $section => $current)
		{
			$buffor .= "[".$section."] \r\n";	
			foreach($current as $key => $value) $buffor .=$key." = ".$value."\r\n";
			$buffor .= "\r\n";
		}
		
		fputs($file, $buffor);
		fclose($file);
		
	}
}


?>