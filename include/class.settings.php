<?php 
require_once('class.ini.php');
require_once('layout.settings.php');
class Settings
{
	private $cfg;
	private static $configDir='./include/config/account.ini';
	
	function __construct()
	{
		$this->cfg = new ini_file;
		$this->cfg->setFileName('./include/config/account.ini');
		$this->cfg->load();	
	}
	
	public function userForm()
	{
		userForm();
		
	}
	
	public function updateUser()
	{
			$user = $_POST['user'];
			$paswort = md5($_POST['pass']);
			$email = $_POST['email'];
			$fromName = $_POST['fromName'];
			
			var_dump($_POST);
			echo'<br />';

			
			$this->cfg->updateValue('user','login',$user);
			$this->cfg->updateValue('user','pass',$paswort);
			$this->cfg->updateValue('user','mail',$email);
			$this->cfg->updateValue('user','FromName',$fromName);	
			$this->cfg->save();	
			$this->cfg->load();
			$this->cfg->printini();
		//	echo'<script>$(\'#alert-status\').css("display","inherit")</script>';
		
		
		
	}
	
	public function serverForm()
	{
		serverForm();
		
	}
	
}

?>