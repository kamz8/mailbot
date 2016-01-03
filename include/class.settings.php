<?php 
require_once('class.ini.php');
require_once('layout.settings.php');
require_once('class.filter.php');
class Settings
{
	private $cfg;
	const ssl = 'ssl';
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
			$filter = new Filter;
			$user = $filter->dataFilter($_POST['user']);
			$paswort = $filter->dataFilter(md5($_POST['pass']));
			$email = $filter->dataFilter($_POST['email']);
			$fromName = $filter->dataFilter($_POST['fromName']);
			
			$this->cfg->updateValue('user','login',$user);
			$this->cfg->updateValue('user','pass',$paswort);
			if(!empty($email))	$this->cfg->updateValue('user','mail',$email);
			if(!empty($fromName)) $this->cfg->updateValue('user','FromName',$fromName);	
			$this->cfg->save();	
					
			echo'<script>$(\'#alert-status\').css("display","inherit")</script>';
		
		
		
	}
	public function updateServer()
	{
			$filter = new Filter;
			$user = $filter->dataFilter($_POST['user']);
			$paswort = $filter->dataFilter($_POST['pass']);
			$host = $filter->dataFilter($_POST['host']);
			$port = $filter->dataFilter($_POST['port']);
			$ssl = '';
			if($_POST['ssl']==1)
				$ssl = self::ssl;
			else if($_POST['ssl'] = 0) $ssl = '';	
			
			$this->cfg->updateValue('server-config','Login',$user);
			$this->cfg->updateValue('server-config','Passwort',$paswort);
			$this->cfg->updateValue('server-config','Host',$host);
			$this->cfg->updateValue('server-config','Port',$port);
			$this->cfg->updateValue('server-config','SMTPSecure',$ssl);	
			$this->cfg->save();	
					
			echo'<script>$(\'#alert-status\').css("display","inherit")</script>';
		
		
		
	}
	
	public function serverForm()
	{
		serverForm();
		
	}
	
}

?>