<?php
require_once('class.db.php');

//NASZ SKRYPT
require_once("./phpmailer/PHPMailerAutoload.php");
require_once('./phpmailer/class.smtp.php'); 
require './phpmailer/class.phpmailer.php';
require_once("class.ini.php");
require_once('class.htmlparser.php');


class Emailer
{
	private $cfg;
	private $mail;
	private $emailContent;
	private $adressList;
	private $userMail;
	
	function __construct()
	{
	  $cfg = new ini_file;	
	  $cfg->setFileName('./include/config/account.ini');
	  $cfg->load();
	  $this->userMail = $cfg->getElementValue('user','mail');
	// ładowanie konfiguracji
		
	}
	
		
	private function setEmailContet($adressArray)
	{
			
	}
	
	private function send()
	{
			
	}
	
	private function token()
	{
		return md5(time());	
	}
}
?>