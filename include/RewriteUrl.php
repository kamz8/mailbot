<?php
class RewriteUrl
{
	private $_root_dir = NULL;	
	
	public function getRootDir($url)
	{
		$this -> _root_dir = $url;
	}
	
	public function rootDir() 
	{
		return $this -> _root_dir;
	}
	
	public function getTag($page)
	{
		if(isset($_GET[$page])){
          $page=$_GET[$page];
       }else{
          $page=false;
       }
       return $page;
	}
}

?>
