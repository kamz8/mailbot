<?php
class Csv
{
	private $dataArray = array();
	private $fileHandle;
	private $rowNumber;
	function __construct($fileName)
	{
		$this->rowNumber = 0;
		
		if(!file_exists($fileName)) 
		{	
			echo 'Nie ma takiego pliku ...';
			exit(); 
		}
		$this->fileHandle = file($fileName);
		foreach ($this->fileHandle as $i => $item)
		{
			$this->dataArray[$i] = explode(';',$this->conv_encoding($item));
			$this->rowNumber++;
		}
	}
	
	private function conv_encoding($string,$encoding="UTF-8") 
	{
		return iconv(mb_detect_encoding($string),$encoding,$string);
	}
	public function getRow($rowNum)
	{
		return $this->dataArray[$rowNum];
	}
	
	public function getCellValue($x,$y)
	{
		if(isset($this->dataArray[$x][$y]))
			return $this->dataArray[$x][$y];
		else return false;
	}
		
	public function getArray()			//zwraca tablice wynikową
	{
		return $this->dataArray;
	}
	
	public function getNumRows()		//zwraca ilość wierszy w tabeli
	{
		return $this->rowNumber;	
	}
	
	public function issetCell($x,$y)
	{
		return isset($this->dataArray[$x][$y]);	
	}
	
	function __destruct()
	{
		$this->fileHandle = NULL;	
		$this->dataArray = NULL;
	}
}
?>