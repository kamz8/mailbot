<?php
error_reporting(E_ALL);
//ładowanie konfiguracji
require_once('./include/class.db.php');

//NASZ SKRYPT
require_once("./phpmailer/PHPMailerAutoload.php");
require_once('./phpmailer/class.smtp.php'); 
require './phpmailer/class.phpmailer.php';
require_once("./include/class.ini.php");

function sendMail()
{
$cfg = new ini;	
$cfg->setFileName('./include/config/account.ini');
$cfg->load();
$user_mail = $cfg->getElementByValue('user','email');

	
$mail = new PHPMailer();
$mail->IsSMTP();

//$mail->SMTPDebug= 2;
//konfiguracja serwera
$mail->PluginDir = "phpmailer/";
$mail->Mailer = "smtp";
$mail->Host = $cfg->getElementByValue('server-config','Host');
$mail->SMTPSecure = $cfg->getElementByValue('server-config','SMTPSecure');;
$mail->Port =$cfg->getElementByValue('server-config','Port');	
//
$mail->SMTPKeepAlive = true;  					
$mail->SMTPAuth = true;
$mail->Username = $cfg->getElementByValue('server-config','Login');
$mail->Password = $cfg->getElementByValue('server-config','Passwort');	
//koniec połączenia
//baza danych
$mydb = new DB;
$qwery="SELECT `id`, `email` FROM mail_data Where sended=".$checkbox_value;
  $request = mysql_query($qwery);
  if($request === false) die('Nie można było odebrać danych do bazy'
  .' z powodu blendu:'. mysql_error()); 
 if(mysql_num_rows()==0)
 {
	 echo'Brak danych w bazie';
	 exit(1);
 }
  while($row = mysql_fetch_assoc($request))
  {
		$id = $row['id'];
		$address = $row['email'];
		
$mail->SetLanguage("pl", "phpmailer/language/");				
$mail->CharSet = "UTF-8";	
$mail->ContentType = "text/html";					
$mail->isHTML(true);
		
$mail->From = user_mail;	
$mail->FromName = "Kamil z webbooster";
$mail->Subject = "Tytuł wiadomości";
$mail->Body = '
To jest nowa testowa treść, z prawidłowo interpretowanymi polskimi znaczkami, a to jest <b>pogrubione</b>, a to jest <a href="http://www.example.com">link</a><br/>
<div>trolololo</div>
';

$mail->AddAddress($address);

if($mail->Send())
	   return true;
else
     throw new Exception('"E-mail nie mógł zostać wysłany, przyczyna :".$mail->ErrorInfo', 5);
		  
  }

//

					
$mail->SmtpClose();	//zamykamy połączeie									
}




?>		