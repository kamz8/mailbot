<?php
error_reporting(E_ALL);
require_once('class.ini.php');

/*$ini = new ini_file;
$ini->setFileName('config/account.ini');
$ini->load();
$ini->printini();*/

class user
{
	private $_login;
	private $_passwort;
	
	
public function __construct()
{
	$ini = new ini_file;
	$ini->setFileName('config/account.ini');
	$ini->load();
	$ini->printini(); echo'<br />';
	$this->_login = $ini->getElementValue('user','login');
	$this->_passwort = $ini->getElementValue('user','pass');
		
}

public function getLogin()
{
	return $this->_login;	
}

public function getPasswort()
{
	return $this->_passwort;	
}

}//class user end

$user = new user;
echo $user->getLogin().'<br />';
echo $user->getPasswort().'<br />';
?>