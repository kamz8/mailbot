<?php
class HtmlParser
{
	
	private $document;
	
	function __construct($fileName)
	{
		if(file_exists($fileName))
			$this->document = file($fileName);
		else echo 'plik nie istnieje';			
	}
	
	public function countTag($tag)
	{
		$count = 0;
		if(empty($tag)) return false;
		foreach($this->document as $line)
		{
			if(strpos($line,$tag)) $count++;
		}
		
		return $count;
	}
	
	public function issetTag($tag)
	{
		foreach($this->document as $line)
		{
			if(strpos($line,$tag)) return true;
				
		}				
		return false;
	}
	
	public function id($value)
	{
		foreach($this->document as $line)
		{
			if(strpos($line,'id="'.$value.'"')) return true;
				
		}
		
		return false;
	}
	
		public function getHtml()
	{
		$doc = '';
		foreach($this->document as $line)
		{
			$doc .= $line;
		}
		return $doc;	
	}
	
	public function html($idVal,$txt)
	{
		$end = '/^< [.]/>&/';
		$i = 0;
		foreach($this->document as $line)
		{
			
			if(strpos($line,'id="'.$idVal.'"')) 
			{
				$this->document[$i].="\n\r".$txt; 
				
				return 1;
			}
			$i++;	
		}			
		
	}

		
		

	

}
?>