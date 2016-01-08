<?php
error_reporting(E_ALL);
//ładowanie konfiguracji
require_once('class.db.php');

//NASZ SKRYPT
require_once("./phpmailer/PHPMailerAutoload.php");
require_once('./phpmailer/class.smtp.php'); 
require './phpmailer/class.phpmailer.php';
require_once("class.ini.php");
require_once('class.htmlparser.php');
require_once('class.progressbar.php');
function sendMail()
{
	$checkbox_value = 0;
$cfg = new ini_file;	
$cfg->setFileName('./include/config/account.ini');
$cfg->load();
$user_mail = $cfg->getElementValue('user','mail');

	
$p = new ProgressBar();
$mail = new PHPMailer();
$mail->IsSMTP();



//$mail->SMTPDebug= 2;
//konfiguracja serwera
$mail->PluginDir = "phpmailer/";
$mail->Mailer = "smtp";
$mail->Host = $cfg->getElementValue('server-config','Host');
$mail->SMTPSecure = $cfg->getElementValue('server-config','SMTPSecure');
$mail->Port =$cfg->getElementValue('server-config','Port');	
//
$mail->SMTPKeepAlive = true;  					
$mail->SMTPAuth = true;
$mail->Username = $cfg->getElementValue('server-config','Login');
$mail->Password = $cfg->getElementValue('server-config','Passwort');	
//koniec połączenia
//baza danych
$mydb = new Db;
 
$qwery="SELECT `id`, `email` FROM mail_data Where sended=".$checkbox_value;
  $request = $mydb->getMysqli()->query($qwery);
  if($request === false) die('Nie można było odebrać danych do bazy'
  .' z powodu blendu:'. $mydb->getMysqli()->error); 
 if($request->num_rows==0)
 {
	 echo'Brak danych w bazie';
	 exit(1);
 }
 $i=0;
 $size = $request->num_rows;
$p->render(); 
  while($row = $request->fetch_assoc())
  {		
		$id = $row['id'];
		$address = $row['email'];
		$token = md5(time());
		$mail->SetLanguage("pl", "phpmailer/language/");				
		$mail->CharSet = "UTF-8";	
		$mail->ContentType = "text/html";					
		$mail->isHTML(true);
		$html = new HtmlParser("./mailform/form1 - Kopia.html");		
		$mail->From = $user_mail;	
		$mail->FromName = $cfg->getElementValue('user','FromName');
		$mail->Subject = "Tytuł wiadomości";
		
		$mail->msgHTML($html->getHtml());
		
		$mail->AddAddress($address);
		try{
			if($mail->Send())
			{
				
				$p->setProgress($i*100/$size);
			}
			else throw new Exception("E-mail nie mógł zostać wysłany, przyczyna : {$mail->ErrorInfo}");
		}
		catch(Exeption $e) 
		{
			var_dump($e);	
			exit();		
		}
		
	$i++;	  
}
	echo'wysłano mail: ';	
		
$p->setProgress(100);

//echo $html->getHtml();
					
$mail->SmtpClose();	//zamykamy połączeie									
}




?>		