<?php
class UploadFile
{
	private $tmpDir;
	private $name;
	private $saveFolder;
	private $mime;
	private $size;
	private $error;
	private 
	static $AllowedExt = array("csv","xml","application/vnd.ms-excel");
	static $maxSize = 5120;	
	
	function __construct($folderUpload)
	{
		$this->saveFolder = $folderUpload;
		$this->name	= $_FILES['fileInput']['name'];
		$this->tmpDir = $_FILES['fileInput']['tmp_name'];
		$this->mime = $_FILES['fileInput']['type'];
		$this->size = $_FILES['fileInput']['size'];
		$this->error = $_FILES['fileInput']['error']; //kod błędu
	}
	
	public function startUplod()
	{
		if (!$this->tmpDir) {
    		exit("Nie wysłano żadnego pliku");
		}	
		
		$this->errorAlert();
		
		$fileExt=pathinfo(strtolower($this->name), PATHINFO_EXTENSION);
		if (!in_array($this->mime, UploadFile::$AllowedExt, true)) {
			echo $this->mime;
    		exit("Niedozwolone rozszerzenie pliku.");
		}
 
			/* przeniesienie pliku z folderu tymczasowego do właściwej lokalizacji */
		else if (!move_uploaded_file($this->tmpDir, $this->saveFolder."/".$this->name)) {
    		exit("Nie udało się przenieść pliku.");
		}else echo "Plik został zapisany.";

}
	
	private function errorAlert()
	{
		switch ($this->error) 
		{
		 	case UPLOAD_ERR_OK:
        	break;
    		case UPLOAD_ERR_NO_FILE:
      	  		exit("Brak pliku.");
        	break;
		
   			case UPLOAD_ERR_INI_SIZE:
    		case UPLOAD_ERR_FORM_SIZE:
        		exit("Przekroczony maksymalny rozmiar pliku.");
        	break;
		
    		default:
        	exit("Nieznany błąd.");
        	break;
		}	
	}
	
	public function getFileName()
	{
		return $this->name;	
	}
	
	public function getFileSaveFolder()
	{
		return $this->getFileSaveFolder();	
	}
	
}

?>